<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // use HasFactory;

    protected $fillable = ['name'];



    /**
     * One To Many Relationship 
     * Get the auctions that belongs to thecategory
     */
    // 
    public function auctions()
    {
        return $this->hasMany(Auction::class);
    }

}
