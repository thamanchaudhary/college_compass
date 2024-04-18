<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeList extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'location_id',
        'website',
        'contact',
        'email',
        'examp_required',
        'reconization',
        'course',
        'degree',
        'description',
    ];

    public function getRules()
    {
        return [
            'name' => 'required|string|max:225|min:2',
            'address' => 'required|string|max:225|min:2',
            'location_id' => 'required|string|max:225',
            'website' => 'required|string|max:225|min:2',
            'contact' => 'required|string|max:225|min:2',
            'email' => 'required|string|max:225|min:2',
            'examp_required' => 'required|string|max:225|min:2',
            'course' => 'required|string|max:225|min:2',
            'degree' => 'required|string|max:225|min:2',
            'image_1' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ];
    }

    public function getData()
    {
        return $this->paginate(10);
    }
    //COllege Location
    public function collegeLocation()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    public function getUniversity()
    {
        return University::get();
    }

    public function getProgram()
    {
        return Program::get();
    }
    public function getCity()
    {
        return City::get();
    }

    public function University()
    {
        return $this->belongsTo(University::class);
    }
    public function Program()
    {
        return $this->belongsTo(Program::class);
    }
}
