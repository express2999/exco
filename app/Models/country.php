<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class country extends Model
{
    //use HasFactory;

    protected $table='country';
    protected $fillable='name';

public function index(){
    $data = DB::table('country')->get();
    return $data;
}
}
