@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card col-md-10">
            <h5 class="card-header info-color white-text text-center py-4">
                <strong>New Account</strong>
            </h5>
            <div class="card-body px-lg-5 pt-0">
                <form
                    class="text-center"
                    style="color: #757575;"
                    name="account-form"
                    action="/accounts{{ isset($account) ? '/' . $account->id : '' }}"
                    enctype="multipart/form-data"
                    method="POST">
                    {{ csrf_field() }}
                    @if (isset($account))
                        {{ method_field('PUT') }}
                    @endif
                    <div class="form-group row mt-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $account -> name ?? ''}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description" name="description">{{ $account -> description ?? ''}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="icon" class="col-sm-2 col-form-label">Icon</label>
                        <div class="col-sm-10">
                            @if (empty($icon))
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="icon" name="icon" aria-describedby="icon">
                                    <label class="custom-file-label" for="icon">Choose file</label>
                                </div>
                            @else
                                <img src="{{ asset('storage/' . $icon->path) }}" class="img-thumbnail float-left" width="100px">
                            @endif
                        </div>
                    </div>
                    @if (isset($account))
                        <div class="form-group row">
                            <label for="icon" class="col-sm-2 col-form-label">Last Updated</label>
                            <div class="col-sm-10">
                                {{ $account->updated_at }}
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary btn-md">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection