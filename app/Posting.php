<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    protected $table = 'posting';
    public $timestamps = false;
    protected $fillable = ['judul','posting'];

}
