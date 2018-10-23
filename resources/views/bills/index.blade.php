@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        @if ($bills->count() > 0)
                            @foreach ($bills as $bill)
                                <tr>
                                    <td>{{ $bill -> due_on }}</td>
                                    <td>
                                        <img
                                            src="{{ asset('storage/' . $bill -> billCategory -> icon -> path) }}"
                                            class="img-thumbnail"
                                            style="height: 60px"
                                        >
                                    </td>
                                    <td>
                                        {{ $bill -> billCategory -> name }}
                                    </td>
                                    <td>
                                        <p>${{ $bill -> amount }}</p>
                                        <p>{{ $bill -> status }}</p>
                                    </td>
                                    <td width="20">
                                        <a href="/bills/{{ $bill -> id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tr>
                        <th class="text-right" colspan="4">
                            <a
                                class="btn btn-primary btn-rounded waves-effect waves-light btn-sm"
                                href="/bill-categories"
                            >Bill Categories</a>
                            <a
                                class="btn btn-primary btn-rounded waves-effect waves-light btn-sm"
                                href="/bills/create"
                            >Add Bill</a>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection