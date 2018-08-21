<?php

namespace App\Http\Controllers;

use App\SpecialOffer;
use Illuminate\Http\Request;

class SpecialOfferController extends Controller
{

    public function showAllOffers()
    {
        return response()->json(SpecialOffer::all());
    }

    public function showOneOffer($id)
    {
        return response()->json(SpecialOffer::find($id));
    }

    public function create(Request $request)
    {
        $specialoffer = SpecialOffer::create($request->all());

        return response()->json($specialoffer, 201);
    }

    public function update($id, Request $request)
    {
        $specialoffer = SpecialOffer::findOrFail($id);
        $specialoffer->update($request->all());

        return response()->json($specialoffer, 200);
    }

    public function delete($id)
    {
        SpecialOffer::findOrFail($id)->delete();
        return response('SpecialOffer Was Deleted Successfully', 200);
    }
}