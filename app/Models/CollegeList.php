<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeList extends Model
{
    use HasFactory;

   

    public function getRules()
    {
        return [
            'name' => 'required|string|max:225|min:2',
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
    public function CollegeCity()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    // College Address
    public function CollegeAddress()
    {
        return $this->belongsTo(Address::class, 'address_id');
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
    public function getCollegeAddress()
    {
        return Address::get();
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
