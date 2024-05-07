<?php

namespace App\Actions;

use App\Repositories\ProductRepository;

class GetStockRemaindersAction
{
    public function execute(array $fields): array
    {
        $productRepository = new ProductRepository();

        return ['data' => $productRepository->getProductsByStockId($fields['stock_id'])];
    }
}
