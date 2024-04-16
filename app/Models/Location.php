<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    //get Data
    public function getData()
    {
        return $this->orderBy('id', 'desc')->get();
    }
}
