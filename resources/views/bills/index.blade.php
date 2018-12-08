@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="5" class="light-blue lighten-4">
                                        <h3>Bills</h3>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($bills->count() > 0)
                                    @foreach ($bills as $bill)
                                        <tr>
                                            <td width="100">{{ $bill -> due_on }}</td>
                                            <td width="200" class="text-center">
                                                @if (isset($bill -> billCategory -> icon))
                                                <img
                                                    src="{{ asset('storage/' . $bill -> billCategory -> icon -> path) }}"
                                                    class="img-thumbnail border-0"
                                                    style="height: 60px"
                                                >
                                                @endif
                                            </td>
                                            <td class="lead">
                                                {{ $bill -> billCategory -> name }}
                                            </td>
                                            <td width="200" class="text-center">
                                                <p class="font-weight-bold">${{ $bill -> amount }}</p>
                                                <mark>{{ $bill -> status }}</mark>
                                            </td>
                                            <td width="20">
                                                <a href="/bills/{{ $bill -> id }}/edit" class="btn light-blue lighten-3 btn-sm">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tr>
                                <th class="text-right" colspan="5">
                                    <a
                                        class="btn light-blue lighten-3 btn-rounded waves-effect waves-light btn-sm"
                                        href="/bill-categories"
                                    >Bill Categories</a>
                                    <a
                                        class="btn light-blue lighten-3 btn-rounded waves-effect waves-light btn-sm"
                                        href="/bills/create"
                                    >Add Bill</a>
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection