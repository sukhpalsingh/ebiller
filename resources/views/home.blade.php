@extends('layouts.app')

@section('content')
    <div class="bg-light">
        <div class="container pb-5">
            <div class="card">
                <div class="card-body">
                    @if ($pendingBills->count() > 0)
                        <h5 class="card-title text-muted">Pending Bills</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    @foreach ($pendingBills as $bill)
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
                                </tbody>
                            </table>
                        </div>
                    @else
                        No upcoming bill.
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
