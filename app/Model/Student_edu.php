<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student_edu extends Model
{
    protected $table = 'students_edu';

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
