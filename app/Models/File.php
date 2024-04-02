<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends DM_BaseModel
{
    use HasFactory;
    protected $fillable = ['company_id','post_unique_id','title','file','size','type','order','download_count'];

    public function document() {
        return $this->belongsTo('App\Models\ApplicationDocument', 'document_id');
    }
    
}
