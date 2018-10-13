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
                                    href="/bills/create"
                                >Add Bill</a>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection