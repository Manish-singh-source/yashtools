<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //
    public function viewAddBrand()
    {
        return view('admin.add-brand');
    }
    public function addBrand(Request $request)
    {

    }
    public function viewBrandTable()
    {
        return view('admin.brand-table');
    }
    // public function deleteBrand() {

    // }
    public function editBrand()
    {
        return view('admin.edit-brand');
    }
    // public function updateBrand() {

    // }
}
