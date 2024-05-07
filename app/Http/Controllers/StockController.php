<?php

namespace App\Http\Controllers;

use App\Actions\GetStockRemaindersAction;
use App\Http\Requests\StockDataRequest;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Get(
 *       path="/stock_remainders",
 *       summary="Get stock remainders by stock id",
 *       tags={"Stock"},
 *       @OA\RequestBody(
 *           @OA\MediaType(
 *               mediaType="application/json",
 *               @OA\Schema(
 *                   @OA\Property(
 *                       property="stock_id",
 *                       type="integer",
 *                   ),
 *                   example={"stock_id": "1"}
 *               )
 *           )
 *       ),
 *       @OA\Response(
 *           response=200,
 *           description="OK",
 *     @OA\JsonContent(
 *            @OA\Property(property="data", type="object",
 *            @OA\Property(property="id", type="integer", example="1"),
 *            @OA\Property(property="name", type="string", example="Shirt"),
 *            @OA\Property(property="size", type="string", example="54"),
 *            @OA\Property(property="quantity", type="integer", example="1"),
 *            @OA\Property(property="stock_id", type="integer", example="1"),
 *      ),
 *        )
 *       )
 *   )
 */
class StockController extends Controller
{
    public function getRemaindersByStockId(StockDataRequest $request, GetStockRemaindersAction $action): JsonResponse
    {
        return response()->json($action->execute($request->validated()));
    }
}
