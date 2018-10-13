@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-right">
                                <a
                                    class="btn btn-primary btn-rounded waves-effect waves-light"
                                    href="/accounts/create"
                                >Add Account</a>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection