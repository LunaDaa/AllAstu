<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    //
    //protected $primaryKey='student_id';
    protected $fillable=['student_id','year','section'];
}
