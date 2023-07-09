<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\OfferItem;

class IndexController extends Controller
{
    public function index()
    {
        $offer_items = OfferItem::all();
        $offers = Offer::all();
        $first_guid = Offer::find(1)['guid'];
        return view('index', [
            'offer_items' => $offer_items,
            'offers' =>$offers,
            'guid' => $first_guid
        ]);
    }
}
