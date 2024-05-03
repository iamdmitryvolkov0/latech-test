<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Database\Factories\StockFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Модель Склад
 *
 * @property int $id Идентификатор модели
 * @property string $name Название склада
 * @property bool $is_available Статус доступности склада
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Stock newModelQuery()
 * @method static Builder|Stock newQuery()
 * @method static Builder|Stock query()
 * @method static Builder|Stock whereCreatedAt($value)
 * @method static Builder|Stock whereId($value)
 * @method static Builder|Stock whereIsAvailable($value)
 * @method static Builder|Stock whereName($value)
 * @method static Builder|Stock whereUpdatedAt($value)
 * @method static StockFactory factory($count = null, $state = [])
 * @mixin Eloquent
 */
class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_available'
    ];
}
