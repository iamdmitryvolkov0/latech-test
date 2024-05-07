<?php

namespace App\Repositories;

use App\Models\ProductReservation;
use App\Repositories\Contracts\ProductReservationRepositoryContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ProductReservationRepository implements ProductReservationRepositoryContract
{
    public function create()
    {

    }

    public function getProductReservationByCode(int $code): Model|Builder|ProductReservation|null
    {
        return ProductReservation::query()
            ->where('code', $code)
            ->first();
    }
}
