<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\OfferItem;
use App\Http\Requests\v1\StoreOfferItemRequest;
use App\Http\Requests\v1\UpdateOfferItemRequest;
use App\Http\Resources\v1\OfferItemResource;
use App\Http\Resources\v1\OfferItemCollection;
use Illuminate\Http\Response;

class OfferItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return OfferItemCollection
     */
    public function index()
    {
        return new OfferItemCollection(OfferItem::paginate());
    }


    public function store(StoreOfferItemRequest $request)
    {
        $parent_id = $request->offerId;

        $parent = Offer::find($parent_id);

        if ($parent->status !== 'N')
        {
            return response()->json(['message' => 'Добавление невозможно'], 400);
        }

        $imagesJson = json_encode($request->images);

        $offerItem = new OfferItem();

        $offerItem->images = $imagesJson;
        $offerItem->offer_id = $request->offerId;
        $offerItem->type = $request->type;
        $offerItem->square = $request->square;
        $offerItem->complex = $request->complex;
        $offerItem->house = $request->house;
        $offerItem->description = $request->description;
        $offerItem->price = $request->price;

        $offerItem->save();

        return new OfferItemResource($offerItem);
    }

    /**
     * Display the specified resource.
     *
     * @param OfferItem $offerItem
     * @return OfferItemResource
     */
    public function show(OfferItem $offerItem)
    {
        return new OfferItemResource($offerItem);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOfferItemRequest $request
     * @param OfferItem $offerItem
     * @return bool
     */
    public function update(UpdateOfferItemRequest $request, OfferItem $offerItem)
    {
        return $offerItem->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param OfferItem $offerItem
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(OfferItem $offerItem)
    {
        $offerItem = OfferItem::findOrFail($offerItem->id);
        $offerItem->delete();

        return response()->json(['message' => 'Запись удалена'], 200);
    }
}
