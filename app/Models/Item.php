<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = [
        'lot_number',
        'auction_id',
        'artist',
        'year_produced',
        'subject_classification',
        'description_summary',
        'description',
        'date',
        'estimated_price',
        'image',
        'medium',
        'is_framed',
        'dimension',
        'image_type',
        'material_used',
        'weight'
    ];



    protected $hidden = [
        'lot_number',
        'auction_id',
    ];



    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }


  
}
