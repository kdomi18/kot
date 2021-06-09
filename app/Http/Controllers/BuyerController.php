<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuyerController extends Controller
{
    public function addBuyer(){
        return view('market.add-buyer');
    }

    public function createBuyer(Request $request){
        $buyer = new Buyer();
        $buyer->name = $request->name;
        $buyer->surname = $request->surname;
        $buyer->organization = $request->organization;
        $buyer->address = $request->address;
        $buyer->phone = $request->phone;
        $buyer->other_contact = $request->other_contact;
        $buyer->buys = $request->buys;
        $buyer->profit_index = $request->profit_index;
        $buyer->relative_distance = $request->relative_distance;
        $buyer->save();
        return back()->with("buyer_created", "Buyer has been created successfully");
    }

    public function getBuyer(){
        $buyers = DB::table('buyers')->paginate(15);
        return view("market.market", compact('buyers'));
    }

    public function getBuyerById($id){
        $buyer = Buyer::where('id', $id)->first();
        return view("market.single-buyer", compact('buyer'));
    }

    public function deleteBuyer($id){
        $buyer = Buyer::where('id', $id)->delete();
        return back()->with("buyer_deleted", "Buyer has been deleted successfully");
    }

    public function editBuyer($id){
        $buyer = Buyer::find($id);
        return view("market.edit-buyer", compact('buyer'));
    }

    public function updateBuyer(Request $request){
        $buyer = Buyer::find($request->id);
        $buyer->name = $request->name;
        $buyer->surname = $request->surname;
        $buyer->organization = $request->organization;
        $buyer->address = $request->address;
        $buyer->phone = $request->phone;
        $buyer->other_contact = $request->other_contact;
        $buyer->buys = $request->buys;
        $buyer->profit_index = $request->profit_index;
        $buyer->relative_distance = $request->relative_distance;
        $buyer->save();

        return back()->with("buyer_updated", "Buyer has been updated successfully");
    }
}
