<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Enclosure extends Model
{
    protected $table = 'enclosure';

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
