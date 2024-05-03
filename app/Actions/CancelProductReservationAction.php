<?php

namespace App\Actions;

use App\Models\Product;
use App\Models\ProductReservation;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CancelProductReservationAction
{
    public function execute(array $fields): JsonResponse
    {
        $validator = Validator::make($fields, [
            'codes' => ['required', 'array'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $productsToCancelReservation = Product::query()
            ->where('code', $fields['codes'])
            ->get();

        /** @var Product $product */
        foreach ($productsToCancelReservation as $product) {
            DB::transaction(function () use ($product) {
                $product->quantity += 1;
                $product->save();

                $reservation = ProductReservation::query()
                    ->where('code', $product->code)
                    ->first();

                if ($reservation->quantity == 1) {
                    $reservation->delete();
                } else {
                    $reservation->quantity -= 1;
                    $reservation->save();
                }
            });
        }
        return response()->json(["message" => "Reservation cancelled successfully"]);
    }
}
