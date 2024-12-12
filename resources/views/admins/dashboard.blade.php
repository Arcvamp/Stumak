<!-- resources/views/dashboard.blade.php -->
@extends('admins.layout') <!-- This tells Blade that this page uses the layout defined in layout.blade.php -->

@section('title', 'Dashboard') <!-- This sets the page title to "Dashboard" -->

@section('content')
    <div class="container-fluid">
        <!-- -------------------------------------------------------------- -->
        <!-- Breadcrumb -->
        <!-- -------------------------------------------------------------- -->
        <div class="position-relative mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4>Dashboard 5</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-primary text-decoration-none" href="{{url('api/admin/dashboard')}}">Home
                                </a>
                            </li>
                            <li class="breadcrumb-item d-flex justify-content-center align-items-center ps-0">
                                <iconify-icon icon="tabler:chevron-right"></iconify-icon>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                Dashboard 5
                            </li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="me-2">
                            <div class="breadbar"></div>
                        </div>
                        <div>
                            <small>LAST MONTH</small>
                            <h4 class="text-primary mb-0">$58,256</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- -------------------------------------------------------------- -->
        <!-- Breadcrumb End -->
        <!-- -------------------------------------------------------------- -->

        <div class="row">
            <div class="col-lg-4">
                <!-- start Earnings -->
                <div class="card w-100">
                    <div class="card-body">
                        <h4 class="card-title">Earnings</h4>
                        <p class="card-subtitle">Total Earnings of the Month</p>
                        <h2 class="fw-medium mt-3 mb-0">$43,567.53</h2>
                    </div>
                    <div class="earnings-month mt-1"></div>
                </div>
                <!-- end Earnings -->
            </div>
            <div class="col-lg-8">
                <!-- start Overview -->
                <div class="card w-100">
                    <div class="card-body border-bottom">
                        <h4 class="card-title">Overview</h4>
                        <p class="card-subtitle">Total Earnings of the Month</p>
                    </div>
                    <div class="card-body mt-4 pt-8 pb-7">
                        <div class="row mt-2 align-items-center">
                            <!-- col -->
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        <span class="text-orange display-5 d-flex">
                                            <iconify-icon icon="solar:wallet-money-broken"></iconify-icon></span>
                                    </div>
                                    <div>
                                        <span class="text-muted">Net Profit</span>
                                        <h3 class="fw-medium mb-0">$3,567.53</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- col -->
                            <!-- col -->
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        <span class="text-primary display-5 d-flex">
                                            <iconify-icon icon="solar:bag-2-outline"></iconify-icon>
                                        </span>
                                    </div>
                                    <div>
                                        <span class="text-muted">Product sold</span>
                                        <h3 class="fw-medium mb-0">5489</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- col -->
                            <!-- col -->
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        <span class="display-5 text-success d-flex">
                                            <iconify-icon icon="solar:shield-user-outline"></iconify-icon>
                                        </span>
                                    </div>
                                    <div>
                                        <span class="text-muted">New
                                            Customers</span>
                                        <h3 class="fw-medium mb-0">$23,568.90</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </div>
                </div>
                <!-- end Overview -->
            </div>
            <div class="col-12">
                <!-- start Product Sales -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Product Sales</h4>
                                <p class="card-subtitle">Total Earnings of the
                                    Month</p>
                            </div>
                            <div class="ms-auto d-flex align-items-center">
                                <!-- Tabs -->
                                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab2" data-bs-toggle="pill" href="#day"
                                            role="tab" aria-selected="true">Day</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab2" data-bs-toggle="pill" href="#week"
                                            role="tab" aria-selected="false">Week</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-month-tab2" data-bs-toggle="pill" href="#month"
                                            role="tab" aria-selected="false">Month</a>
                                    </li>
                                </ul>
                                <!-- Tabs -->
                            </div>
                        </div>
                        <div class="tab-content mt-3" id="pills-tabContent2">
                            <div class="tab-pane fade show active" id="day" role="tabpanel"
                                aria-labelledby="pills-home-tab2">
                                <div class="day-chart"></div>
                            </div>
                            <div class="tab-pane fade" id="week" role="tabpanel" aria-labelledby="pills-profile-tab2">
                                <div class="week-chart"></div>
                            </div>
                            <div class="tab-pane fade" id="month" role="tabpanel" aria-labelledby="pills-month-tab2">
                                <div class="month-chart d-flex justify-content-center"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Product Sales -->
            </div>
            <div class="col-lg-8">
                <!-- start Products of the Month -->
                <div class="card w-100">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Products of the Month</h4>
                                <p class="card-subtitle">Overview of Latest
                                    Month</p>
                            </div>
                            <div class="ms-auto d-flex align-items-center">
                                <div class="dl">
                                    <select class="form-select">
                                        <option value="0" selected>March</option>
                                        <option value="1">April</option>
                                        <option value="2">May</option>
                                        <option value="3">June</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- title -->
                        <div class="table-responsive scrollable mt-2">
                            <table class="table v-middle">
                                <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th class="border-top-0">Products</th>
                                        <th class="border-top-0">Customers</th>
                                        <th class="border-top-0">Status</th>
                                        <th class="border-top-0">Invoice</th>
                                        <th class="border-top-0">Amount</th>
                                    </tr>
                                    <!-- end row -->
                                </thead>
                                <tbody>
                                    <!-- start row -->
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <img  src="{{asset('assets/images/products/chair.png" class="rounded-circle')}}"
                                                        width="45" height="45" />
                                                </div>
                                                <div class>
                                                    <h6 class="mb-0">Orange
                                                        Shoes</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Rotating Chair</td>
                                        <td>
                                            <iconify-icon icon="ri:checkbox-blank-circle-fill" class="text-orange fs-4"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="In Progress"></iconify-icon>
                                        </td>
                                        <td>35</td>
                                        <td class="fw-medium">$96K</td>
                                    </tr>
                                    <!-- end row -->
                                    <!-- start row -->
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <img  src="{{asset('assets/images/products/chair2.png" class="rounded-circle')}}"
                                                        width="45" height="45" />
                                                </div>
                                                <div class>
                                                    <h6 class="mb-0">Red Sandle</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Dummy Product</td>
                                        <td>
                                            <iconify-icon icon="ri:checkbox-blank-circle-fill" class="text-success fs-4"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Active"></iconify-icon>
                                        </td>
                                        <td>35</td>
                                        <td class="fw-medium">$96K</td>
                                    </tr>
                                    <!-- end row -->
                                    <!-- start row -->
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <img  src="{{asset('assets/images/products/chair3.png" class="rounded-circle')}}"
                                                        width="45" height="45" />
                                                </div>
                                                <div class>
                                                    <h6 class="mb-0">Gourgeous
                                                        Purse</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Comfortable Chair</td>
                                        <td>
                                            <iconify-icon icon="ri:checkbox-blank-circle-fill" class="text-success fs-4"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Active"></iconify-icon>
                                        </td>
                                        <td>35</td>
                                        <td class="fw-medium">$96K</td>
                                    </tr>
                                    <!-- end row -->
                                    <!-- start row -->
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <img  src="{{asset('assets/images/products/chair4.png" class="rounded-circle')}}"
                                                        width="45" height="45" />
                                                </div>
                                                <div class>
                                                    <h6 class="mb-0">Puma
                                                        T-shirt</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Wooden Chair</td>
                                        <td>
                                            <iconify-icon icon="ri:checkbox-blank-circle-fill" class="text-orange fs-4"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="In Progress"></iconify-icon>
                                        </td>
                                        <td>35</td>
                                        <td class="fw-medium">$96K</td>
                                    </tr>
                                    <!-- end row -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end Products of the Month -->
            </div>
            <div class="col-lg-4">
                <!--  start Order Stats -->
                <div class="card w-100">
                    <div class="card-body mb-1">
                        <h4 class="card-title">Order Stats</h4>
                        <p class="card-subtitle">Overview of orders</p>
                        <div class="order-stats mt-4 d-flex justify-content-center"></div>
                    </div>
                    <div class="card-body mt-4 border-top">
                        <div class="row">
                            <div class="col-4 text-center">
                                <iconify-icon icon="ri:checkbox-blank-circle-fill"
                                    class="text-primary fs-4"></iconify-icon>
                                <h3 class="mb-0 fw-medium">5489</h3>
                                <span>Success</span>
                            </div>
                            <div class="col-4 text-center">
                                <iconify-icon icon="ri:checkbox-blank-circle-fill" class="text-info fs-4"></iconify-icon>
                                <h3 class="mb-0 fw-medium">954</h3>
                                <span>Pending</span>
                            </div>
                            <div class="col-4 text-center">
                                <iconify-icon icon="ri:checkbox-blank-circle-fill"
                                    class="text-orange fs-4"></iconify-icon>
                                <h3 class="mb-0 fw-medium">736</h3>
                                <span>Failed</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Order Stats -->
            </div>
            <div class="col-12">
                <!-- start Reviews -->
                <div class="card">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-body">
                                <h4 class="card-title">Reviews</h4>
                                <p class="card-subtitle">Overview of Review</p>
                                <h2 class="fw-medium mt-5 mb-0">25426</h2>
                                <span class="text-muted">This month we got 346 New
                                    Reviews</span>
                                <div class="image-box mt-4 mb-4">
                                    <a href="javascript:void(0)" class="me-2" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Simmons">
                                        <img  src="{{asset('assets/images/profile/user-5.jpg')}}" class="rounded-circle"
                                            width="45" alt="user" />
                                    </a>
                                    <a href="javascript:void(0)" class="me-2" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Fitz">
                                        <img  src="{{asset('assets/images/profile/user-2.jpg')}}" class="rounded-circle"
                                            width="45" alt="user" />
                                    </a>
                                    <a href="javascript:void(0)" class="me-2" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Phil">
                                        <img  src="{{asset('assets/images/profile/user-3.jpg')}}" class="rounded-circle"
                                            width="45" alt="user" />
                                    </a>
                                    <a href="javascript:void(0)" class="me-2" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Melinda">
                                        <img  src="{{asset('assets/images/profile/user-4.jpg')}}" class="rounded-circle"
                                            width="45" alt="user" />
                                    </a>
                                </div>
                                <a href="javascript:void(0)"
                                    class="btn btn-lg btn-primary waves-effect waves-light">Checkout
                                    All Reviews</a>
                            </div>
                        </div>
                        <div class="col-lg-8 border-left">
                            <div class="card-body">
                                <ul class="list-style-none">
                                    <li class="mt-4">
                                        <div class="d-flex align-items-center">
                                            <iconify-icon icon="solar:smile-circle-outline"
                                                class="display-5 text-muted"></iconify-icon>
                                            <div class="ms-2">
                                                <h5 class="mb-0">Positive
                                                    Reviews</h5>
                                                <span class="text-muted">25547
                                                    Reviews</span>
                                            </div>
                                        </div>
                                        <div class="progress mt-1">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 47%"
                                                aria-valuenow="47" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                    <li class="mt-5">
                                        <div class="d-flex align-items-center">
                                            <iconify-icon icon="solar:sad-circle-outline"
                                                class="display-5 text-muted"></iconify-icon>
                                            <div class="ms-2">
                                                <h5 class="mb-0">Negative
                                                    Reviews</h5>
                                                <span class="text-muted">5547
                                                    Reviews</span>
                                            </div>
                                        </div>
                                        <div class="progress mt-1">
                                            <div class="progress-bar bg-orange" role="progressbar" style="width: 33%"
                                                aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                    <li class="mt-5 mb-5">
                                        <div class="d-flex align-items-center">
                                            <iconify-icon icon="solar:expressionless-circle-outline"
                                                class="display-5 text-muted"></iconify-icon>
                                            <div class="ms-2">
                                                <h5 class="mb-0">Neutral
                                                    Reviews</h5>
                                                <span class="text-muted">547
                                                    Reviews</span>
                                            </div>
                                        </div>
                                        <div class="progress mt-1">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 20%"
                                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Reviews -->
            </div>
        </div>
    </div>
@endsection
