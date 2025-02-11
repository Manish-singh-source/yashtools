<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function viewAddBanner()
    {
        return view('admin.add-banner');
    }

    public function addBanner(Request $request)
    {
        $validations = Validator::make($request->all(), [
            "bannerImage" => "image",
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        $banner = new Banner();

        if (!empty($request->bannerImage)) {

            $image = $request->bannerImage;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('uploads/banner'), $imageName);

            $banner->banner_image = $imageName;
        }

        if (!empty($request->bannerTitle)) {
            $banner->banner_title = $request->bannerTitle;
        }

        if (!empty($request->bannerDesciption)) {
            $banner->banner_description = $request->bannerDesciption;
        }

        $banner->save();

        return redirect()->route('admin.view.banner.table');
    }

    public function viewBannerTable()
    {
        $banners = Banner::orderBy('created_at', 'desc')->get();
        return view('admin.Banner-table', compact('banners'));
    }


    public function deleteBanner(Request $request)
    {
        $banner = Banner::find($request->bannerId);
        if (!empty($banner->banner_image)) {
            File::delete(public_path('/uploads/banner/' . $banner->banner_image));
        }

        if (!empty($request->bannerTitle)) {
            $banner->banner_title = $request->bannerTitle;
        }

        if (!empty($request->bannerDesciption)) {
            $banner->banner_description = $request->bannerDesciption;
        }

        $banner->delete();

        if ($banner) {
            return back()->with('success', 'Successfully Deleted Banner Image');
        }

        return back()->with('error', 'Please Try Again.');
    }

    public function editBanner(String $id)
    {
        $banner = Banner::find($id);
        return view('admin.edit-banner', compact('banner'));
    }

    public function updateBanner(Request $request)
    {

        $banner = Banner::find($request->bannerId);
        if (!empty($request->bannerTitle)) {
            $banner->banner_title = $request->bannerTitle;
        }

        if (!empty($request->bannerDesciption)) {
            $banner->banner_description = $request->bannerDesciption;
        }

        if (!empty($banner->banner_image)) {
            File::delete(public_path('/uploads/banner/' . $banner->banner_image));
        }
        if (!empty($request->banner_image)) {
            $image = $request->banner_image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('uploads/banner'), $imageName);

            $banner->banner_image = $imageName;
        }

        $banner->save();

        return redirect()->route('admin.view.banner.table');
    }
}
