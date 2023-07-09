<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\OfferItem;

class OfferController extends Controller
{
    public function show($guid)
    {
        $current_guid = $guid;
        $offer = Offer::where('guid',$guid)->first();
        $guids = Offer::pluck('guid')->all();
        $offer_items = OfferItem::all()->where('offer_id',$offer->id);
        $offer_amount = count(Offer::all());
        return view('index', [
            'offer_items' => $offer_items,
            'offer_id' => $offer->id,
            'offer_amount' => $offer_amount,
            'guid' => $offer->guid,
            'guids' => $guids,
            'current_guid' => $current_guid
        ]);
    }
}
