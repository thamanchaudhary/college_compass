<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];

    public function getRules()
    {
        return [
            'name' => 'required|string|max:225|min:2',
            'status' => 'required|boolean',
        ];
    }

    public function getData()
    {
        return $this->paginate(10);
    }
}
