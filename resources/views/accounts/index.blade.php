@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-right" colspan="3">
                                <a
                                    class="btn btn-primary btn-rounded waves-effect waves-light"
                                    href="/accounts/create"
                                >Add Account</a>
                            </th>
                        </tr>
                        @if ($accounts->count() > 0)
                            <tr>
                                <th>Name</th>
                                <th>Descrption</th>
                                <th width="10">&nbsp;</th>
                            </tr>
                        @endif
                    </thead>
                    <tbody>
                        @if ($accounts->count() > 0)
                            @foreach ($accounts as $account)
                                <tr>
                                    <td>{{ $account -> name }}</td>
                                    <td>{{ $account -> description }}</td>
                                    <td>
                                        <a href="/accounts/{{ $account -> id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection