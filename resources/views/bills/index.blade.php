@extends('layouts.app')

@section('content')

    <div class="bg-primary">
        <div class="container pt-4 pb-4">
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                <div class="mb-3 mb-sm-0">
                    <ol class="breadcrumb breadcrumb-white breadcrumb-no-gutter mb-0">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bills</li>
                    </ol>
                </div>

                <div class="float-right">
                    <a class="btn btn-sm btn-soft-white" href="/bill-categories">
                    <i class="fas fa-book"></i>
                        Bill Categories
                    </a>
                    <a class="btn btn-sm btn-soft-white" href="/bills/create">
                        <i class="fas fa-plus"></i>
                        Create New
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-light">
        <div class="container pt-5 pb-5">
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                @if ($bills->count() > 0)
                                    @foreach ($bills as $bill)
                                        <tr>
                                            <td width="300" class="align-middle">
                                                <p class="mb-1">{{ $bill -> due_on -> format('l') }}</p>
                                                <p>{{ $bill -> due_on -> format('jS F Y') }}</p>
                                            </td>
                                            <td width="200" class="text-center align-middle">
                                                @if (isset($bill -> billCategory -> icon))
                                                <img
                                                    src="{{ asset('storage/' . $bill -> billCategory -> icon -> path) }}"
                                                    class="img-thumbnail border-0"
                                                    style="height: 100px"
                                                >
                                                @endif
                                            </td>
                                            <td class="lead align-middle">
                                                {{ $bill -> billCategory -> name }}
                                            </td>
                                            <td width="200" class="text-center align-middle">
                                                <p class="font-weight-bold mb-1">${{ $bill -> amount }}</p>
                                                <p class="text-danger">{{ $bill -> status }}</p>
                                            </td>
                                            <td width="20" class="align-middle">
                                                <a href="/bills/{{ $bill -> id }}/edit" class="btn light-blue lighten-3 btn-sm">
                                                    <i class="fas fa-edit text-primary"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection