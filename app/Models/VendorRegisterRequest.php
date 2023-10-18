<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorRegisterRequest extends Model
{
    use HasFactory;
    protected $fillable = [
    'business_name',
    'email',
    'contact_email',
    'phone_number',
    'city',
    'location',
    'business_type',
         'business_name' ,
      'email',
      'phone_number' ,
      'city',
      'location' ,
      'business_type' ,
      'tin' ,
        "region_id",
      'first_name',
      'last_name',
      'contact_phone',
      "alternative_phone",
      'business_registration_number',
      'bank_name',
      'bank_branch' ,
      'billing_address',
      'bank_account_number' ,
      'payment_type',
      'momo_number',
      'momo_holder_name',
      "bank_account_name",
      'sort_code' ,
      'iban',
      'swift',
      'trademark'
    ];
}
