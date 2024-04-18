<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public function getData()
    {
        return $this->get();
    }

    /**
     * Get the city that owns the Address
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function AddressCity()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function getCity()
    {
        return City::get();
    }
}
