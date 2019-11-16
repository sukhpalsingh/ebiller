@extends('layouts.app')

@section('content')

    <div class="bg-primary">
        <div class="container pt-3 pb-3">
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                <div class="mb-3 mb-sm-0">
                    <ol class="breadcrumb breadcrumb-white breadcrumb-no-gutter mb-0">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">Home</a></li>
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/authorisations">Authorisations</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ isset($authorisation->id) ? 'Edit' : 'New' }} Authorisation
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <div class="container pt-5 pb-5 bg-light">
            <form style="color: #757575;" name="authorisation-form"
                action="/authorisations{{ isset($authorisation->id) ? '/' . $authorisation->id : '' }}"
                method="POST"
                enctype="multipart/form-data"
            >
                <div class="row header">
                    <div class="col-sm-12 light-gray">
                        
                            {{ csrf_field() }}
                            @if (isset($authorisation->id))
                                {{ method_field('PUT') }}
                            @endif
                            <div class="form-group">
                                <label for="type" class="form-label">Type</label>
                                <div class="form-group">
                                    <select class="form-control"
                                        id="type"
                                        name="type">
                                        @foreach ($types as $type => $typeLabel)
                                            <option value="{{ $type }}"
                                                {{ isset($authorisation->type) && $authorisation->type === $type ? 'selected="selected"' : '' }}
                                            >{{ $typeLabel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="valid_from" class="form-label">Valid From <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="date form-control"
                                            id="valid_from"
                                            name="valid_from"
                                            value="{{ isset($authorisation->valid_from) ? $authorisation->valid_from->format('d/m/Y') : ''}}"
                                        >
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="valid_until" class="form-label">Valid Until</label>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="date form-control"
                                            id="valid_until"
                                            name="valid_until"
                                            value="{{ isset($authorisation->valid_until) ? $authorisation->valid_until->format('d/m/Y') : ''}}"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="notify_days" class="form-label">Notify<span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select class="form-control"
                                            id="notify_days"
                                            name="notify_days">
                                            @foreach ($notifyPeriods as $notifyPeriod => $notifyPeriodLabel)
                                                <option value="{{ $notifyPeriod }}"
                                                    {{
                                                        isset($authorisation->notify_days) &&
                                                        $authorisation->notify_days === $notifyPeriod ?
                                                        'selected="selected"' : ''
                                                    }}
                                                >{{ $notifyPeriodLabel }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-primary btn-rounded mr-1" type="submit">Save</button>
                            <button class="btn btn-sm btn-secondary btn-rounded mr-1" type="submit">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $( document ).ready(function() {
            $('.date').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'dd/mm/yy'
            });

            var $imageupload = $('.imageupload');
            $imageupload.imageupload({
                maxWidth: '100%; margin-bottom: 15px',
                maxHeight: 'auto; padding: 0'
            });
        });
    </script>
@endsection
