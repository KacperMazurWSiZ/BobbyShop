<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model {
    protected $table = 'order_item';
    protected $primaryKey = 'id_order_item';
    protected $guarded = ['id_order_item'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, "id_order", "id_order");
    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, "id_product", "id_product");
    }
}
