<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class application extends Model
{
    //use HasFactory;

    protected $table="application";
    protected $fillable=["manufacturer","equipmentType","make","model","modelsn","enginemanufacturer","engine","enginesn","year"];
}
