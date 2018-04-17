<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class praktikum extends Model
{
    protected $table 	= 'praktikum';
    public $timestamps 	= false;
    protected $guarded 	= ['nama'];
}
