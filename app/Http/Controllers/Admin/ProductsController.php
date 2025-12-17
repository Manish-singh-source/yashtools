<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Categories;
use App\Models\MorphHistory;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;
use App\Services\LeadTimeExcelService;

class ProductsController extends Controller
{
    public function viewProduct()
    {
        $brands = Brand::get();
        $categories = Categories::get();
        $subcategories = SubCategories::get();
        return view('admin.add-product', compact('brands', 'categories', 'subcategories'));
    }

    public function addProducts(Request $request)
    {
        // Validate the request
        // product_quantity'numeric
        // product_price numeric

        $validations = Validator::make($request->all(), [
            'product_name' => 'nullable',
            'product_quantity' => 'nullable|numeric',
            'product_price' => 'nullable|numeric',
            'product_days_to_dispatch' => 'nullable|numeric|min:0',
            'product_description' => 'nullable',
            'product_specs' => 'nullable|mimes:xlsx,csv,xls|max:10240',
            'lead_time_excel' => 'nullable|mimes:xlsx,csv,xls|max:10240',
            'product_brand' => 'nullable',
            'product_image' => 'nullable|image|max:10240',
            'product_pdf' => 'nullable|mimes:pdf|max:10240',
            'product_country_of_origin' => 'nullable',
            'product_catalogue' => 'nullable|mimes:pdf|max:10240',
            'product_optional_pdf' => 'nullable|image|max:10240',
            'product_drawing' => 'nullable|mimes:pdf,jpg,jpeg,png|max:10240',
            'product_category' => 'nullable',
            'product_sub_category' => 'nullable',
        ]);

        // Check validation errors
        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        try {
            // Create new product
            $product = new Product();
            $product->product_name = $request->product_name;
            $product->product_quantity = $request->product_quantity;
            $product->product_price = $request->product_price;
            $product->product_dispatch = $request->product_days_to_dispatch;
            $product->product_discription = $request->product_description;
            $product->product_country_of_origin = $request->product_country_of_origin ?? "";

            // Handle image upload
            if (!empty($request->product_specs)) {
                $product_specs = $request->product_specs;
                $excelExt = $product_specs->getClientOriginalExtension();
                $filename = time() . "." . $excelExt;
                $product_specs->move(public_path('/uploads/products/product_specs'), $filename);
                $product->product_specs = $filename;
                $product->specification_added = 1;

                // check if uploaded file is containing 'price' and 'quantity' columns
                // $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(
                //     public_path('/uploads/products/product_specs/' . $filename)
                // );

                // $sheetData = $spreadsheet->getActiveSheet()->toArray();
                // $headers = $sheetData[0];

                // // Normalize headers: lowercase + remove whitespaces
                // $normalizedHeaders = array_map(function ($header) {
                //     return strtolower(preg_replace('/\s+/', '', trim($header)));
                // }, $headers);

                // // Find required columns
                // $priceColumn = array_search('price', $normalizedHeaders);
                // $quantityColumn = array_search('quantity', $normalizedHeaders);

                // if ($priceColumn !== false && $quantityColumn !== false) {
                //     $product->specification_added = 1;
                // } else {
                //     $product->specification_added = 0;
                // }
            }

            if (!empty($request->product_optional_pdf)) {
                $product_optional_pdf = $request->product_optional_pdf;
                $opPdfFile = $product_optional_pdf->getClientOriginalExtension();
                $opFile = time() . "." . $opPdfFile;
                $product_optional_pdf->move(public_path('/uploads/products/product_optional_pdf'), $opFile);
                $product->product_optional_pdf = $opFile;
            }

            if (!empty($request->product_image)) {
                $image1 = $request->product_image;
                $ext1 = $image1->getClientOriginalExtension();
                $imageName1 = time() . "." . $ext1;
                $image1->move(public_path('/uploads/products/thumbnails'), $imageName1);
                $product->product_thumbain = $imageName1;

                // converting image as thumbnail
                $manager = new ImageManager(Driver::class);
                $img = $manager->read(public_path('/uploads/products/thumbnails/' . $imageName1));
                $img->cover(150, 150);


                $thumbPath = public_path('/uploads/products/thumbnails/thumb/');
                if (!file_exists($thumbPath)) {
                    mkdir($thumbPath, 0755, true); // Create thumbnail directory if it doesn't exist
                }

                $img->save($thumbPath . '/' . $imageName1);
            }

            // Handle PDF upload
            if (!empty($request->product_pdf)) {
                $image2 = $request->product_pdf;
                $ext2 = $image2->getClientOriginalExtension();
                $imageName2 = time() . "." . $ext2;
                $image2->move(public_path('/uploads/products/pdf'), $imageName2);
                $product->product_pdf = $imageName2;
            }

            // Handle catalogue upload
            if (!empty($request->product_catalogue)) {
                $image3 = $request->product_catalogue;
                $ext3 = $image3->getClientOriginalExtension();
                $imageName3 = time() . "." . $ext3;
                $image3->move(public_path('/uploads/products/catalogue'), $imageName3);
                $product->product_catalouge = $imageName3;
            }

            // Handle drawing upload
            if (!empty($request->product_drawing)) {
                $image4 = $request->product_drawing;
                $ext4 = $image4->getClientOriginalExtension();
                $imageName4 = time() . "." . $ext4;
                $image4->move(public_path('/uploads/products/drawing'), $imageName4);
                $product->product_drawing = $imageName4;
            }

            // Handle Lead Time Excel file processing
            if (!empty($request->lead_time_excel)) {
                $leadTimeService = new LeadTimeExcelService();

                // Validate the Excel file
                $validationResult = $leadTimeService->validateLeadTimeExcel($request->lead_time_excel);

                if ($validationResult['success']) {
                    // Save the Excel file
                    $saveResult = $leadTimeService->saveLeadTimeExcel($request->lead_time_excel);

                    if ($saveResult['success']) {
                        $product->lead_time = $saveResult['filename'];
                    } else {
                        return redirect()->back()
                            ->withErrors(['lead_time_excel' => $saveResult['message']])
                            ->withInput();
                    }
                } else {
                    return redirect()->back()
                        ->withErrors(['lead_time_excel' => $validationResult['message']])
                        ->withInput();
                }
            }

            // Save additional product details
            $product->product_brand_id = $request->product_brand;
            $product->product_category_id = $request->product_category;
            $product->product_sub_category_id = $request->product_sub_category;
            $product->product_arrivals = $request->new_products ?? "";
            $product->product_sale = $request->new_offer ?? "";
            $product->save();
            return redirect()->route('admin.table.product');
        } catch (\Throwable $th) {
            return back()->with('error', 'Please Try Again.');
        }
    }


