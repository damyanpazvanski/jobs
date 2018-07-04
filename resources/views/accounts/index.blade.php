@extends('layouts.app')

@section('content')
    <div class="col-lg-4 col-md-4 col-sm--2">
        <div class="card">
            <div class="card-header font-weight-bold text-center" data-background-color="blue">
                <h4 class="title">Company Logo</h4>
            </div>
            <div class="card-body col-md-12">
                <img src="/images/image.png" alt="">
            </div>
        </div>
    </div>
    <div class="col-lg-7 col-md-8 col-sm-10">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header font-weight-bold" data-background-color="blue">
                    <h4 class="title">Company information</h4>
                </div>

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
                            <input id="website" name="website" type="text" value="{{ $company->website ?: old('website') }}"
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
                        <label for="business_sector_id" class="col-md-4 col-form-label text-right">Business sector</label>

                        <div class="col-md-6">
                            <select name="business_sector_id" id="business_sector_id">
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
                            <input id="address" name="address" type="text" value="{{ $company->address ?: old('address') }}"
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
                            <select name="country_id" id="country_id">
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
                                      class="form-control {{ $errors->has('description') ? 'invalid-input' : '' }}"
                                      rows="10">{{ $company->description ?: old('description') }}</textarea>

                            @if ($errors->has('description'))
                                <div class="mt-2">
                                    <strong class="invalid">{{ $errors->first('description') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
