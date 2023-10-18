
    <div class="col-xl-8  main-box">
        <div class="image-container">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('success') }}
            </div>
            @endif
            @if (!session('success'))
            <form action="{{ route('submit-form') }}" method="post"
                style="background: white; padding: 44px;" enctype="multipart/form-data">
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                    {{ $error }}
                </div>
                @endforeach
                @endif
                @csrf
                <div class="row">
                    <div style=" margin:0; padding:0;" class="accordion" id="accordionExample">
                        <div class="steps">
                            <progress id="progress" value=0 max=100></progress>
                            <div class="step-item">
                                <button id="step_one" class="step-button text-center" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    1
                                </button>
                                <div style="font-size:80%;margin-top:3px;" class="step-title ">

                                    ACCOUNT DETAIL
                                </div>
                            </div>
                            <div class="step-item">
                                <button id="step_two" class="step-button text-center collapsed"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    2
                                </button>
                                <div style="font-size:80%; margin-top:3px;" class="step-title">
                                    CONTACT DETAILS
                                </div>
                            </div>
                            <div class="step-item">
                                <button id="step_three" class="step-button text-center collapsed"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree">
                                    3
                                </button>
                                <div style="font-size:80%; margin-top:3px;" class="step-title">
                                    BILLING INFORMATION
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div id="headingOne">
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="card" style="padding-left:10px ; padding-right:10px;">
                                    <p>ACCOUNT INFORMATION:</p>
                                    <div class="line-1"
                                        style="  height: 5px; background: black; margin-bottom: 20px;">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label form-text">Business Name
                                                *</label><br>
                                            <input type="text"
                                                class="form-control @error('business_name') is-invalid @enderror"
                                                value="{{ old('business_name') }}" id="business_name"
                                                name="business_name">
                                        </div>
                                        <div class="col-md-6 ">
                                            <label class="form-label form-text">Business Email
                                                *</label>
                                            <input type="text"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" name="email">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label form-text">Phone Number *</label>
                                            <input type="tel" id="form3Example3"
                                                class="form-control @error('phone_number') is-invalid @enderror"
                                                name="phone_number" value="{{ old('phone_number') }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label form-text">Country *</label>
                                            <select
                                                class="form-control @error('country') is-invalid @enderror"
                                                name="country">
                                                <option value="" disabled selected>Select Country
                                                </option>
                                                @foreach ($countries as $index => $country)
                                                     <option value="{{++$index}}">{{$country}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label form-text">Region *</label>
                                            <select
                                                class="form-control @error('Region') is-invalid @enderror"
                                                name="region">
                                                <option value="" disabled selected>Select Region
                                                </option>

                                                {{-- @foreach (App\Models\Region::all() as $region)
                                                <option value="{{ $region->id }}">
                                                    {{ $region->display_name }}
                                                </option>
                                                @endforeach --}}

                                                {{-- @forelse ($regions as $region)
                                                    <option value="">{{$region->display_name}}</option>
                                                @empty
                                                    <p>Not Found</p>
                                                @endforelse --}}
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label form-text">City *</label>
                                            <select class="form-control @error('city') is-invalid @enderror"
                                                name="city">
                                                <option value="" disabled selected>Select City
                                                </option>
                                                <option id='Abeka-Lapaz'>Abeka-Lapaz</option>
                                                <option id='Abelemkpe'>Abelemkpe</option>
                                                <option id='Ablekuma'>Ablekuma</option>
                                                <option id='Abokobi'>Abokobi</option>
                                                <option id='Abossey Okai'>Abossey Okai</option>
                                                <option id='Accra'>Accra</option>
                                                <option id='Accra New Town'>Accra New Town</option>
                                                <option id='Achimota'>Achimota</option>
                                                <option id='Ada Foah'>Ada Foah</option>
                                                <option id='Ada Kasseh'>Ada Kasseh</option>
                                                <option id='Adabraka'>Adabraka</option>
                                                <option id='Adenta'>Adenta</option>
                                                <option id='Adenta East'>Adenta East</option>
                                                <option id='Adjei Kojo'>Adjei Kojo</option>
                                                <option id='Adjen Kotoku'>Adjen Kotoku</option>
                                                <option id='Airport City'>Airport City</option>
                                                <option id='Airport Residential Area'>Airport
                                                    Residential Area</option>
                                                <option id='Akweteyman'>Akweteyman</option>
                                                <option id='Alajo'>Alajo</option>
                                                <option id='Amasaman'>Amasaman</option>
                                                <option id='Apenkwa'>Apenkwa</option>
                                                <option id='Ashaiman'>Ashaiman</option>
                                                <option id='Ashongman'>Ashongman</option>
                                                <option id='Asoprochona'>Asoprochona</option>
                                                <option id='Awoshie'>Awoshie</option>
                                                <option id='Ayi Mensa'>Ayi Mensa</option>
                                                <option id='Bansa'>Bansa</option>
                                                <option id='Big Ada'>Big Ada</option>
                                                <option id='Bubuashi'>Bubuashi</option>
                                                <option id='Bubuashie'>Bubuashie</option>
                                                <option id='Bukom'>Bukom</option>
                                                <option id='Cantonments'>Cantonments</option>
                                                <option id='Caprice'>Caprice</option>
                                                <option id='Chorkor'>Chorkor</option>
                                                <option id='Christian Village'>Christian Village
                                                </option>
                                                <option id='Dansoman'>Dansoman</option>
                                                <option id='Darkuman'>Darkuman</option>
                                                <option id='Dawhenya'>Dawhenya</option>
                                                <option id='Dodowa'>Dodowa</option>
                                                <option id='Dome'>Dome</option>
                                                <option id='Dzorwulu'>Dzorwulu</option>
                                                <option id='East Legon'>East Legon</option>
                                                <option id='Eleme'>Eleme</option>
                                                <option id='Gbawe'>Gbawe</option>
                                                <option id='Gbegbe'>Gbegbe</option>
                                                <option id='Haatso'>Haatso</option>
                                                <option id='Kaneshie'>Kaneshie</option>
                                                <option id='Kisseman'>Kisseman</option>
                                                <option id='Kokomlemle'>Kokomlemle</option>
                                                <option id='Kokrobite'>Kokrobite</option>
                                                <option id='Korle Gonno'>Korle Gonno</option>
                                                <option id='Kotobabi'>Kotobabi</option>
                                                <option id='Kuntunse'>Kuntunse</option>
                                                <option id='Kwabenya'>Kwabenya</option>
                                                <option id='Kwashieman'>Kwashieman</option>
                                                <option id='Labadi'>Labadi</option>
                                                <option id='Labone'>Labone</option>
                                                <option id='Lapaz'>Lapaz</option>
                                                <option id='Lartebiokorshie'>Lartebiokorshie</option>
                                                <option id='Lashibi'>Lashibi</option>
                                                <option id='Lebanon'>Lebanon</option>
                                                <option id='Legon'>Legon</option>
                                                <option id='Maamobi'>Maamobi</option>
                                                <option id='Madina'>Madina</option>
                                                <option id='Makola'>Makola</option>
                                                <option id='Mallam'>Mallam</option>
                                                <option id='Mamprobi'>Mamprobi</option>
                                                <option id='Mataheko'>Mataheko</option>
                                                <option id='Miotso'>Miotso</option>
                                                <option id='Nii Boi Town'>Nii Boi Town</option>
                                                <option id='Nima'>Nima</option>
                                                <option id='Nmai Dzorn'>Nmai Dzorn</option>
                                                <option id='North Industrial Area'>North Industrial
                                                    Area</option>
                                                <option id='Nungua'>Nungua</option>
                                                <option id='Odorkor'>Odorkor</option>
                                                <option id='Ogbodjo'>Ogbodjo</option>
                                                <option id='Old Ningo'>Old Ningo</option>
                                                <option id='Oyarifa'>Oyarifa</option>
                                                <option id='Pantang'>Pantang</option>
                                                <option id='Pig Farm'>Pig Farm</option>
                                                <option id='Pokuase'>Pokuase</option>
                                                <option id='Prampram'>Prampram</option>
                                                <option id='Sabon Zongo'>Sabon Zongo</option>
                                                <option id='Sakaman'>Sakaman</option>
                                                <option id='Sakumono'>Sakumono</option>
                                                <option id='Santeo'>Santeo</option>
                                                <option id='Sege'>Sege</option>
                                                <option id='Shai Hills'>Shai Hills</option>
                                                <option id='Shiashie'>Shiashie</option>
                                                <option id='Sowutuom'>Sowutuom</option>
                                                <option id='Sugbaniate'>Sugbaniate</option>
                                                <option id='Swalaba'>Swalaba</option>
                                                <option id='Taifa'>Taifa</option>
                                                <option id='Tema'>Tema</option>
                                                <option id='Tesano'>Tesano</option>
                                                <option id='Teshie'>Teshie</option>
                                                <option id='Teshie-Nungua'>Teshie-Nungua</option>
                                                <option id='Torkuase'>Torkuase</option>
                                                <option id='Tudu'>Tudu</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label form-text">Location *</label>
                                            <input type="address"
                                                class="form-control @error('location') is-invalid @enderror"
                                                value="{{ old('location') }}" name="location">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label form-text">Business Type *</label>
                                            <select
                                                class="form-control @error('business_type') is-invalid @enderror"
                                                name="business_type">
                                                <option value="" selected disabled> Select
                                                    Business Type
                                                </option>
                                                <option value="Cake">Cake</option>
                                                <option value="Restaurant">Restaurant</option>
                                                <option value="Pharmacy">Pharmacy</option>
                                                <option value="Shop">Shop</option>
                                                <option value="Super Market">Super Market</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label form-text " for="tin">TIN
                                                Number
                                                *</label>
                                            <input type="text" name="tin" value="{{ old('tin') }}"
                                                class="form-control @error('tin') is-invalid @enderror"
                                                id="tin" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label form-text" for="brn">Business
                                                Registration number *</label>
                                            <input type="text" name="business_registration_number"
                                                value="{{ old('business_registration_number') }}"
                                                class="form-control @error('business_registration_number') is-invalid @enderror"
                                                id="customFile" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label form-text" for="trademark">If you
                                                are
                                                using a registered trademark as part of your shop name,
                                                upload proof of relationship (Shop Banner / Shop logo )
                                            </label>
                                            <input type="file" name="trademark"
                                                value="{{ old('trademark') }}"
                                                class="form-control @error('trademark') is-invalid @enderror"
                                                id="customFile" />
                                        </div> &nbsp

                                        <div class="container">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <input type="button" id="nextbtn" value="Next"
                                                        class="form-control btn btn-dark" />
                                                </div>

                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div id="headingTwo">

                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="card-body">
                                    <p>Contact Details:</p>
                                    <div class="line-1"
                                        style="  height: 5px; background: black; margin-bottom: 20px;">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label form-text">First Name
                                                *</label><br>
                                            <input type="text"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                value="{{ old('first_name') }}" name="first_name">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label form-text">Last Name *</label><br>
                                            <input type="text"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                value="{{ old('last_name') }}" name="last_name">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label form-text">Contact Email
                                                *</label><br>
                                            <input type="text"
                                                class="form-control @error('contact_email') is-invalid @enderror"
                                                value="{{ old('contact_email') }}" name="contact_email">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label form-text">Contact Phone
                                                *</label><br>
                                            <input type="text"
                                                class="form-control @error('contact_phone') is-invalid @enderror"
                                                value="{{ old('contact_phone') }}" name="contact_phone">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label form-text">Alternative Phone
                                                number</label><br>
                                            <input type="text"
                                                class="form-control @error('alternative_phone') is-invalid @enderror"
                                                value="{{ old('alternative_phone') }}"
                                                name="alternative_phone">
                                            <br />
                                        </div>

                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="button" id="backbtn" value="Previous"
                                                        class="form-control btn btn-dark" />
                                                </div>
                                                <div class="col-md-6 margin-width">
                                                    <input type="button" id="nextbtnn" value="Next"
                                                        class="form-control btn btn-dark" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div id="headingThree">

                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="card-body">
                                    <p>BILLING INFORMATION:</p>
                                    <div class="line-1"
                                        style="  height: 5px; background: black; margin-bottom: 20px;">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label form-text">Select Payment
                                                Type*</label><br>
                                            <select required="required" onchange='myfunction()'
                                                id="payment_type"
                                                class="form-control @error('payment_type') is-invalid @enderror"
                                                name="payment_type">
                                                <option value="" selected disabled>
                                                </option>
                                                <option value="bank"> bank </option>
                                                <option value="momo"> momo</option>
                                            </select>
                                        </div>
                                        <div id="momo_option" class="col-md-6">
                                            <label class="form-label form-text">Momo
                                                Network*</label><br>
                                            <select class="form-control @error('fon') is-invalid @enderror"
                                                name="momo_option" id="momo_option_select">
                                                <option value="" selected disabled>
                                                </option>
                                                <option
                                                    {{ old('momo_option') == 'Mtn Mobile Money' ? 'selected' : '' }}>
                                                    Mtn Mobile Money </option>
                                                <option
                                                    {{ old('momo_option') == 'Vodafone Cash' ? 'selected' : '' }}>
                                                    Vodafone Cash </option>
                                                <option
                                                    {{ old('momo_option') == 'Airtel Tigo Cash' ? 'selected' : '' }}>
                                                    Airtel Tigo Cash</option>
                                            </select>
                                        </div>
                                        <div id="bank_option" class="col-md-6">
                                            <label class="form-label form-text">Select Bank
                                                Name*</label><br>
                                            <select
                                                class="form-control @error('bank_option') is-invalid @enderror"
                                                name="bank_option" id="bank_option_select">
                                                <option value="" selected disabled>
                                                </option>
                                                <option
                                                    {{ old('bank_option') == 'Ghana Commercial Bank' ? 'selected' : '' }}>
                                                    Ghana Commercial Bank </option>
                                                <option
                                                    {{ old('bank_option') == 'Fidelity Bank' ? 'selected' : '' }}>
                                                    Fidelity Bank </option>
                                                <option
                                                    {{ old('bank_option') == 'Consolidated Bank Ghana' ? 'selected' : '' }}>
                                                    Consolidated Bank Ghana
                                                </option>
                                                <option
                                                    {{ old('bank_option') == 'FBNBank Ghana Limited' ? 'selected' : '' }}>
                                                    FBNBank Ghana Limited </option>
                                                <option
                                                    {{ old('bank_option') == 'OmniBSIC Bank' ? 'selected' : '' }}>
                                                    OmniBSIC Bank </option>
                                                <option{{ old('bank_option') == 'ADB' ? 'selected' : '' }}>
                                                    ADB </option>
                                                    <option{{ old('bank_option') == 'Access Bank' ? 'selected' : '' }}>
                                                        Access Bank </option>
                                                        <option{{ old('bank_option') == 'Republic Bank' ? 'selected' : '' }}>
                                                            Republic Bank</option>
                                                            <option{{ old('bank_option') == 'Absa' ? 'selected' : '' }}>
                                                                Absa </option>
                                                                <option
                                                                    {{ old('bank_option') == 'Cal Bank Ghana' ? 'selected' : '' }}>
                                                                    Cal Bank Ghana </option>
                                                                <option
                                                                    {{ old('bank_option') == 'Prudential Bank' ? 'selected' : '' }}>
                                                                    Prudential Bank </option>

                                                                <option
                                                                    {{ old('bank_option') == 'First Atlantic Bank' ? 'selected' : '' }}>
                                                                    First Atlantic Bank </option>
                                                                <option
                                                                    {{ old('bank_option') == 'Zenith Bank' ? 'selected' : '' }}>
                                                                    Zenith Bank </option>
                                                                <option
                                                                    {{ old('bank_option') == 'Ecobank' ? 'selected' : '' }}>
                                                                    Ecobank </option>
                                                                <option
                                                                    {{ old('bank_option') == 'Stanbic bank' ? 'selected' : '' }}>
                                                                    Stanbic bank </option>
                                                                <option
                                                                    {{ old('bank_option') == 'Standard Chatered Bank' ? 'selected' : '' }}>
                                                                    Standard Chatered Bank </option>
                                                                <option
                                                                    {{ old('bank_option') == 'UMB' ? 'selected' : '' }}>
                                                                    UMB </option>

                                                                <option
                                                                    {{ old('bank_option') == 'UBA' ? 'selected' : '' }}>
                                                                    UBA </option>
                                                                <option
                                                                    {{ old('bank_option') == 'Societe General' ? 'selected' : '' }}>
                                                                    Societe General </option>
                                                                <option
                                                                    {{ old('bank_option') == 'First National Bank' ? 'selected' : '' }}>
                                                                    First National Bank </option>
                                                                <option
                                                                    {{ old('bank_option') == 'GT Bank' ? 'selected' : '' }}>
                                                                    GT Bank </option>


                                            </select>
                                        </div>


                                        <script>
                                        //  var payment_type = document.getElementById('payment_type').value;
                                        //  alert(payment_type);
                                        </script>
                                        <!-- <div class="col-md-6">
                                                    <label class="form-label form-text">Bank Name / Momo Type (eg MTN ,ECOBANK)*</label><br>
                                                    <input type="text"
                                                           class="form-control @error('bank_name') is-invalid @enderror"
                                                           value="{{ old('bank_name') }}" name="bank_name"
                                                    >
                                                </div> -->

                                        <div class="col-md-6">
                                            <label class="form-label form-text"> Account Name *</label>
                                            <input type="text"
                                                class="form-control @error('account_name') is-invalid @enderror"
                                                value="{{ old('account_name') }}" name="account_name">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label form-text">Account Number
                                                *</label>
                                            <input type="text"
                                                class="form-control @error('account_number') is-invalid @enderror"
                                                value="{{ old('account_number') }}" name="account_number">
                                        </div>

                                        <div id="branch" class="col-md-6">
                                            <label class="form-label form-text">Bank Branch (optional)
                                            </label>
                                            <input type="text" class="form-control" id="bank_branch"
                                                value="{{ old('bank_branch') }}" name="bank_branch">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label form-text">Billing Address
                                                (optional)</label>
                                            <input type="text"
                                                class="form-control @error('billing_address') is-invalid @enderror"
                                                value="{{ old('billing_address') }}" name="billing_address">
                                        </div>



                                        <!-- <div class="col-md-6">
                                                    <label class="form-label form-text">Sort Code </label>
                                                    <input type="text" class="form-control @error('sort_code') is-invalid @enderror"
                                                           value="{{ old('sort_code') }}"  name="sort_code" >
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label form-text">IBAN </label>
                                                    <input type="text" class="form-control @error('iban') is-invalid @enderror"
                                                           value="{{ old('iban') }}" name="iban" >
                                                </div>
                                                <div class="col-md-6 " >
                                                    <label class="form-label form-text">Swift Code </label>
                                                    <input type="text" class="form-control @error('swift') is-invalid @enderror"
                                                           value="{{ old('swift') }}" name="swift" >
                                                </div> -->&nbsp;
                                    </div> <br><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="button" id="backbtnn" value="Previous"
                                                class="form-control btn btn-dark" />
                                        </div>
                                        <div class="col-md-6 margin-width">
                                            <button type="submit"
                                                class="form-control  btn btn-dark">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <!-- <div class="form-group">
                      <input type="number" name="number_of_staffs" class="form-control-input" placeholder="Number of Staff">
                  </div> -->

                </div>
            </form>
            @endif
        </div>
    </div>

