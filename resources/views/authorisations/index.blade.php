@extends('layouts.app')

@section('content')

    <div class="bg-primary">
        <div class="container pt-3 pb-3">
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                <div class="mb-3 mb-sm-0">
                    <ol class="breadcrumb breadcrumb-white breadcrumb-no-gutter mb-0">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Authorisations</li>
                    </ol>
                </div>

                <a class="btn btn-sm btn-soft-white transition-3d-hover" href="/authorisations/create">
                    <i class="fas fa-plus"></i>
                    Create New
                </a>
            </div>
        </div>
    </div>

    <div class="bg-gray">
        <div class="container pt-5 pb-5">
            <div class="card">
                @if ($authorisations->count() > 0)
                    <table class="table table-striped mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Type</th>
                                <th>Valid From</th>
                                <th>Valid To</th>
                                <th>Notify Before</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authorisations as $authorisation)
                                <tr>
                                    <td>{{ $types[$authorisation->type] }}</td>
                                    <td>{{ $authorisation->valid_from->format('d/m/Y') }}</td>
                                    <td>{{ $authorisation->valid_until->format('d/m/Y') }}</td>
                                    <td>{{ $notifyPeriods[$authorisation->notify_days] }}</td>
                                    <td>
                                        <a href="/authorisations/{{ $authorisation->id }}/edit" class="text-secondary">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="jumbotron mb-0 bg-white">
                        <h1 class="display-7 text-secondary">No authorisation recorded yet !</h1>
                        <hr class="my-4">
                        <p>All the authorisation records will appear here.</p>
                        <a class="btn btn-primary" href="/authorisations/create" role="button"><i class="fas fa-plus"></i> Crete New</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 pl-5 pr-5">
            @if ($authorisations->count() > 0)
                @foreach ($authorisations as $authorisation)
                    
                @endforeach
            @endif
        </div>
    </div>
@endsection