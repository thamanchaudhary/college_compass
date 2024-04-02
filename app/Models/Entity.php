<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends DM_BaseModel
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    public function getData()
    {
        return $this::paginate(10);
    }
}
