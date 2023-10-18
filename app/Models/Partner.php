<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
  use HasFactory;

  const  COUNTRIES = ['Ghana','Togo'];


  protected $guarded = [];
}
