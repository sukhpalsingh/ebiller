@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-right" colspan="4">
                                <a
                                    class="btn btn-primary btn-rounded waves-effect waves-light"
                                    href="/accounts/create"
                                >Add Account</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($accounts->count() > 0)
                            @foreach ($accounts as $account)
                                <tr>
                                    <td>
                                        @if (isset($account->icon))
                                            <img
                                                src="{{ asset('storage/' . $account->icon->path) }}"
                                                class="img-thumbnail"
                                                style="height: 60px"
                                            >
                                        @endif
                                    </td>
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