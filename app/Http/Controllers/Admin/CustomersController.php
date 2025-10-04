<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Enquiry;
use App\Models\Categories;
use App\Models\UserDetail;
use App\Models\UserCategory;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class CustomersController extends Controller
{
    public function customersList()
    {
        $customers = User::with('userDetail')->where('role', 'customer')->orderBy('created_at', 'desc')->get();
        return view('admin.customer-list', compact('customers'));
    }

    public function deleteCustomer(Request $request)
    {
        $customer = User::find($request->customerId);
        $customer->delete();

        if ($customer) {
            return back()->with('success', 'Successfully Deleted Customer');
        }
        return back()->with('error', 'Please Try Again.');
    }

    public function customerOverview(String $id)
    {
        $customerDetail = User::with('userDetail')->with('enquiries.products')->where('role', 'customer')->find($id);
        $orders = Enquiry::where('customer_id', $id)->whereIn('id', function ($query) {
            $query->selectRaw('MIN(id)')
                ->from('enquiries')
                ->groupBy('enquiry_id');
            })
            ->orderBy('id', 'desc')
            ->with('customer')->get();
        return view('admin.customer-overview', compact('customerDetail', 'orders'));
    }

    public function editCustomerDetails(String $id)
    {
        $customerDetail = User::with('userDetail')->where('role', 'customer')->find($id);
        return view('admin.edit-customer', compact('customerDetail'));
    }

    public function updateCustomerDetails(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'customer_id' => 'required',
            "company_name" => "required",
            "fullname" => "required",
            "company_address" => "required",
            "mobile_number" => "required|digits:10",
            "gstin" => "required",
            "city" => "required",
            "state" => "required",
            "country" => "required",
            "pin_code" => "required|digits:6",
            "email" => "required",
            'customer_type' => 'required',
        ]);


        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        $user = User::find($request->customer_id);
        $user->fullname = $request->fullname;
        $user->mobile_number = $request->mobile_number;
        $user->customer_type = $request->customer_type;
        $user->save();

        $userdetail = UserDetail::where('user_id', $user->id)->first();
        if (isset($userdetail)) {
            $userdetail->company_name = $request->company_name;
            $userdetail->company_address = $request->company_address;
            $userdetail->city = $request->city;
            $userdetail->state = $request->state;
            $userdetail->country = $request->country;
            $userdetail->pincode = $request->pin_code;
            $userdetail->gstin = $request->gstin;
            $userdetail->save();
        } else {
            $userdetail = new UserDetail();
            $userdetail->user_id = $user->id;
            $userdetail->company_name = $request->company_name;
            $userdetail->company_address = $request->company_address;
            $userdetail->city = $request->city;
            $userdetail->state = $request->state;
            $userdetail->country = $request->country;
            $userdetail->pincode = $request->pin_code;
            $userdetail->gstin = $request->gstin;
            $userdetail->save();
        }

        if ($user) {
            flash()->success('Customer Details Updated Successfully.');
            return redirect()->route('admin.customers.list');
        }

        return back()->with('error', 'Please Try Again.');
    }

    public function showCustomerCategoryPercentage(Request $request)
    {
        $userCategories = UserCategory::with('subcategory')->get();
        return view('admin.customer-category-percentage-list', compact('userCategories'));
    }

    public function addCustomerCategoryPercentage(Request $request)
    { 
        $user_roles = ['loyal', 'regular', 'dealer'];
        $subcategories = SubCategories::all();
        return view('admin.add-customer-category-percentage', compact('subcategories', 'user_roles'));
    }

    public function editCustomerCategoryPercentage($id)
    {
        $user_roles = ['loyal', 'regular', 'dealer'];
        $subcategories = SubCategories::all();
        $userCategory = UserCategory::find($id);
        return view('admin.update-customer-category-percentage', compact('subcategories', 'user_roles', 'userCategory'));
    }

    public function storeCustomerCategoryPercentage(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'user_role' => 'required',
            'sub_category_id' => 'required',
            "percentage" => "required",
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }
        $userCategory = UserCategory::where('user_role', $request->user_role)->where('sub_category_id', $request->sub_category_id)->first();
        if (isset($userCategory)) {
            return back()->withInput()->with('error', 'Category Already Exists for this User Role.');
        } else {
            $userCategory = new UserCategory();
            $userCategory->user_role = $request->user_role;
            $userCategory->sub_category_id = $request->sub_category_id;
            $userCategory->percentage = $request->percentage;
            $userCategory->save();
        }
        if ($userCategory) {
            flash()->success('Customer Category Percentage Added Successfully.');
            return redirect()->route('admin.show-customer-category-percentage');
        }

        return back()->with('error', 'Please Try Again.');
    }


    public function updateCustomerCategoryPercentage(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'id' => 'required',
            'user_role' => 'required',
            'sub_category_id' => 'required',
            "percentage" => "required",
        ]);
        
        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }
        
        $userCategory = UserCategory::find($request->id);
        if (isset($userCategory)) {
            if($request->sub_category_id != $userCategory->sub_category_id){
                $checkCategory = UserCategory::where('user_role', $request->user_role)->where('sub_category_id', $request->sub_category_id)->first();
                if (isset($checkCategory)) {
                    return back()->withInput()->with('error', 'Category Already Exists for this User Role.');
                }
            }
            $userCategory->percentage = $request->percentage ?? 0;
            $userCategory->save();
        } else {
            return back()->withInput()->with('error', 'Category Already Exists for this User Role.');
        }

        if ($userCategory) {
            flash()->success('Customer Category Percentage Updated Successfully.');
            return redirect()->route('admin.show-customer-category-percentage');
        }

        return back()->with('error', 'Please Try Again.');
    }

    public function deleteCustomerCategoryPercentage(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'user_role' => 'required',
            'sub_category_id' => 'required',
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        $userCategory = UserCategory::where('user_role', $request->user_role)->where('sub_category_id', $request->sub_category_id)->first();
        if (isset($userCategory)) {
            UserCategory::where('user_role', $request->user_role)->where('sub_category_id', $request->sub_category_id)->delete();
        }

        if ($userCategory) {
            flash()->success('Customer Category Percentage Deleted Successfully.');
            return redirect()->route('admin.show-customer-category-percentage');
        }

        return back()->with('error', 'Please Try Again.');
    }

}
