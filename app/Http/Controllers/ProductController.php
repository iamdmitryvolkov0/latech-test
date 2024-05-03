<?php

namespace App\Http\Controllers;

//todo: add swagger documentation
use App\Actions\CancelProductReservationAction;
use App\Actions\ReserveProductsAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function reserveProduct(Request $request, ReserveProductsAction $action): JsonResponse
    {
        //сделал не через FormRequest из-за проблем с Laravel Sanctum
        return $action->execute($request->only('codes'));
    }

    public function cancelReservation(Request $request, CancelProductReservationAction $action): JsonResponse
    {
        //сделал не через FormRequest из-за проблем с Laravel Sanctum
        return $action->execute($request->only('codes'));
    }
}
