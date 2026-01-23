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
            "bannerImage" => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,webp',
                'max:2048', // 2MB
                'dimensions:min_width=1920,min_height=1080,max_width=1920,max_height=1080'
            ],
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        $banner = new Banner();

        if (!empty($request->bannerImage)) {

            $image = $request->bannerImage;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('/uploads/banner'), $imageName);

            $banner->banner_image = $imageName;
        }

        if (!empty($request->bannerTitle)) {
            $banner->banner_title = $request->bannerTitle;
        }

        if (!empty($request->bannerDesciption)) {
            $banner->banner_description = $request->bannerDesciption;
        }

        $banner->save();
        flash()->success('Slider Added Successfully.');
        return redirect()->route('admin.view.banner.table');
    }

    public function viewBannerTable()
    {
        $banners = Banner::orderBy('created_at', 'desc')->get();
        return view('admin.Banner-table', compact('banners'));
    }


    public function deleteBanner(Request $request)
    {
        $banner = Banner::where('slug', $request->bannerSlug)->first();
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
            return back()->with('success', 'Successfully Deleted Slider');
        }

        return back()->with('error', 'Please Try Again.');
    }

    public function editBanner(String $slug)
    {
        $banner = Banner::where('slug', $slug)->first();
        return view('admin.edit-banner', compact('banner'));
    }

    public function updateBanner(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'bannerTitle' => 'nullable|string|min:3|max:255',
            'bannerDesciption' => 'nullable|string|max:1000',
            'banner_image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,webp',
                'max:5120', // 5MB
                'dimensions:min_width=1920,min_height=1080,max_width=1920,max_height=1080'
            ],
        ], [
            'bannerTitle.required' => 'Banner title is required.',
            'bannerTitle.min' => 'Title must be at least 3 characters.',
            'bannerTitle.max' => 'Title cannot exceed 255 characters.',
            'bannerDesciption.max' => 'Description cannot exceed 1000 characters.',
            'banner_image.dimensions' => 'Image must be exactly 1920x1080 pixels.',
            'banner_image.max' => 'Image size cannot exceed 5MB.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $banner = Banner::find($request->bannerId);
        $banner->banner_title = $request->bannerTitle;
        $banner->banner_description = $request->bannerDesciption;

        if (!empty($request->banner_image)) {
            if (!empty($banner->banner_image)) {
                File::delete(public_path('/uploads/banner/' . $banner->banner_image));
            }
            $image = $request->banner_image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('/uploads/banner'), $imageName);

            $banner->banner_image = $imageName;
        }

        $banner->save();

        flash()->success('Slider Updated Successfully.');
        return redirect()->route('admin.view.banner.table');
    }
}
