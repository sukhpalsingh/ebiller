@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Due Date</th>
                        <th>Category</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @if ($bills->count() > 0)
                            @foreach ($bills as $bill)
                                <tr>
                                    <td>{{ $bill -> due_on }}</td>
                                    <td>{{ $bill -> bill_category_id }}</td>
                                    <td>{{ $bill -> status }}</td>
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