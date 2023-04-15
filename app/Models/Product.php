<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model {
    protected $table = 'product';
    protected $primaryKey = 'id_product';
    protected $guarded = ['id_product'];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, "id_category","id_category");
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, "modified_by", "id_admin");
    }

}
