@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card col-md-10">
            <h5 class="card-header info-color white-text text-center py-4">
                <strong>New Bill</strong>
            </h5>
            <div class="card-body px-lg-5 pt-0">
                <form style="color: #757575;" name="bill-form" action="/bills" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group row mt-3">
                        <label for="name" class="col-sm-2 col-form-label text-right">Due Date *</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="due_on" name="due_on" value="{{ $bill -> due_on ?? ''}}">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="bill_category_id" class="col-sm-2 col-form-label text-right">Category *</label>
                        <div class="col-sm-10">
                            <select id="bill_category_id" name="bill_category_id" class="form-control">
                                @foreach ($categories as $category)
                                <option value="{{$category -> id }}">{{ $category -> name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="account_id" class="col-sm-2 col-form-label text-right">Account *</label>
                        <div class="col-sm-10">
                            <select id="account_id" name="account_id" class="form-control">
                                @foreach ($accounts as $account)
                                <option value="{{$account -> id }}">{{ $account -> name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="name" class="col-sm-2 col-form-label text-right">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $bill -> name ?? ''}}">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="amount" class="col-sm-2 col-form-label text-right">Amount *</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="amount" name="amount" value="{{ $bill -> amount ?? ''}}">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="status" class="col-sm-2 col-form-label text-right">Status *</label>
                        <div class="col-sm-10">
                            <select id="status" name="status" class="form-control">
                                @foreach ($statusOptions as $statusOption)
                                <option value="{{$statusOption }}">{{ $statusOption }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-check row">
                        <div class="col-sm-10">
                            <input type="checkbox" class="form-control-input" id="auto_pay" name="auto_pay" value="true"
                                {{ isset($bill -> auto_pay) ? 'checked="checked"' : ''}}>
                            <label for="auto_pay" class="col-sm-2 col-form-label">Auto Pay</label>
                        </div>
                    </div>

                    <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Save</button>
                </form>
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
