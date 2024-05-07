<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryContract
{
    public function getProductsByStockId(int $stock_id): Collection;
    public function getProductsByCodes(array $codes): Collection;

}
