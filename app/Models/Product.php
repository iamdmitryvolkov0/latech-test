<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Модель Продукт
 *
 * @property int $id Идентификатор модели
 * @property string $name Название продукта
 * @property string $size Размер продукта
 * @property int $code Уникальный код продукта
 * @property int $quantity Количество
 * @property int $stock_id Идентификатор склада хранения
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereCode($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product whereQuantity($value)
 * @method static Builder|Product whereSize($value)
 * @method static Builder|Product whereStockId($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @method static ProductFactory factory($count = null, $state = [])
 * @mixin Eloquent
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'size',
        'code',
        'quantity',
        'stock_id'
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
