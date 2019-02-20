@extends('layouts.app')

@section('content')
    <div class="bg-primary">
        <div class="container pt-4 pb-4">
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                <div class="mb-3 mb-sm-0">
                    <ol class="breadcrumb breadcrumb-white breadcrumb-no-gutter mb-0">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">Home</a></li>
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/bills">Bills</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ isset($bill) ? $bill->due_on->format('jS F Y') . ' - ' . $bill->billCategory->name . ' Bill'  : 'New Bill' }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-light">
        <div class="container pt-4 pb-4">
            <div class="card">
                <div class="card-body">
                    <form style="color: #757575;" name="bill-form"
                        action="/bills{{ isset($bill) ? '/' . $bill->id : '' }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        {{ csrf_field() }}
                        @if (isset($bill))
                            {{ method_field('PUT') }}
                        @endif
                        <div class="form-group row mt-3">
                            <label for="name" class="col-sm-2 col-form-label text-right">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $bill -> name ?? ''}}">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="name" class="col-sm-2 col-form-label text-right">Due Date *</label>
                            <div class="col-sm-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="due_on"
                                    name="due_on"
                                    value="{{ isset($bill->due_on) ? $bill->due_on->format('d/m/Y') : ''}}"
                                >
                            </div>
                            <label for="bill_category_id" class="col-sm-2 col-form-label text-right">Category *</label>
                            <div class="col-sm-5">
                                <select id="bill_category_id" name="bill_category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option
                                            value="{{$category -> id }}"
                                            @if((int) $category->id === (int) $bill->bill_category_id) selected="selected" @endif
                                        >{{ $category -> name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="amount" class="col-sm-2 col-form-label text-right">Amount *</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="amount" name="amount" value="{{ $bill -> amount ?? ''}}">
                            </div>
                            <label for="status" class="col-sm-2 col-form-label text-right">Status *</label>
                            <div class="col-sm-5">
                                <select id="status" name="status" class="form-control">
                                    @foreach ($statusOptions as $statusOption)
                                        <option
                                            value="{{$statusOption }}"
                                            @if($statusOption === $bill->status) selected="selected" @endif
                                        >{{ $statusOption }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="account_id" class="col-sm-2 col-form-label text-right">Account *</label>
                            <div class="col-sm-3">
                                <select id="account_id" name="account_id" class="form-control">
                                    @foreach ($accounts as $account)
                                    <option value="{{$account -> id }}">{{ $account -> name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="file" class="col-sm-2 col-form-label text-right">File</label>
                            <div class="col-sm-5">
                                @if (empty($bill->file))
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file" name="file" aria-describedby="file">
                                        <label class="custom-file-label" for="file">Choose file</label>
                                    </div>
                                @else
                                    <a href="/files/{{ $bill->file->id }}" class="btn btn-link text-left" target="_blank">View</a>
                                    <a href="/files/{{ $bill->file->id }}/delete" class="btn btn-link text-left" target="_blank">Delete</a>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <input type="checkbox" class="form-control-input" id="auto_pay" name="auto_pay" value="true"
                                    {{ isset($bill -> auto_pay) && $bill->auto_pay ? 'checked="checked"' : ''}}>
                                <label for="auto_pay" class="col-sm-2 col-form-label">Auto Pay</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <button class="btn btn-primary btn-rounded" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#due_on').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'dd/mm/yy'
            });
        });
    </script>
@endsection
