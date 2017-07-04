<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'certificate';

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
