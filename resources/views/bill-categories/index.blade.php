
@extends('layouts.app')

@section('content')
    <div class="bg-primary">
        <div class="container pt-4 pb-4">
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                <div class="mb-3 mb-sm-0">
                    <ol class="breadcrumb breadcrumb-white breadcrumb-no-gutter mb-0">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">Home</a></li>
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/bills">Bills</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bill Categories</li>
                    </ol>
                </div>

                <div class="float-right">
                    <a class="btn btn-sm btn-soft-white" href="/bill-categories/create">
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
                                @if ($categories->count() > 0)
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td class="text-center align-middle" width="200">
                                                @if (isset($category -> icon))
                                                    <img
                                                        src="{{ asset('storage/' . $category -> icon -> path) }}"
                                                        class="img-thumbnail border-0"
                                                        style="height: 100px"
                                                    >
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="mb-1">{{ $category -> name }}</p>
                                            </td>
                                            <td width="20" class="align-middle">
                                                <a href="/bill-categories/{{ $category -> id }}/edit" class="btn light-blue lighten-3 btn-sm">
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