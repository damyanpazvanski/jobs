@extends('candidatesViews.layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <form action="{{ route('update.candidates', ['candidate' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="col-md-12 text-right">
                <a href="/"><button type="button" class="btn pt-1 pb-1 pl-5 pr-5 alert">Back</button></a>
                <button type="submit" class="btn pt-1 pb-1 pl-5 pr-5 btn-outline-info">Save</button>
            </div>
            <div class="justify-content-center">
                <div class="card">
                    <div class="card-header font-weight-bold" data-background-color="blue">
                        <h4 class="title text-center">User information</h4>
                    </div>
                    <div class="card-body col-md-12">
                        <div class="form-group row form-info">
                            <label for="first_name" class="col-md-4 col-form-label text-right">First name</label>

                            <div class="col-md-6">
                                <input id="first_name" name="first_name" type="text" value="{{ old('first_name') ?: $user->first_name }}"
                                       class="form-control {{ $errors->has('first_name') ? 'invalid-input' : '' }}">

                                @if ($errors->has('first_name'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('first_name') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row form-info">
                            <label for="last_name" class="col-md-4 col-form-label text-right">Last name</label>

                            <div class="col-md-6">
                                <input id="last_name" name="last_name" type="text" value="{{ old('last_name') ?: $user->last_name }}"
                                       class="form-control {{ $errors->has('last_name') ? 'invalid-input' : '' }}">

                                @if ($errors->has('last_name'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('last_name') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row form-info">
                            <label for="email" class="col-md-4 col-form-label text-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" name="email" type="text" value="{{ old('email') ?: $user->email }}"
                                       class="form-control {{ $errors->has('email') ? 'invalid-input' : '' }}">

                                @if ($errors->has('email'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row form-info">
                            <label for="phone" class="col-md-4 col-form-label text-right">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" name="phone" type="text" value="{{ old('phone') ?: $user->phone }}"
                                       class="form-control {{ $errors->has('phone') ? 'invalid-input' : '' }}">

                                @if ($errors->has('phone'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('phone') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-header" data-background-color="blue">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                CV Preview
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        @if(is_null($user->cv))
                            <div class="form-group">
                                <h5 class="text-center">You have no uploaded CV</h5>
                                <div class="form-group form-info col-md-12">
                                    <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-info">
                                                    CV Browse… <input type="file" name="cv">
                                                </span>
                                            </span>
                                        <input type="text" class="form-control" readonly disabled placeholder="PDF or Word document"/>
                                        <strong class="invalid row">The PDF format is better for your employer</strong>
                                    </div>
                                </div>
                            </div>
                        @elseif(substr($user->cv->name, -3) === 'pdf')
                            <div class="form-group form-info col-md-12">
                                <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-info">
                                                    CV Browse… <input type="file" name="cv">
                                                </span>
                                            </span>
                                    <input type="text" class="form-control" readonly disabled placeholder="PDF or Word document"/>
                                    <strong class="invalid row">The PDF format is better for your employer</strong>
                                </div>
                            </div>
                            <iframe class="col-md-12" src="/storage/candidates/{{ $user->id }}/cvs/{{ $user->cv->name }}" frameborder="0" height="600"></iframe>
                        @else
                            <div class="form-group">
                                <div class="form-group form-info col-md-12">
                                    <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-info">
                                                    CV Browse… <input type="file" name="cv">
                                                </span>
                                            </span>
                                        <input type="text" class="form-control" readonly disabled placeholder="PDF or Word document"/>
                                        <strong class="invalid row">The PDF format is better for your employer</strong>
                                    </div>
                                </div>
                                <h5 class="text-center">The file format is not pdf</h5>
                                <div class="text-center">
                                    <a href="{{ route('download.cv.candidates', ['candidate' => $user->id]) }}">
                                        <button type="button" class="btn btn-info"><strong>Download the CV</strong></button>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
