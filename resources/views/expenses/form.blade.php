@extends('layouts.app')

@section('content')

    <div class="bg-primary">
        <div class="container pt-4 pb-4">
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                <div class="mb-3 mb-sm-0">
                    <ol class="breadcrumb breadcrumb-white breadcrumb-no-gutter mb-0">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">Home</a></li>
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/expenses">Expenses</a></li>
                        <li class="breadcrumb-item active" aria-current="page">New Expense</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-light">
        <div class="container pt-5 pb-5">
            <form style="color: #757575;" name="bill-form"
                action="/expenses{{ isset($expense->id) ? '/' . $expense->id : '' }}"
                method="POST"
                enctype="multipart/form-data"
            >
                <div class="row header">
                    <div class="col-sm-4 light-gray pl-5 pr-5">
                        @if (!empty($expense->file_id))
                            <div class="file-image">
                                <img src="/files/{{ $expense->file_id }}" class="img-fluid" />
                                <button type="button" class="btn btn-secondary mt-2" onclick="">Remove</button>
                            </div>
                        @else
                            <div class="imageupload panel panel-default">
                                <div class="file-tab panel-body">
                                    <br />
                                    <label class="btn btn-primary btn-file mt-2">
                                        <span>Browse</span>
                                        <!-- The file is stored here. -->
                                        <input type="file" name="file">
                                    </label>
                                    <button type="button" class="btn btn-secondary">Remove</button>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-8 light-gray pl-5 pr-5">
                        
                            {{ csrf_field() }}
                            @if (isset($expense->id))
                                {{ method_field('PUT') }}
                            @endif
                            <div class="form-group">
                                <label for="description" class="form-label">Description</label>
                                <div class="form-group">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="description"
                                        name="description"
                                        value="{{ isset($expense->description) ? $expense->description : ''}}"
                                    >
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="spent_on" class="form-label">Spent On <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="spent_on"
                                            name="spent_on"
                                            value="{{ isset($expense->spent_on) ? $expense->spent_on->format('d/m/Y') : ''}}"
                                        >
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="spent_at" class="form-label">Spent At</label>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="spent_at"
                                            name="spent_at"
                                            value="{{ isset($expense->spent_at) ? $expense->spent_at : ''}}"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="tax" class="form-label">Tax <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="tax"
                                            name="tax"
                                            value="{{ isset($expense->tax) ? $expense->tax : ''}}"
                                        >
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="amount"
                                            name="amount"
                                            value="{{ isset($expense->amount) ? $expense->amount : ''}}"
                                        >
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-primary btn-rounded mr-1" type="submit">Save</button>
                            <button class="btn btn-sm btn-secondary btn-rounded mr-1" type="submit">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $( document ).ready(function() {
            $('#spent_on').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'dd/mm/yy'
            });

            var $imageupload = $('.imageupload');
            $imageupload.imageupload({
                maxWidth: '100%; margin-bottom: 15px',
                maxHeight: 'auto; padding: 0'
            });

            // $('#imageupload-disable').on('click', function() {
            //     $imageupload.imageupload('disable');
            //     $(this).blur();
            // })

            // $('#imageupload-enable').on('click', function() {
            //     $imageupload.imageupload('enable');
            //     $(this).blur();
            // })

            // $('#imageupload-reset').on('click', function() {
            //     $imageupload.imageupload('reset');
            //     $(this).blur();
            // });
        });
    </script>
@endsection
