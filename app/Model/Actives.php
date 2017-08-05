<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Actives extends Model
{
    protected $table = 'actives';

    protected $guarder = [];

    public $timestamps = false;
}
