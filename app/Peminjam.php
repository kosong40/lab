<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    protected $table = 'user';
    public $timestamps = false;
    protected $guarded = [];
}