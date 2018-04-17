<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    // protected $table = 'user';
    protected $table = 'peminjam';
    public $timestamps = false;
    protected $fillable = ['nama','username','passowrd','no_hp','alamat'];
}
