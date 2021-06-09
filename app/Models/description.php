<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class description extends Model
{
    use HasFactory;
    protected $table = "descriptions";
    protected $fillable = ["baldwinPart","excopart","lengthInch","lengthMM", "widthMM", "heightMM", "widthInches", "heightInches", "outlet", "odInches", "odMM",
        "odInches2", "odMM2", "idInches", "idMM", "threadSort", "threadMM", "threadInches", "perInch", "gaskets", "features"];




}
