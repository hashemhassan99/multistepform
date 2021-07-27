<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    public function families()
    {
        return $this->hasMany(Family::class);
    }
}
