
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
                                >Add Category</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($categories->count() > 0)
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category -> name }}</td>
                                    <td>
                                        <a href="/bill-categories/{{ $category -> id }}/edit" class="btn btn-primary btn-sm">Edit</a>
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