<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Http\Requests\v1\StoreOfferRequest;
use App\Http\Requests\v1\UpdateOfferRequest;
use App\Http\Resources\v1\OfferResource;
use App\Http\Resources\v1\OfferCollection;
use Illuminate\Http\Response;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return OfferCollection
     */
    public function index()
    {
        return new OfferCollection(Offer::paginate());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOfferRequest $request
     * @return OfferResource
     */
    public function store(StoreOfferRequest $request)
    {
        return new OfferResource(Offer::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param Offer $offer
     * @return OfferResource
     */
    public function show(Offer $offer)
    {
        return new OfferResource($offer);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOfferRequest $request
     * @param Offer $offer
     * @return Response
     */
    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        $offer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Offer $offer
     * @return Response
     */
    public function destroy(Offer $offer)
    {

    }
}
