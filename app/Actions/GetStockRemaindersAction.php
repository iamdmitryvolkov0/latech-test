<?php

namespace App\Actions;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class GetStockRemaindersAction
{
    public function execute(array $fields): JsonResponse
    {
        $validator = Validator::make($fields, [
            'stock_id' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = Product::query()
            ->where('stock_id', $fields['stock_id'])
            ->get();

        return response()->json(['data' => $data]);
    }
}
