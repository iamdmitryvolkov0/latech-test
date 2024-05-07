<?php

namespace App\Http\Controllers;

use App\Actions\CancelProductReservationAction;
use App\Actions\ReserveProductsAction;
use App\Http\Requests\ReserveProductsRequest;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Info(
 *     title="LamodaTech Test Task",
 *     description="API",
 *     version="1.0.0",
 *  )
 * @OA\Post(
 *      path="/reserve_product",
 *      summary="Reserves product by unique codes array",
 *      tags={"Product"},
 *      @OA\RequestBody(
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(
 *                      property="codes",
 *                      type="array",
 *                      @OA\Items(type="Integer")
 *                  ),
 *                  example={"codes": "[123456, 654321]"}
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="OK",
 *     @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Products reserved successfully"),
 *         )
 *      )
 *  )
 *
 * @OA\Post(
 *       path="/cancel_reservation",
 *       summary="Cancel product reservation by unique codes array",
 *       tags={"Product"},
 *       @OA\RequestBody(
 *           @OA\MediaType(
 *               mediaType="application/json",
 *               @OA\Schema(
 *                   @OA\Property(
 *                       property="codes",
 *                       type="array",
 *                       @OA\Items(type="Integer")
 *                   ),
 *                   example={"codes": "[123456, 654321]"}
 *               )
 *           )
 *       ),
 *       @OA\Response(
 *           response=200,
 *           description="OK",
 *     @OA\JsonContent(
 *            @OA\Property(property="message", type="string", example="Reservation cancelled successfully"),
 *        )
 *       )
 *   )
 */
class ProductController extends Controller
{
    public function reserveProduct(ReserveProductsRequest $request, ReserveProductsAction $action): JsonResponse
    {
        return response()->json($action->execute($request->validated()));
    }

    public function cancelReservation(ReserveProductsRequest $request, CancelProductReservationAction $action): JsonResponse
    {
        return response()->json($action->execute($request->validated()));
    }
}
