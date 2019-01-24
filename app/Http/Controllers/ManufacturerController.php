<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;


class ManufacturerController extends Controller {

    public function createManufacturer() {
        return view('admin.manufacturer.createManufacturer');
    }

    public function storeManufacturer(Request $request) {
        $request->validate([
            'manufacturerName' => 'required',
            'manufacturerDescription' => 'required',
            'publicationStatus' => 'required',
        ]);
        //pr ar kaj hobe dd
        //dd($request->all());

        Manufacturer::create($request->all());

        return redirect('/manufacturer/add')->with('message', 'Manufacturer Info save successfully');
    }

//
    public function manageManufacturer() {
        $manufacturers = Manufacturer::all();

        return view('admin.manufacturer.manageManufacturer', ['manufacturers' => $manufacturers]);
    }
//
    public function editManufacturer($id = 0) {
        $manufacturerById = Manufacturer::where('id', $id)->first();
        return view('admin.manufacturer.editManufacturer', ['manufacturerById' => $manufacturerById]);
    }
//
    public function updateManufacturer(Request $request) {
        $request->validate([
            'manufacturerName' => 'required',
            'manufacturerDescription' => 'required',
            'publicationStatus' => 'required',
        ]);

        $manufacturer = Manufacturer::find($request->id);
        $manufacturer->manufacturerName = $request->manufacturerName;
        $manufacturer->manufacturerDescription = $request->manufacturerDescription;
        $manufacturer->publicationStatus = $request->publicationStatus;
        $manufacturer->save();

        return redirect('/manufacturer/manage')->with('message', 'Manufacturer Info has UPDATED successfully');
    }
//
    public function deleteManufacturer($id = 0) {
        $manufacturer = Manufacturer::find($id);
        $manufacturer->delete();
        return redirect('/manufacturer/manage')->with('message', 'Manufacturer has deleted successfully');
    }
}
