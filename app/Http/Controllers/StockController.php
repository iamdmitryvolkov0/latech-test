<?php

namespace App\Http\Controllers;

use App\Actions\GetStockRemaindersAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

//todo: add swagger documentation
class StockController extends Controller
{
    public function getRemaindersByStockId(Request $request, GetStockRemaindersAction $action): JsonResponse
    {
        //сделал не через FormRequest из-за проблем с Laravel Sanctum
        return $action->execute($request->only('stock_id'));
    }
}
