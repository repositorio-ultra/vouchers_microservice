<?php

namespace App\Http\Controllers;

use App\Recipient;
use Illuminate\Http\Request;

class RecipientController extends Controller
{

    public function showAllRecipients()
    {
        return response()->json(Recipient::all());
    }

    public function showOneRecipient($id)
    {
        return response()->json(Recipient::find($id));
    }

    public function create(Request $request)
    {
        $recipient = Recipient::create($request->all());

        return response()->json($recipient, 201);
    }

    public function update($id, Request $request)
    {
        $recipient = Recipient::findOrFail($id);
        $recipient->update($request->all());

        return response()->json($recipient, 200);
    }

    public function delete($id)
    {
        Recipient::findOrFail($id)->delete();
        return response('Recipient Was Deleted Successfully', 200);
    }
}