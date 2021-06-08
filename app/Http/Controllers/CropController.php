<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;

class CropController extends Controller
{
    public function addCrop(){
        return view('crop.add-crop');
    }

    public function createCrop(Request $request){
        $crop = new Crop();
        $crop->name = $request->name;
        $crop->quantity = $request->quantity;
        $crop->plant_time = $request->plant_time;
        $crop->selling_price_pu = $request->selling_price_pu;
        $crop->buying_price_pu = $request->buying_price_pu;
        $crop->info = $request->info;
        $crop->save();

        return back()->with("crop_created", "Crop has been created successfully");
    }

    public function getCrop(){
        $crops = Crop::orderBy('id')->get();
        return view("crop.crop", compact('crops'));
    }

    public function getCropById($id){
        $crop = Crop::where('id', $id)->first();
        return view("crop.single-crop", compact('crop'));
    }

    public function deleteCrop($id){
        $crop = Crop::where('id', $id)->delete();
        return back()->with("crop_deleted", "Crop has been deleted successfully");
    }

    public function editCrop($id){
        $crop = Crop::find($id);
        return view("crop.edit-crop", compact('crop'));
    }

    public function updateCrop(Request $request){
        $crop = Crop::find($request->id);
        $crop->name = $request->name;
        $crop->quantity = $request->quantity;
        $crop->plant_time = $request->plant_time;
        $crop->selling_price_pu = $request->selling_price_pu;
        $crop->buying_price_pu = $request->buying_price_pu;
        $crop->info = $request->info;
        $crop->save();

        return back()->with("crop_updated", "Crop has been updated successfully");
    }
}
