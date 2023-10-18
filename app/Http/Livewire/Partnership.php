<?php

namespace App\Http\Livewire;

use App\Models\GetCandyCountryVendor;
use App\Models\Partner;
use App\Models\Region;
use Livewire\Component;
use PDO;

class Partnership extends Component
{
    public $countries;
    public $regions;

    public function mount(){
        
            $this->countries  = GetCandyCountryVendor::COUNTRIES;
        
    
        // $this->regions = Region::where('country_id', $vendorCountry)->get();
    }

    public function store(){
        
    }

    public function render()
    {
        return view('livewire.partnership');
    }
}
