<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'roll_no', 'class', 'section'];

    public function marks(){
        return $this->hasMany(Mark::class);
    }
}
