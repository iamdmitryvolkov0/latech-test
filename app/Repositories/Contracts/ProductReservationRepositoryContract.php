<?php

namespace App\Repositories\Contracts;

use App\Models\ProductReservation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface ProductReservationRepositoryContract
{
    public function create();

    public function getProductReservationByCode(int $code): Model|Builder|ProductReservation|null;
}
