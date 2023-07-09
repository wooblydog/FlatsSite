<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'offer_id',
        'type',
        'square',
        'complex',
        'house',
        'description',
        'images',
        'price'
    ];

    public function offer(){
        return $this->belongsTo(Offer::class);
    }
}

