@extends('admin.layout')

@section('content')
    <div class="page-header">
        <h4 class="page-title">Edit Coupon</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Packages</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Coupons</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Edit</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-inline-block">Edit Coupon</div>
                    <a class="btn btn-info btn-sm float-right d-inline-block" href="{{ route('admin.coupon.index') }}">
                        <span class="btn-label">
                            <i class="fas fa-backward"></i>
                        </span>
                        Back
                    </a>
                </div>
                <div class="card-body pt-5 pb-5">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">

                            <form id="ajaxForm" class="modal-form" action="{{ route('admin.coupon.update') }}"
                                method="POST">
                                @csrf
                                <input type="hidden" name="coupon_id" value="{{ $coupon->id }}">
                                <div class="row no-gutters">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Name **</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $coupon->name }}" placeholder="Enter name">
                                            <p id="errname" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Code **</label>
                                            <input type="text" class="form-control" name="code"
                                                value="{{ $coupon->code }}" placeholder="Enter code">
                                            <p id="errcode" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Type **</label>
                                            <select name="type" id="" class="form-control">
                                                <option value="percentage"
                                                    {{ $coupon->type == 'percentage' ? 'selected' : '' }}>Percentage
                                                </option>
                                                <option value="fixed" {{ $coupon->type == 'fixed' ? 'selected' : '' }}>
                                                    Fixed
                                                </option>
                                            </select>
                                            <p id="errtype" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Value **</label>
                                            <input type="text" class="form-control" name="value"
                                                value="{{ $coupon->value }}" placeholder="Enter value" autocomplete="off">
                                            <p id="errvalue" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row no-gutters">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Start Date **</label>
                                            <input type="text" class="form-control datepicker" name="start_date"
                                                value="{{ $coupon->start_date }}" placeholder="Enter start date"
                                                autocomplete="off">
                                            <p id="errstart_date" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">End Date **</label>
                                            <input type="text" class="form-control datepicker" name="end_date"
                                                value="{{ $coupon->end_date }}" placeholder="Enter end date"
                                                autocomplete="off">
                                            <p id="errend_date" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row no-gutters">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Packages</label>
                                            <select class="select2" name="packages[]" multiple="multiple"
                                                placeholder="Select Packages">
                                                @foreach ($packages as $package)
                                                    <option value="{{ $package->id }}"
                                                        {{ is_array($selectedPackages) && in_array($package->id, $selectedPackages) ? 'selected' : '' }}>
                                                        {{ $package->title }} {{ ucfirst($package->term) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <p class="mb-0 text-warning">This coupon can be applied to these packages</p>
                                            <p class="mb-0 text-warning">Leave this field blank for all packages</p>
                                            <p id="errpackages" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Maximum uses limit **</label>
                                            <input type="number" value="{{ $coupon->minimum_spend }}"
                                                class="form-control " name="minimum_spend" value=""
                                                placeholder="Enter Maximum uses limit" autocomplete="off">
                                            <p id="errminimum_spend" class="mb-0 text-danger em"></p>
                                            <p class="mb-0 text-warning">Enter 999999 to make it unlimited</p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form">
                        <div class="form-group from-show-notify row">
                            <div class="col-12 text-center">
                                <button type="submit" id="submitBtn" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
