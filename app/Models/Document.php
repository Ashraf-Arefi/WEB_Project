<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public $table = 'document';
    protected $guarded = [];
    public $timestamps = false;
}
