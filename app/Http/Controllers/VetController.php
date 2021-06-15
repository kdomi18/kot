<?php

namespace App\Http\Controllers;

use App\Models\Vet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VetController extends Controller
{
    public function addVet(){
        return view('vet.add-vet');
    }

    public function createVet(Request $request){
        $vet = new Vet();
        $vet->name = $request->name;
        $vet->surname = $request->surname;
        $vet->organization = $request->organization;
        $vet->address = $request->address;
        $vet->phone = $request->phone;
        $vet->other_contact = $request->other_contact;
        $vet->relative_distance = $request->relative_distance;
        $vet->save();
        return back()->with("vet_created", "Vet has been created successfully");
    }

    public function getVet(){
        $vets = DB::table('vets')->paginate(15);
        return view("vet.vets", compact('vets'));
    }

    public function getVetById($id){
        $vet = Vet::where('id', $id)->first();
        return view("vet.single-vet", compact('vet'));
    }

    public function deleteVet($id){
        $vet = Vet::where('id', $id)->delete();
        return back()->with("vet_deleted", "Vet has been deleted successfully");
    }

    public function editVet($id){
        $vet = Vet::find($id);
        return view("vet.edit-vet", compact('vet'));
    }

    public function updateVet(Request $request){
        $vet = Vet::find($request->id);
        $vet->name = $request->name;
        $vet->surname = $request->surname;
        $vet->organization = $request->organization;
        $vet->address = $request->address;
        $vet->phone = $request->phone;
        $vet->other_contact = $request->other_contact;
        $vet->relative_distance = $request->relative_distance;
        $vet->save();

        return back()->with("vet_updated", "Vet has been updated successfully");
    }
}
