@extends('layouts.app')

@section('content')

    <div class="bg-primary">
        <div class="container pt-4 pb-4">
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                <div class="mb-3 mb-sm-0">
                    <ol class="breadcrumb breadcrumb-white breadcrumb-no-gutter mb-0">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Expenses</li>
                    </ol>
                </div>

                <a class="btn btn-sm btn-soft-white transition-3d-hover" href="/expenses/create">
                    <i class="fas fa-plus"></i>
                    Create New
                </a>
            </div>
        </div>
    </div>

    <div class="bg-light">
        <div class="container pt-5 pb-5">
            <div class="card">
                @if ($expenses->count() > 0)
                    <table id="example" class="table table-striped table-bordered mb-0" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th>Spent On</th>
                                <th>Spent At</th>
                                <th>Amount</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenses as $expense)
                                <tr>
                                    <td>{{ $expense->spent_on->format('d/m/Y') }}</td>
                                    <td>{{ $expense->spent_at }}</td>
                                    <td>{{ $expense->amount }}</td>
                                    <td>
                                        <a href="/expenses/{{ $expense->id }}/edit" class="text-secondary">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="jumbotron mb-0 bg-white">
                        <h1 class="display-7 text-secondary">No expense recorded yet !</h1>
                        <hr class="my-4">
                        <p>All the expense records will appear here.</p>
                        <a class="btn btn-primary" href="/expenses/create" role="button"><i class="fas fa-plus"></i> Crete New</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 pl-5 pr-5">
            @if ($expenses->count() > 0)
                @foreach ($expenses as $expense)
                    
                @endforeach
            @endif
        </div>
    </div>
@endsection