    public function viewProductTable()
    {
        $products = Product::with('categories')->with('subcategories')->with('brands')->orderBy('updated_at', 'desc')->get();
        return view('admin.product-table', compact('products'));
    }


    public function deleteProduct(Request $request)
    {

        $product = Product::where('product_slug', $request->product_slug)->first();
        if (!empty($product->product_optional_pdf)) {
            File::delete(public_path('/uploads/products/product_optional_pdf/' . $product->product_optional_pdf));
        }
        if (!empty($product->product_catalouge)) {
            File::delete(public_path('/uploads/products/catalogue/' . $product->product_catalouge));
        }
        if (!empty($product->product_pdf)) {
            File::delete(public_path('/uploads/products/pdf/' . $product->product_pdf));
        }
        if (!empty($product->product_drawing)) {
            File::delete(public_path('/uploads/products/drawing/' . $product->product_drawing));
        }
        if (!empty($product->product_thumbain)) {
            File::delete(public_path('/uploads/products/thumbnails/' . $product->product_thumbain));
        }
        if (!empty($product->lead_time)) {
            $leadTimeService = new LeadTimeExcelService();
            $leadTimeService->deleteLeadTimeExcel($product->lead_time);
        }

        $product->delete();

        MorphHistory::create([
            'admin_id' => Auth::id(),
            'modifiable_id' => $product->id,
            'modifiable_type' => get_class($product),
            'action' => 'deleted', // or 'updated', 'restored'
        ]);

        if ($product) {
            return back()->with('success', 'Successfully Deleted Product');
        }
        return back()->with('error', 'Please Try Again.');
    }


