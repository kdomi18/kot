<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function addSupplier(){
        return view('market.add-supplier');
    }

    public function createSupplier(Request $request){
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->surname = $request->surname;
        $supplier->organization = $request->organization;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->other_contact = $request->other_contact;
        $supplier->supplies = $request->supplies;
        $supplier->profit_index = $request->profit_index;
        $supplier->relative_distance = $request->relative_distance;
        $supplier->save();
        return back()->with("supplier_created", "Supplier has been created successfully");
    }

    public function getSupplier(){
        $suppliers = DB::table('suppliers')->paginate(15);

        return view("market.suppliers", ['suppliers' => $suppliers]);
    }

    public function getSupplierById($id){
        $supplier = Supplier::where('id', $id)->first();
        return view("market.single-supplier", compact('supplier'));
    }

    public function deleteSupplier($id){
        $supplier = Supplier::where('id', $id)->delete();
        return back()->with("supplier_deleted", "Supplier has been deleted successfully");
    }

    public function editSupplier($id){
        $supplier = Supplier::find($id);
        return view("market.edit-supplier", compact('supplier'));
    }

    public function updateSupplier(Request $request){
        $supplier = Supplier::find($request->id);
        $supplier->name = $request->name;
        $supplier->surname = $request->surname;
        $supplier->organization = $request->organization;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->other_contact = $request->other_contact;
        $supplier->supplies = $request->supplies;
        $supplier->profit_index = $request->profit_index;
        $supplier->relative_distance = $request->relative_distance;
        $supplier->save();

        return back()->with("supplier_updated", "Supplier has been updated successfully");
    }
}
