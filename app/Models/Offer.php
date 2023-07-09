<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'guid',
        'b24_contact_id',
        'b24_deal_id',
        'b24_manager_id',
        'manager_fio',
        'phone',
        'position',
        'avatar',
        'status',
        'date_end'
    ];

    public function offerItem(){
        return $this->hasMany(OfferItem::class);
    }

}
