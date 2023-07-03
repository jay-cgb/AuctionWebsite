<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    protected $fillable = [
        'title',
        'location',
        'date',
        'period',
        'category_id',
        'image',
    ];


    protected $hidden = [
        'category_id',
    ];



    /**
     * One To Many(Inverse) Relationship 
     * Get the category that owns the auction.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }



    public function items()
    {
        return $this->hasMany(Item::class);

    }
}
