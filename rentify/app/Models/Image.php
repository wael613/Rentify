<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\property;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'property_id'
    ];

    public function properties(){
        return $this->belongsTo(Property::class);
    }
}
