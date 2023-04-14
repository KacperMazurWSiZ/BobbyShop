<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable {
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $guarded = ['id_admin'];

    public function getAuthPassword()
    {
        return $this->admin_password;
    }

}
