<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'about',
        'thumbnail',
        'tagline',
        'name',
    ];
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    
    /**
     * Get the primary image for the product.
     */
    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }
    //dalam satu product akan memiliki banyak appointment
    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
}
