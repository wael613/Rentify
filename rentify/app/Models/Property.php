<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';

    protected $fillable = ['name','address','city','monthlyCost','description','propertyType','furnishType','letType','availability','rooms','baths','options','user_id','image'];

    public function setOptionsAttribute($value)
    {
        $this->attributes['options'] = json_encode($value);
    }

    public function getOptionsAttribute($value)
    {
        return $this->attributes['options'] = json_decode($value);
    }

    // public function images(){
    //     return $this->hasMany(Image::class);
    // }

}