    public function editProduct(String $slug)
    {
        $brands = Brand::get();
        $categories = Categories::get();
        $subcategories = SubCategories::get();

        $selectedProduct = Product::where('product_slug', $slug)->first();
        return view('admin.edit-product', compact('brands', 'categories', 'subcategories', 'selectedProduct'));
    }

    public function updateProduct(Request $request)
    {
        // Validate the request
        $validations = Validator::make($request->all(), [
            'productId' => 'required',
            'product_name' => 'nullable',
            'product_quantity' => 'nullable|numeric',
            'product_price' => 'nullable|numeric',
            'product_days_to_dispatch' => 'nullable|numeric|min:0',
            'product_specs' => 'nullable|mimes:xlsx,csv,xls|max:10240',
            'lead_time_excel' => 'nullable|mimes:xlsx,csv,xls|max:10240',
            'product_description' => 'nullable',
            'product_brand' => 'nullable',
            'product_image' => 'nullable|image|max:10240',
            'product_optional_pdf' => 'nullable|image|max:10240',
            'product_pdf' => 'nullable|mimes:pdf|max:10240',
            'product_country_of_origin' => 'nullable',
            'product_catalogue' => 'nullable|mimes:pdf|max:10240',
            'product_drawing' => 'nullable|mimes:pdf,jpg,jpeg,png|max:10240',
            'product_category' => 'nullable',
            'product_sub_category' => 'nullable',
        ]);

        // Check validation errors
        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }
        // Create new product
        $product = Product::find($request->productId);
        $product->product_name = $request->product_name ?? "";
        $product->product_quantity = $request->product_quantity ?? "";
        $product->product_price = $request->product_price ?? "";
        $product->product_dispatch = $request->product_days_to_dispatch ?? "";
        $product->product_discription = $request->product_description ?? "";
        $product->product_country_of_origin = $request->product_country_of_origin ?? "";

        // Handle image upload
        if (!empty($request->product_specs)) {
            if (!empty($product->product_specs)) {
                File::delete(public_path('/uploads/products/product_specs/' . $product->product_specs));
            }

            $product_specs = $request->product_specs;
            $excelExt = $product_specs->getClientOriginalExtension();
            $filename = time() . "." . $excelExt;
            $product_specs->move(public_path('/uploads/products/product_specs'), $filename);
            $product->product_specs = $filename;

            $product->specification_added = 1;

            // check if uploaded file is containing 'price' and 'quantity' columns
            // $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(
            //     public_path('/uploads/products/product_specs/' . $filename)
            // );

            // $sheetData = $spreadsheet->getActiveSheet()->toArray();
            // $headers = $sheetData[0];

            // Normalize headers: lowercase + remove whitespaces
            // $normalizedHeaders = array_map(function ($header) {
            //     return strtolower(preg_replace('/\s+/', '', trim($header)));
            // }, $headers);

            // Find required columns
            // $priceColumn = array_search('price', $normalizedHeaders);
            // $quantityColumn = array_search('quantity', $normalizedHeaders);

            // if ($priceColumn !== false && $quantityColumn !== false) {
            //     $product->specification_added = 1;
            // } else {
            //     $product->specification_added = 0;
            // }
        }else{
            $product->specification_added = 0;
        }

        if (!empty($request->product_optional_pdf)) {
            if (!empty($product->product_optional_pdf)) {
                File::delete(public_path('/uploads/products/product_optional_pdf/' . $product->product_optional_pdf));
            }
            $product_optional_pdf = $request->product_optional_pdf;
            $opPdfFile = $product_optional_pdf->getClientOriginalExtension();
            $opFile = time() . "." . $opPdfFile;
            $product_optional_pdf->move(public_path('/uploads/products/product_optional_pdf'), $opFile);
            $product->product_optional_pdf = $opFile;
        }

