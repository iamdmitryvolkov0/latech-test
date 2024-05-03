<?php

namespace App\Actions;

use App\Models\Product;
use App\Models\ProductReservation;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReserveProductsAction
{
    public function execute(array $fields)
    {
        $validator = Validator::make($fields, [
            'codes' => ['required', 'array'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $availableStocksIds = Stock::query()
            ->where('is_available', true)
            ->pluck('name', 'id')
            ->all();

        $productsToReserve = Product::query()
            ->where('code', $fields['codes'])
            ->get();

        /** @var Product $product */
        foreach ($productsToReserve as $product) {
            if ($product->quantity > 0 && array_key_exists($product->stock_id, $availableStocksIds)) {
                DB::transaction(function () use ($product) {
                    $product->quantity -= 1;
                    $product->save();

                    ProductReservation::create([
                        'product_id' => $product->id,
                        'code' => $product->code,
                        'quantity' => 1,
                    ]);
                });
            } else {
                return response()->json(["message" => "Error while product reservation"], 422);
            }
        }
        return response()->json(["message" => "Products reserved successfully"]);
    }
}
