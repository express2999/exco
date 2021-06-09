<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crossref extends Model
{
    use HasFactory;
    protected $table = "cross";
    protected $fillable = ["baldwin","replacePartNumber","replaceBrand","excoPartNo"];


    public function description(){
        return $this->hasOne(description::class, 'excopart', 'excoPartNo');
    }
}
