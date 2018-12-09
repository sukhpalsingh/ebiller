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
                                        <h3>Transactions</h3>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($transactions->count() > 0)
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td width="100">{{ $transaction -> date }}</td>
                                            <td class="lead">
                                                {{ ucfirst($transaction -> type) }}
                                            </td>
                                            <td>
                                                {{ $transaction -> description }}
                                            </td>
                                            <td width="200" class="text-center">
                                                <p class="font-weight-bold">${{ $transaction -> amount }}</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tr>
                                <th class="text-right" colspan="5">
                                    <a
                                        class="btn light-blue lighten-3 btn-rounded waves-effect waves-light btn-sm"
                                        href="/accounts/{{ $account->id }}/transactions/import/create"
                                    >Import</a>
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection