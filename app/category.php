<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public $table = 'category';
    protected $fillable = ['name'];
}
