<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    protected $table = 'finance';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = true;

    protected function getDateFormat()
    {
        return time();
    }

    protected function asDateTime($value)
    {
        return $value;
    }
}
