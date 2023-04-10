<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model {
    protected $table = 'category';
    protected $primaryKey = 'id_category';
    protected $guarded = ['id_category'];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class, "id_category","id_category");
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, "modified_by", "id_admin");
    }
}
