<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model {
    protected $table = 'order';
    protected $primaryKey = 'id_order';
    protected $guarded = ['id_order'];

    public function order_item(): HasMany
    {
        return $this->hasMany(OrderItem::class, "id_order","id_order");
    }
}
