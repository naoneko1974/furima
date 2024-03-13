<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Item;
use App\Models\Purchase;
use App\Models\Payment;
use App\Models\Sold_item;
use App\Http\Requests\PurchaseRequest;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function purchase($id){
        $users = User::find(Auth::user()->id);
        $items = Item::find($id);
        $payments = Payment::all();
        $postcode = '';
        $address = '';
        $building = '';
        return view('purchase',compact('users','items','payments', 'postcode', 'address', 'building'));
    }

    public function purchase_store(PurchaseRequest $request){
        $purchases = New Purchase();
        $purchases->user_id = Auth::user()->id;
        $purchases->item_id = $request->id;
        $purchases->payment_id = $request->payment_id;
        $purchases->postcode = $request->postcode;
        $purchases->address = $request->address;
        $purchases->building = $request->building;
        $purchases->save();

        $sold_items = New Sold_item();
        $sold_items->user_id = Auth::user()->id;
        $sold_items->item_id = $request->id;
        $sold_items->save();

        return view('purchase_done');

    }
}
