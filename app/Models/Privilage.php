<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Privilage extends Model
{
    public $table = 'privilage';
    protected $guarded = [];
    public $timestamps = false;

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }
}
