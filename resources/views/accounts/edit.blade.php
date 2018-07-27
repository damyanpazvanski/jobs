@extends('layouts.app')

@section('content')
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card">
            <div class="card-header font-weight-bold text-center" data-background-color="blue">
                <h4 class="title">Company Logo</h4>
            </div>

            <form action="{{ route('update.company.image') }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="card-body">
                    <div class="form-group text-center">
                        @if ($company->image)
                            <img src="/storage/company_admins/{{ $user->id }}/images/{{ $company->image->name }}" alt="Company's logo">
                        @else
                            <h5>You have no logo</h5>
                        @endif
                    </div>

                    <div class="col-md-12 row">
                        <div class="form-group form-info col-md-12">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-info">
                                        Browse… <input type="file" name="image">
                                    </span>
                                </span>
                                <input type="text" class="form-control" readonly disabled placeholder="Browse for a logo" />
                                @if ($errors->has('image'))
                                    <strong class="invalid">{{ $errors->first('image') }}</strong>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Save" class="btn btn-info btn-lg btn-block" />
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="card">
            <div class="card-header font-weight-bold text-center" data-background-color="blue">
                <h4 class="title">User information</h4>
            </div>
            <div class="card-body col-md-12">

                <form action="{{ route('update.companyAdmins', ['companyAdmin' => $user->id]) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="card-body col-md-12">
                        <div class="form-group row form-info">
                            <label for="first_name" class="col-md-4 col-form-label text-right">First Name</label>

                            <div class="col-md-8">
                                <input id="first_name" name="first_name" type="text"
                                       value="{{ $user->first_name ?: old('first_name') }}"
                                       class="form-control {{ $errors->has('first_name') ? 'invalid-input' : '' }}">

                                @if ($errors->has('first_name'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('first_name') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-body col-md-12">
                        <div class="form-group row form-info">
                            <label for="last_name" class="col-md-4 col-form-label text-right">Last Name</label>

                            <div class="col-md-8">
                                <input id="last_name" name="last_name" type="text"
                                       value="{{ $user->last_name ?: old('last_name') }}"
                                       class="form-control {{ $errors->has('last_name') ? 'invalid-input' : '' }}">

                                @if ($errors->has('last_name'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('last_name') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-body col-md-12">
                        <div class="form-group row form-info">
                            <label for="email" class="col-md-4 col-form-label text-right">Email</label>

                            <div class="col-md-8">
                                <input id="email" name="email" type="text" value="{{ $user->email }}"
                                       class="form-control" readonly disabled>
                            </div>
                        </div>
                    </div>

                    <div class="card-body col-md-12">
                        <div class="form-group row form-info">
                            <label for="phone" class="col-md-4 col-form-label text-right">Phone</label>

                            <div class="col-md-8">
                                <input id="phone" name="phone" type="text" value="{{ $user->phone ?: old('phone') }}"
                                       class="form-control {{ $errors->has('phone') ? 'invalid-input' : '' }}">

                                @if ($errors->has('phone'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('phone') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-body col-md-12">
                        <div class="form-group row form-info">
                            <div class="col-md-12">
                                <button class="btn btn-info btn-lg btn-block">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-7 col-md-8 col-sm-12">
        <div class="justify-content-center">
            <div class="card">
                <div class="card-header font-weight-bold" data-background-color="blue">
                    <h4 class="title text-center">Company information</h4>
                </div>

                <form action="{{ route('update.company', ['company' => $company->id]) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="card-body col-md-12">
                        <div class="form-group row form-info">
                            <label for="name" class="col-md-4 col-form-label text-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" name="name" type="text" value="{{ $company->name ?: old('name') }}"
                                       class="form-control {{ $errors->has('name') ? 'invalid-input' : '' }}">

                                @if ($errors->has('name'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-body col-md-12">
                        <div class="form-group row form-info">
                            <label for="website" class="col-md-4 col-form-label text-right">Website</label>

                            <div class="col-md-6">
                                <input id="website" name="website" type="text" placeholder="http://YOUR SITE"
                                       value="{{ $company->website ?: old('website') }}"
                                       class="form-control {{ $errors->has('website') ? 'invalid-input' : '' }}">

                                @if ($errors->has('website'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('website') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-body col-md-12">
                        <div class="form-group row form-info">
                            <label for="business_sector_id" class="col-md-4 col-form-label text-right">Business
                                sector</label>

                            <div class="col-md-6">
                                <select name="business_sector_id" id="business_sector_id" class="form-control select">
                                    <option value="">Choose the country</option>

                                    @foreach($businessSectors as $businessSector)
                                        <option value="{{ $businessSector->id }}"
                                                @if($businessSector->id == $company->businessSector->id || $businessSector->id == old('business_sector_id')) selected @endif>
                                            {{ $businessSector->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('business_sector_id'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('business_sector_id') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-body col-md-12">
                        <div class="form-group row form-info">
                            <label for="address" class="col-md-4 col-form-label text-right">Address</label>

                            <div class="col-md-6">
                                <input id="address" name="address" type="text"
                                       value="{{ $company->address ?: old('address') }}"
                                       class="form-control {{ $errors->has('address') ? 'invalid-input' : '' }}">

                                @if ($errors->has('address'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('address') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-body col-md-12">
                        <div class="form-group row form-info">
                            <label for="country_id" class="col-md-4 col-form-label text-right">Country</label>

                            <div class="col-md-6">
                                <select name="country_id" id="country_id" class="form-control select">
                                    <option value="">Choose the country</option>

                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}"
                                                @if($country->id == $company->country->id || $country->id == old('country_id')) selected @endif>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('country_id'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('country_id') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-body col-md-12">
                        <div class="form-group row form-info">
                            <label for="city" class="col-md-4 col-form-label text-right">City</label>

                            <div class="col-md-6">
                                <input id="city" name="city" type="text" value="{{ $company->city ?: old('city') }}"
                                       class="form-control {{ $errors->has('city') ? 'invalid-input' : '' }}">

                                @if ($errors->has('city'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('city') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-body col-md-12">
                        <div class="form-group row form-info">
                            <label for="phone" class="col-md-4 col-form-label text-right">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" name="phone" type="text" value="{{ $company->phone ?: old('phone') }}"
                                       class="form-control {{ $errors->has('phone') ? 'invalid-input' : '' }}">

                                @if ($errors->has('phone'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('phone') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-body col-md-12">
                        <div class="form-group row form-info">
                            <label for="description" class="col-md-4 col-form-label text-right">Description</label>

                            <div class="col-md-6">
                            <textarea name="description" id="description"
                                      class="form-control border-gray {{ $errors->has('description') ? 'invalid-input' : '' }}"
                                      rows="10">{{ $company->description ?: old('description') }}</textarea>

                                @if ($errors->has('description'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('description') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-body col-md-12">
                        <div class="form-group row form-info">
                            <div class="col-md-12">
                                <input type="submit" value="Save" class="btn btn-info btn-lg btn-block"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-7 col-md-8 col-sm-12">
        <div class="justify-content-center">
            <div class="card">
                <div class="card-header font-weight-bold" data-background-color="blue">
                    <h4 class="title text-center">Subscription</h4>
                </div>

                <div class="card-body col-md-12">
                    <div class="form-group row form-info">
                        <label for="name" class="col-md-4 col-form-label text-right">Name</label>

                        <div class="col-md-6">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
