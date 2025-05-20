<?php

namespace App\Http\Controllers;

use App\Models\CarBrand;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        return view('panel.admin.index');
    }

    public function carBrandIndexPage()
    {
        $brand = CarBrand::all();
        return view('panel.admin.carBrand.index', compact('brand'));
    }

    public function carBrandCreatePage()
    {
        return view('panel.admin.carBrand.create');
    }
    public function carBrandAddPage(Request $request)
    {
        $request->validate([
            'brandName' => 'required|min:3|unique:car_brands,name',
        ]);
        $brand = new CarBrand();
        $brand->name = $request->brandName;
        $brand->save();

        return redirect()->back();
    }
    public function carBrandUpdatePage($id)
    {
        $brand = CarBrand::find($id);
        return view('panel.admin.carBrand.update', compact('brand'));
    }
    public function carBrandUpdate(Request $request){
        $request->validate([
            'brandName' => 'required|min:3|unique:car_brands,name',
            'brandID' => 'required|numeric',
        ]);
        $oldBrand = CarBrand::find($request->brandID);
        $oldBrand->name = $request->brandName;
        $oldBrand->save();

        return redirect()->route('carBrandIndexPage');
    }
}
