<?php

namespace App\Http\Controllers;

use App\Mail\AccountReviewMailer;
use App\Mail\PartnerJoined;
use App\Mail\FoodPartnerJoined;
use App\Mail\ToFoodPartnerMail;
use App\Mail\ToPartnerMail;
use App\Mail\VendorVerifiedMail;
use App\Mail\ToVerifiedVendorMail;
use App\Mail\VendorInstructions;
use App\Models\GetCandyCountryVendor;
use App\Models\Partner;
use App\Models\Region;
use App\Models\VendorRegisterRequest;
use App\Models\VendorRequestVerificationLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Vendor;
use Illuminate\Support\Composer;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
  public function index(){

    //create a vendor country
    //relate a vendor to a create in the form
    //

  


    return view('partner');
  }


  public function submitForm(Request $request)
  {


    dd($request->all());

    
    // return $request;
    $fields = $this->validate($request, [
      'business_name' => 'required|string|min:3|max:255|unique:vendor_register_requests',
      'email' => 'required|string|email|max:255|unique:vendor_register_requests',
      'phone_number' => 'required|digits:10|unique:vendor_register_requests',
      'city' => 'required|string',
      'country'=> 'required',
      'location' => 'required|string',
      'business_type' => 'required|string',
      'tin' => 'required',
      'region' => 'required',
      'business_registration_number' => 'required',
      "contact_phone"=> 'required|digits:10',
      'first_name' => 'required',
      'last_name' => 'required',
      "contact_email"=> "required|string|email|max:255|unique:vendor_register_requests",

      "payment_type" => 'required',
    //  'bank_name' => 'required',
    // 'bank_option'=> 'required',
     //'momo_option'=> 'required',
      'account_number' => 'required',
      "account_name" => 'required'


    ]);


        // return $request->file('trademark')->getClientOriginalName() ;

    if ($fields){



            // $tin = $request->file('tin'); // will get all files
            // $business_registration_number = $request->file('business_registration_number'); // will get all files
            // $trademark = $request->file('trademark'); // will get all files

            // $file_tin = $tin->getClientOriginalName(); //Get file original name
            // $file_brn = $tin->getClientOriginalName(); //Get file original name
            // $file_trademark = $trademark->getClientOriginalName(); //Get file original name

            // $tin->storeAs('/public/',$request->email."_".$file_tin);
            // $business_registration_number->storeAs('/public/',$request->business_name."_".$file_brn);
            // $filetrademark->storeAs('/public/',$request->business_name."_".$file_trademark);


            $partners = [];
            if( $shop_logo = $request->file('trademark') ){
                $name = $shop_logo->getClientOriginalName();
                $path =  $shop_logo->storeAs('/public/',$request->business_name."_".$name);
                $partners['trademark'] = config('app.url').'/storage/'.$request->business_name."_".$name;



            }
            else{
                $partners['trademark'] = "";
            }


            $partners['business_name'] = $request->business_name;
            $partners['email'] = $request->email;
            $partners['phone_number'] = $request->phone_number;
            $partners['region_id']= $request->region;
            $partners['city'] = $request->city;
            $partners['location'] = $request->location;
            $partners['business_type'] = $request->business_type;
            $partners['business_registration_number'] = $request->business_registration_number;
            $partners['tin'] = $request->tin;

            $partners['first_name'] = $request->first_name;
            $partners['last_name'] = $request->last_name;
            $partners['contact_email'] = $request->contact_email;
            $partners['contact_phone'] = $request->contact_phone;
            $partners['alternative_phone'] = $request->alternative_phone ;

            $partners['payment_type'] = $request->payment_type ;


            $partners['bank_branch'] = $request->bank_branch;
            if($request->momo_option || $request->payment_type == "momo"){
                $partners["bank_account_number"] = $request->account_number;
                $partners["bank_account_name"] = $request->account_name;
                $partners['bank_name'] = $request->momo_option;
            }else if($request->bank_option || $request->payment_type == "bank" ){
                $partners['bank_account_number'] = $request->account_number;
                $partners['bank_account_name'] = $request->account_name;
                $partners['bank_branch'] = $request->bank_branch;
                $partners['bank_name'] = $request->bank_option;

            }

            $partners['billing_address'] = $request->billing_address;


            $partner = VendorRegisterRequest::create($partners);

            $token = Str::random(116);
            VendorRequestVerificationLink::insert(
                [
                    [
                        'token' => $token,
                        'vendor_id' => $partner->id,
                        'expired' => 0,
                        'created_at' => date('Y-m-d H:i:s')
                    ]
                ]
            );

            if ($partners['business_type'] == 'Restaurant' || $partners['business_type'] == 'Cake') {
              Mail::to('sales@shaqexpress.com')->send(new FoodPartnerJoined($partners, $token));
               //Mail::to($request->email)->send(new ToFoodPartnerMail($partners, $token));
               Mail::to($request->email)->send(new VendorInstructions());
                return back()->with([
                    'success' => 'Thank you for submitting your request. We will contact you soon to take you through the final stages of the onboarding process.'
                ]);
            }


           Mail::to('sales@shaqexpress.com')->send(new PartnerJoined($partners, $token));
           //Mail::to($request->email)->send(new ToPartnerMail($partners, $token));
           //Mail::to($request->email)->send(new VendorInstructions());
            return back()->with([
                'success' => 'Thank you for submitting your request. We will contact you soon to take you through the final stages of the onboarding process.'
            ]);
        }



  }

  public function verifyVendor(Request $request)
  {
    $id = $request->id;
      $this->validate($request, [
      'restaurant_name' => 'required|string|min:3|max:255',
      'email_address' => 'required|string|email|max:255',
      'phone_number' => 'required|digits:10',
      'location' => 'required|string',
      'tin_num' => 'required|string',
      'biz_reg_num' => 'required|string',
      'bank_name' => 'required|string',
      'bank_branch' => 'required|string',
      'bank_number' => 'required|numeric',
      'billing_address' => 'required|string',
      'bank_account_name' => 'required|string',
    ]);

    $vendor = VendorRegisterRequest::find($id);
    $vendor->tin = $request->tin_num;
    $vendor->business_registration_number = $request->biz_reg_num;
    $vendor->bank_name = $request->bank_name;
    $vendor->billing_address = $request->billing_address;
    $vendor->bank_account_number = $request->bank_number;
    $vendor->business_registration_number = $request->biz_reg_num;
    $vendor->bank_branch = $request->bank_branch;
    $vendor->save();
    $checkVendor = Vendor::where('restaurant_name', $vendor->business_name)->where('phone', $vendor->phone_number)->first();
    if($checkVendor != null){
    $newVendor = Vendor::find($checkVendor->id);
    $newVendor->restaurant_name = $vendor->business_name;
    $newVendor->email = $vendor->email;
    $newVendor->phone = $vendor->phone_number;
    $newVendor->location = $vendor->location;
    $newVendor->tin = $vendor->tin_num;
    $newVendor->business_registration = $vendor->business_registration_number;
    $newVendor->bank_name = $vendor->bank_name;
    $newVendor->billing_address = $vendor->billing_address;
    $newVendor->bank_branch = $vendor->bank_branch;
    $newVendor->account_number = $vendor->bank_account_number;
    $newVendor->account_name = $vendor->bank_account_name;
    $newVendor->slug = str_replace(' ', '-', $vendor->business_name);
    $newVendor->save();
    }
    \Mail::to($request->email_address)->send(new AccountReviewMailer());
    return back()->with([
      'success-verified' => 'Thank you for submitting your request. We will notify you when you account is verified'
    ]);
  }
  public function verify($token)
  {
    $vendor = VendorRequestVerificationLink::where('token', $token)->first();
    if($vendor == null){
      return "sorry this URL has expired. To our site <a href='https://partnership.shaqexpress.com'>Shaq Express</a>";
    }else{
    $vendorDetails = VendorRegisterRequest::find($vendor->vendor_id);
    return view('verify-form', compact('vendorDetails'));
  }
}
}



