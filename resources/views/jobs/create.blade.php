@extends('layouts.app')

@section('content')
    <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
        <div class="row justify-content-center">
            <form method="POST" action="{{ route('store-job') }}">
                @csrf
                <div class="card">
                    <div class="card-header font-weight-bold" data-background-color="blue">
                        <h4 class="title">New Job</h4>
                    </div>

                    <div class="card-body col-md-12">
                        <div class="form-group row form-info">
                            <label for="position" class="col-md-4 col-form-label text-right">Position name</label>

                            <div class="col-md-6">
                                <input id="position" name="position" type="text" value="{{ old('position') }}"
                                       class="form-control {{ $errors->has('position') ? 'invalid-input' : '' }}" required autofocus>

                                @if ($errors->has('position'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('position') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row form-info">
                            <label for="country_id" class="col-md-4 col-form-label text-right">Country</label>

                            <div class="col-md-6">
                                <select name="country_id" id="country_id"
                                        class="custom-select {{ $errors->has('country_id') ? 'invalid-input' : '' }}">
                                    <option value="">Choose country</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}"
                                                @if(old('country_id') == $country->id) selected @endif
                                        >{{ ucfirst($country->name) }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('country_id'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('country_id') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row form-info">
                            <label for="city" class="col-md-4 col-form-label text-right">City</label>

                            <div class="col-md-6">
                                <input id="city" name="city" type="text" value="{{ old('city') }}"
                                       class="form-control {{ $errors->has('city') ? 'invalid-input' : '' }}" required>

                                @if ($errors->has('city'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('city') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row form-info">
                            <label for="work_time_id" class="col-md-4 col-form-label text-right">Work Time</label>

                            <div class="col-md-6">
                                <select name="work_time_id" id="work_time_id"
                                        class="custom-select {{ $errors->has('work_time_id') ? 'invalid-input' : '' }}">
                                    <option value="">Choose work time</option>
                                    @foreach($workTimes as $workTime)
                                        <option value="{{ $workTime->id }}"
                                                @if(old('work_time_id') == $workTime->id) selected @endif
                                        >{{ ucfirst($workTime->name) }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('work_time_id'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('work_time_id') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 col-md-offset-3 text-center">
                                <button class="btn btn-lg btn-block" data-background-color="blue">
                                    Create
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
<style>
    .document-editor {
        border: 1px solid var(--ck-color-base-border);
        border-radius: var(--ck-border-radius);

        /* Set vertical boundaries for the document editor. */
        max-height: 700px;

        /* This element is a flex container for easier rendering. */
        display: flex;
        flex-flow: column nowrap;
        overflow: hidden;
    }

    .document-editor__toolbar {
        /* Make sure the toolbar container is always above the editable. */
        z-index: 1;

        /* Create the illusion of the toolbar floating over the editable. */
        box-shadow: 0 0 5px hsla(0, 0%, 0%, .2);

        /* Use the CKEditor CSS variables to keep the UI consistent. */
        border-bottom: 1px solid var(--ck-color-toolbar-border);
    }

    .document-editor__toolbar .ck-toolbar {
        border: 0;
        border-radius: 0;
    }

    .document-editor__editable-container {
        padding: calc(2 * var(--ck-spacing-large));
        background: var(--ck-color-base-foreground);

        /* Make it possible to scroll the "page" of the edited content. */
        overflow-y: scroll;
    }

    .document-editor__editable-container .ck-editor__editable {
        /* Set the dimensions of the "page". */
        width: 80%;
        min-height: 15cm;

        /* Keep the "page" off the boundaries of the container. */
        padding: 1cm 2cm 2cm;

        border: 1px hsl(0, 0%, 82.7%) solid;
        border-radius: var(--ck-border-radius);
        background: white;

        /* The "page" should cast a slight shadow (3D illusion). */
        box-shadow: 0 0 5px hsla(0, 0%, 0%, .1);

        /* Center the "page". */
        margin: 0 auto;
    }

    /* Set the default font for the "page" of the content. */
    .document-editor .ck-content,
    .document-editor .ck-heading-dropdown .ck-list {
        font: 16px/1.6 "Helvetica Neue", Helvetica, Arial, sans-serif;
    }

    /* Adjust the headings dropdown to host some larger heading styles. */
    .document-editor .ck-heading-dropdown .ck-dropdown__panel .ck-list > .ck-list__item {
        line-height: calc(1.2 * var(--ck-line-height-base) * var(--ck-font-size-base));
        min-width: 8em;
    }

    /* Set the styles for "Heading 1". */
    .document-editor .ck-content h2,
    .document-editor .ck-heading-dropdown .ck-heading_heading1 {
        font-size: 2.18em;
    }

    .document-editor .ck-content h2 {
        line-height: 1.37em;
        padding-top: .342em;
        margin-bottom: .142em;
    }

    /* Set the styles for "Heading 2". */
    .document-editor .ck-content h3,
    .document-editor .ck-heading-dropdown .ck-heading_heading2 {
        font-size: 1.75em;
        color: hsl(203, 100%, 50%);
    }

    .document-editor .ck-heading-dropdown .ck-heading_heading2.ck-list__item_active {
        color: var(--ck-color-list-item-text-active);
    }

    /* Set the styles for "Heading 2". */
    .document-editor .ck-content h3 {
        line-height: 1.86em;
        padding-top: .171em;
        margin-bottom: .357em;
    }

    /* Set the styles for "Heading 3". */
    .document-editor .ck-content h4,
    .document-editor .ck-heading-dropdown .ck-heading_heading3 {
        font-size: 1.31em;
    }

    .document-editor .ck-content h4 {
        line-height: 1.24em;
        padding-top: .286em;
        margin-bottom: .952em;
    }

    /* Set the styles for "Paragraph". */
    .document-editor .ck-content p,
    .document-editor .ck-heading-dropdown .ck-heading_paragraph {
        font-size: 1em;
    }

    .document-editor .ck-content p {
        line-height: 1.63em;
        padding-top: .5em;
        margin-bottom: 1.13em;
    }

    /* Make the block quoted text serif with some additional spacing. */
    .document-editor .ck-content blockquote {
        font-family: Georgia, serif;
        margin-left: calc(2 * var(--ck-spacing-large));
        margin-right: calc(2 * var(--ck-spacing-large));
    }
</style>