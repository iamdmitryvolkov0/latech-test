<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Модель Резерв продукта
 *
 * @property int $id
 * @property int $product_id
 * @property int $code
 * @property int $quantity
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ProductReservation newModelQuery()
 * @method static Builder|ProductReservation newQuery()
 * @method static Builder|ProductReservation query()
 * @method static Builder|ProductReservation whereCreatedAt($value)
 * @method static Builder|ProductReservation whereId($value)
 * @method static Builder|ProductReservation whereProductId($value)
 * @method static Builder|ProductReservation whereQuantity($value)
 * @method static Builder|ProductReservation whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ProductReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'code',
        'quantity'
    ];
}
