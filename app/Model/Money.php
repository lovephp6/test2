<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    protected $table = 'conf_money';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;
}
