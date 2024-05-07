<?php

namespace App\Actions;

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Repositories\ProductReservationRepository;
use Illuminate\Support\Facades\DB;
use Throwable;

class CancelProductReservationAction
{
    public function execute(array $fields): array
    {
        $productRepository = new ProductRepository();
        $productReservationRepository = new ProductReservationRepository();

        $productsToCancelReservation = $productRepository->getProductsByCodes($fields['codes']);

        /** @var Product $product */
        foreach ($productsToCancelReservation as $product) {
            try {
                DB::transaction(function () use ($product, $productReservationRepository) {
                    $product->quantity += 1;
                    $product->save();

                    //todo: вынести запрос из цикла
                    $reservation = $productReservationRepository->getProductReservationByCode($product->code);

                    if ($reservation->quantity == 1) {
                        $reservation->delete();
                    } else {
                        $reservation->quantity -= 1;
                        $reservation->save();
                    }
                });
            } catch (Throwable) {
                DB::rollBack();
            }

        }
        return ["message" => "Reservation cancelled successfully"];
    }
}
