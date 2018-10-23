@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card col-md-10">
            <h5 class="card-header info-color white-text text-center py-4">
                <strong>New Category</strong>
            </h5>
            <div class="card-body px-lg-5 pt-0">
                <form style="color: #757575;"
                    name="bill-category-form"
                    action="/bill-categories{{ isset($billCategory) ? '/' . $billCategory->id : '' }}"
                    enctype="multipart/form-data"
                    method="POST"
                >
                    {{ csrf_field() }}
                    @if (isset($billCategory))
                        {{ method_field('PUT') }}
                    @endif
                    <div class="form-group row mt-3">
                        <label for="name" class="col-sm-2 col-form-label text-right">Name *</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $billCategory -> name ?? ''}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="icon" class="col-sm-2 col-form-label text-right">Icon</label>
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
                    <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