        // Handle image upload
        if (!empty($request->product_image)) {
            if (!empty($product->product_thumbain)) {
                File::delete(public_path('/uploads/products/thumbnails/' . $product->product_thumbain));
            }

            $image1 = $request->product_image;
            $ext1 = $image1->getClientOriginalExtension();
            $imageName1 = time() . "." . $ext1;
            $image1->move(public_path('/uploads/products/thumbnails'), $imageName1);
            $product->product_thumbain = $imageName1;
        }

        // Handle PDF upload
        if (!empty($request->product_pdf)) {

            if (!empty($product->product_pdf)) {
                File::delete(public_path('/uploads/products/pdf/' . $product->product_pdf));
            }

            $image2 = $request->product_pdf;
            $ext2 = $image2->getClientOriginalExtension();
            $imageName2 = time() . "." . $ext2;
            $image2->move(public_path('/uploads/products/pdf'), $imageName2);
            $product->product_pdf = $imageName2;
        }

        // Handle catalogue upload
        if (!empty($request->product_catalogue)) {

            if (!empty($product->product_catalouge)) {
                File::delete(public_path('/uploads/products/catalogue/' . $product->product_catalouge));
            }

            $image3 = $request->product_catalogue;
            $ext3 = $image3->getClientOriginalExtension();
            $imageName3 = time() . "." . $ext3;
            $image3->move(public_path('/uploads/products/catalogue'), $imageName3);
            $product->product_catalouge = $imageName3;
        }

        // Handle drawing upload
        if (!empty($request->product_drawing)) {

            if (!empty($product->product_drawing)) {
                File::delete(public_path('/uploads/products/drawing/' . $product->product_drawing));
            }

            $image4 = $request->product_drawing;
            $ext4 = $image4->getClientOriginalExtension();
            $imageName4 = time() . "." . $ext4;
            $image4->move(public_path('/uploads/products/drawing'), $imageName4);
            $product->product_drawing = $imageName4;
        }

        // Handle Lead Time Excel file processing
        if (!empty($request->lead_time_excel)) {
            $leadTimeService = new LeadTimeExcelService();

            // Delete old Lead Time file if it exists
            if (!empty($product->lead_time)) {
                $leadTimeService->deleteLeadTimeExcel($product->lead_time);
            }

            // Validate the new Excel file
            $validationResult = $leadTimeService->validateLeadTimeExcel($request->lead_time_excel);

            if ($validationResult['success']) {
                // Save the new Excel file
                $saveResult = $leadTimeService->saveLeadTimeExcel($request->lead_time_excel);

                if ($saveResult['success']) {
                    $product->lead_time = $saveResult['filename'];
                } else {
                    return redirect()->back()
                        ->withErrors(['lead_time_excel' => $saveResult['message']])
                        ->withInput();
                }
            } else {
                return redirect()->back()
                    ->withErrors(['lead_time_excel' => $validationResult['message']])
                    ->withInput();
            }
        }

        // Save additional product details
        $product->product_brand_id = $request->product_brand ?? "";
        $product->product_category_id = $request->product_category ?? "";
        $product->product_sub_category_id = $request->product_sub_category ?? "";
        $product->product_arrivals = $request->new_products ?? "";
        $product->product_sale = $request->new_offer ?? "";
        $product->save();

        MorphHistory::create([
            'admin_id' => Auth::id(),
            'modifiable_id' => $product->id,
            'modifiable_type' => get_class($product),
            'action' => 'updated', // or 'deleted', 'restored'
        ]);

        return redirect()->route('admin.table.product');
    }

    public function detailProduct(String $slug)
    {
        $productDetails = Product::with('categories')->with('subcategories')->with('brands')->where('product_slug', $slug)->first();
        return view('admin.product-details', compact('productDetails'));
    }
}
