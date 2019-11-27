<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mojrem extends Model
{
    protected $table = 'person';
    protected $guarded = ['id'];
    public $timestamps = false;


    public function male()
    {
        DB::table('person')
            ->where('gender','male')
            ->count();
    }

    public function female()
    {
        DB::table('person')
            ->where('gender','male')
            ->count();
    }
}
