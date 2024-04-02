<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'status'];

    public function getData()
    {
        return $this->orderBy('id', 'desc')->paginate(10);
    }

    public function getRules()
    {
        return [
            'title' => 'required',
        ];
    }
}
