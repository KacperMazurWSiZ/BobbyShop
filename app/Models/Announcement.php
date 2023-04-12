<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Announcement extends Model {
    protected $table = 'announcement';
    protected $primaryKey = 'id_announcement';
    protected $guarded = ['id_announcement'];


    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, "id_admin", "id_admin");
    }
}
