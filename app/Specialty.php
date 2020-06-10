<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable=['name','color'];
    protected $table = 'specialtys';
}
