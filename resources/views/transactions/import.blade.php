@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card col-md-10 p-0">
            <h5 class="card-header info-color white-text text-center">
                <strong>Import Transactions</strong>
            </h5>
            <div class="card-body px-lg-5 pt-0">
                <form style="color: #757575;" name="bill-form"
                    action="/accounts/{{ $account->id }}/transactions/import"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    {{ csrf_field() }}
                    @if (isset($bill))
                        {{ method_field('PUT') }}
                    @endif
                    <div class="form-group row mt-3">
                        <label for="file" class="col-sm-2 col-form-label text-right">Account</label>
                        <div class="col-sm-10">
                            {{ $account->name }}
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="file" class="col-sm-2 col-form-label text-right">File</label>
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file" aria-describedby="file">
                                <label class="custom-file-label" for="file">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Import</button>
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
