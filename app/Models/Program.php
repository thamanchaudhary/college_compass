<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function getRules()
    {
        return [
            'name' => 'required|string|max:225|min:2',
        ];
    }

    public function getData()
    {
        return $this->paginate(10);
    }

    public function getUniversity()
    {
        return University::all();
    }

    // get university name
    public function getUniversityName()
    {
        return $this->belongsTo(University::class, 'university_id');

    }

  
}
