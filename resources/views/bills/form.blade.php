@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card col-md-10">
            <h5 class="card-header info-color white-text text-center py-4">
                <strong>New Bill</strong>
            </h5>
            <div class="card-body px-lg-5 pt-0">
                <form class="text-center" style="color: #757575;">
                    <div class="md-form mt-3">
                        <input type="text" id="materialContactFormName" class="form-control">
                        <label for="materialContactFormName">Name</label>
                    </div>
                    <div class="md-form mt-3">
                        <input type="text" id="materialContactFormName" class="form-control">
                        <label for="materialContactFormName">Due Date</label>
                    </div>
                    <div class="md-form mt-3">
                        <select id="category_id" class="form-control">
                            <option value="">Choose Category</option>
                            <option value="1">Feedback</option>
                        </select>
                    </div>
                    <div class="md-form mt-3">
                        <input type="text" id="materialContactFormName" class="form-control">
                        <label for="materialContactFormName">Amount</label>
                    </div>
                    <div class="md-form mt-3">
                        <select id="account_id" class="form-control">
                            <option value="">Choose Account</option>
                            <option value="1">Feedback</option>
                        </select>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="materialContactFormCopy">
                        <label class="form-check-label" for="materialContactFormCopy">Auto Pay</label>
                    </div>

                    <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Save</button>

                </form>
            </div>
        </div>
    </div>
@endsection