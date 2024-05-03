<?php

namespace App\Http\Controllers;

use App\Actions\GetStockRemaindersAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Post(
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
    public function getRemaindersByStockId(Request $request, GetStockRemaindersAction $action): JsonResponse
    {
        //сделал не через FormRequest из-за проблем с Laravel Sanctum
        return $action->execute($request->only('stock_id'));
    }
}
