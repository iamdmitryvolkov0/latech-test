<?php

namespace App\Actions;

use App\Models\Product;
use App\Models\ProductReservation;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use Throwable;

class ReserveProductsAction
{
    public function execute(array $fields): array
    {
        $availableStocksIds = Stock::query()
            ->where('is_available', true)
            ->pluck('id')
            ->all();

        $productsToReserve = Product::query()
            ->where('code', $fields['codes'])
            ->get();

        /** @var Product $product */
        foreach ($productsToReserve as $product) {
            if ($product->quantity > 0 && in_array($product->stock_id, $availableStocksIds)) {
                try {
                    DB::transaction(function () use ($product) {
                        $product->quantity -= 1;
                        $product->save();

                        //todo: вынести данные для создания резерва из цикла

                        ProductReservation::create([
                            'product_id' => $product->id,
                            'code' => $product->code,
                            'quantity' => 1,
                        ]);
                    });
                } catch (Throwable) {
                    DB::rollBack();
                }
            } else {
                return ["message" => "Error while product reservation"];
            }
        }
        return ["message" => "Products reserved successfully"];
    }
}
