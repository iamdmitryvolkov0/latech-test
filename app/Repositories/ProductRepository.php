<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryContract;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductRepositoryContract
{
    public function getProductsByStockId(int $stock_id): Collection
    {
        return Product::query()
            ->where('stock_id', $stock_id)
            ->get();
    }

    public function getProductsByCodes(array $codes): Collection
    {
        return Product::query()
            ->where('code', $codes)
            ->get();
    }
}
