<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />

    <!-- Core Css -->
    <link rel="stylesheet" href="{{asset('assets/css/styles.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/libs/quill/dist/quill.snow.css')}}">
  <link rel="stylesheet" href="{{asset('assets/libs/dropzone/dist/min/dropzone.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/libs/select2/dist/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/libs/sweetalert2/dist/sweetalert2.min.css')}}">
    <title>{{ $title }}</title>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('assets/images/logos/logo-icon.svg') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper">
        <!-- Sidebar Start -->
        <aside class="left-sidebar with-vertical">
            <div>
                <!-- ---------------------------------- -->
                <!-- Start Vertical Layout Sidebar -->
                <!-- ---------------------------------- -->
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="../main/index.html" class="text-nowrap logo-img d-flex align-items-center gap-6">
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{ asset('assets/images/logos/logo-icon.svg') }}" alt="homepage"
                                class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="{{ asset('assets/images/logos/logo-light-icon.svg') }}" alt="homepage"
                                class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="{{ asset('assets/images/logos/logo-text.svg') }}" alt="homepage"
                                class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="{{ asset('assets/images/logos/logo-light-text.svg') }}" class="light-logo"
                                alt="homepage" />
                        </span>
                    </a>
                </div>

                <nav class="sidebar-nav scroll-sidebar" data-simplebar>
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="pt-3">
                            <!-- User Profile-->
                            <div class="user-profile d-flex dropdown mt-3">
                                <div class="user-pic">
                                    <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="users"
                                        class="rounded-circle" width="40" />
                                </div>
                                <div class="user-content hide-menu ms-2">
                                    <a href="javascript:void(0)" class="" id="Userdd" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="mb-0 user-name fw-medium d-flex">
                                            Steve Jobs
                                            <iconify-icon icon="solar:alt-arrow-down-outline"
                                                class="ms-2"></iconify-icon>
                                        </h5>
                                        <span class="op-5 text-muted">info@xtreme.com</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                        <a class="dropdown-item d-flex" href="javascript:void(0)">
                                            <iconify-icon icon="solar:user-linear"
                                                class="text-info iconify-sm me-2 ms-1"></iconify-icon>
                                            My Profile
                                        </a>
                                        <a class="dropdown-item d-flex" href="javascript:void(0)">
                                            <iconify-icon icon="solar:card-outline"
                                                class="text-primary iconify-sm me-2 ms-1"></iconify-icon>
                                            My Balance
                                        </a>
                                        <a class="dropdown-item d-flex" href="javascript:void(0)">
                                            <iconify-icon icon="solar:inbox-linear"
                                                class="text-success iconify-sm me-2 ms-1"></iconify-icon>
                                            Inbox
                                        </a>
                                        <a class="dropdown-item d-flex border-bottom border-top mt-1 py-3"
                                            href="javascript:void(0)">
                                            <iconify-icon icon="solar:settings-outline"
                                                class="text-warning iconify-sm me-2 ms-1"></iconify-icon>
                                            Account Setting
                                        </a>

                                        <a class="dropdown-item d-flex py-3 pb-2" href="javascript:void(0)">
                                            <iconify-icon icon="solar:login-2-outline"
                                                class="text-danger iconify-sm me-2 ms-1"></iconify-icon>
                                            Logout
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>

                        <!-- Home -->
                        <!-- ---------------------------------- -->
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-bold" class="nav-small-cap-icon fs-4"></iconify-icon>
                            <span class="hide-menu">Personal</span>
                        </li>
                        <!-- ---------------------------------- -->
                        <!-- Dashboard -->
                        <!-- ---------------------------------- -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('api/admin/dashboard') }}">
                                <iconify-icon icon="solar:screencast-2-linear" class="fs-5"></iconify-icon>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link " href="{{ url('api/admin/product') }}">
                                <iconify-icon icon="solar:screencast-2-linear" class="fs-5"></iconify-icon>
                                <span class="hide-menu">Product</span>
                            </a>                           
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="" id="get-url">
                                <iconify-icon icon="solar:documents-linear" class="fs-5"></iconify-icon>
                                <span class="hide-menu">category</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="" id="get-url">
                                <iconify-icon icon="solar:screencast-2-linear" class="fs-5"></iconify-icon>
                                <span class="hide-menu">services</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="" id="get-url">
                                <iconify-icon icon="solar:screencast-2-linear" class="fs-5"></iconify-icon>
                                <span class="hide-menu">vendors</span>
                            </a>
                        </li>


                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <span class="d-flex">
                                    <iconify-icon icon="solar:smart-speaker-minimalistic-line-duotone"
                                        class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Ecommerce</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="../main/eco-shop.html" class="sidebar-link sublink">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="sidebar-icon"></i>
                                        </div>
                                        <span class="hide-menu"> Shop </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="../main/eco-shop-detail.html" class="sidebar-link sublink">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="sidebar-icon"></i>
                                        </div>
                                        <span class="hide-menu"> Details </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="../main/eco-product-list.html" class="sidebar-link sublink">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="sidebar-icon"></i>
                                        </div>
                                        <span class="hide-menu"> List </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="../main/eco-checkout.html" class="sidebar-link sublink">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="sidebar-icon"></i>
                                        </div>
                                        <span class="hide-menu"> Checkout </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="../main/eco-add-product.html" class="sidebar-link sublink">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="sidebar-icon"></i>
                                        </div>
                                        <span class="hide-menu"> Add Product </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="../main/eco-edit-product.html" class="sidebar-link sublink">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="sidebar-icon"></i>
                                        </div>
                                        <span class="hide-menu"> Edit Product </span>
                                    </a>
                                </li>
                            </ul>
                        </li>











                    </ul>
                </nav>

                <!-- ---------------------------------- -->
                <!-- Start Vertical Layout Sidebar -->
                <!-- ---------------------------------- -->
            </div>
        </aside>
        <!--  Sidebar End -->
        <div class="page-wrapper">
            <!--  Header Start -->
            <header class="topbar">
                <div class="with-vertical">
                    <!-- ---------------------------------- -->
                    <!-- Start Vertical Layout Header -->
                    <!-- ---------------------------------- -->
                    <nav class="navbar navbar-expand-lg px-lg-0 px-0 py-0">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item nav-icon-hover-bg rounded-circle">
                                <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                                    <iconify-icon icon="solar:list-bold-duotone" class="fs-7"></iconify-icon>
                                </a>
                            </li>
                            <li class="nav-item d-none d-lg-flex search-box nav-icon-hover-bg rounded-circle">
                                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <iconify-icon icon="solar:magnifer-linear"></iconify-icon>
                                </a>
                            </li>
                            <li class="nav-item dropdown mega-dropdown d-none d-lg-block">
                                <a class="nav-link" id="drop2" href="javascript:void(0)" aria-haspopup="true"
                                    aria-expanded="false">
                                    Mega
                                    <iconify-icon icon="solar:alt-arrow-down-outline"
                                        class="ps-1 fs-4"></iconify-icon>
                                </a>
                                <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop2"
                                    data-simplebar>
                                    <div class="mega-dropdown-menu row">
                                        <div class="col-lg-3 col-xl-2 mb-4">
                                            <h4 class="mb-3 fs-5">Carousel</h4>
                                            <!-- CAROUSEL -->
                                            <div id="carouselExampleControls" class="carousel slide carousel-dark"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block img-fluid"
                                                            src="{{ asset('assets/images/blog/blog-img1.jpg') }}"
                                                            alt="First slide" />
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block img-fluid"
                                                            src="{{ asset('assets/images/blog/blog-img2.jpg') }}"
                                                            alt="Second slide" />
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block img-fluid"
                                                            src="{{ asset('assets/images/blog/blog-img3.jpg') }}"
                                                            alt="Third slide" />
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleControls"
                                                    role="button" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon"
                                                        aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleControls"
                                                    role="button" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon"
                                                        aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </a>
                                            </div>
                                            <!-- End CAROUSEL -->
                                        </div>
                                        <div class="col-lg-3 mb-4">
                                            <h4 class="mb-3 fs-5">Accordion</h4>
                                            <!-- Accordian -->
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-headingOne">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapseOne" aria-expanded="false"
                                                            aria-controls="flush-collapseOne">
                                                            Accordion Item #1
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                        aria-labelledby="flush-headingOne"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod
                                                            high life accusamus terry richardson ad squid.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-headingTwo">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                                            aria-controls="flush-collapseTwo">
                                                            Accordion Item #2
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                                        aria-labelledby="flush-headingTwo"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod
                                                            high life accusamus terry richardson ad squid.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-headingThree">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapseThree"
                                                            aria-expanded="false" aria-controls="flush-collapseThree">
                                                            Accordion Item #3
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                                        aria-labelledby="flush-headingThree"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod
                                                            high life accusamus terry richardson ad squid.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-4">
                                            <h4 class="mb-3 fs-5">Contact Us</h4>
                                            <!-- Contact -->
                                            <form>
                                                <div class="mb-3 form-floating">
                                                    <input type="text" class="form-control" id="exampleInputname1"
                                                        placeholder="Enter Name" />
                                                    <label>Enter Name</label>
                                                </div>
                                                <div class="mb-3 form-floating">
                                                    <input type="email" class="form-control"
                                                        placeholder="Enter email" />
                                                    <label>Enter Email address</label>
                                                </div>
                                                <div class="mb-3 form-floating">
                                                    <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                                    <label>Enter Message</label>
                                                </div>
                                                <button type="submit" class="btn px-4 rounded-pill btn-primary">
                                                    Submit
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-lg-3 col-xlg-4 mb-4">
                                            <h4 class="mb-3 fs-5">List style</h4>
                                            <ol class="list-group list-group-numbered px-0">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <h6 class="fw-semibold mb-0">Subheading</h6>
                                                        <div class="d-block text-muted text-truncate text-truncate">
                                                            Content for list item
                                                        </div>
                                                    </div>
                                                    <span class="badge bg-primary rounded-pill">14</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <h6 class="fw-semibold mb-0">Subheading</h6>
                                                        <div class="d-block text-muted text-truncate text-truncate">
                                                            Content for list item
                                                        </div>
                                                    </div>
                                                    <span class="badge bg-primary rounded-pill">14</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <h6 class="fw-semibold mb-0">Subheading</h6>
                                                        <div class="d-block text-muted text-truncate text-truncate">
                                                            Content for list item
                                                        </div>
                                                    </div>
                                                    <span class="badge bg-primary rounded-pill">14</span>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item dropdown d-none d-lg-block">
                                <div class="hover-dd">
                                    <a class="nav-link" id="drop2" href="javascript:void(0)"
                                        aria-haspopup="true" aria-expanded="false">
                                        Apps
                                        <iconify-icon icon="solar:alt-arrow-down-outline"
                                            class="ps-1 fs-4"></iconify-icon>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="ps-7 pt-7">
                                                    <div class="border-bottom">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="position-relative">
                                                                    <a href="../main/app-chat.html"
                                                                        class="d-flex align-items-center pb-9 position-relative">
                                                                        <div
                                                                            class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                            <img src="{{ asset('assets/images/svgs/icon-dd-chat.svg') }}"
                                                                                alt="xtreme-img" class="img-fluid"
                                                                                width="24" height="24" />
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                                Chat Application
                                                                            </h6>
                                                                            <span
                                                                                class="fs-2 d-block text-body-secondary">New
                                                                                messages arrived</span>
                                                                        </div>
                                                                    </a>
                                                                    <a href="../main/app-invoice.html"
                                                                        class="d-flex align-items-center pb-9 position-relative">
                                                                        <div
                                                                            class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                            <img src="{{ asset('assets/images/svgs/icon-dd-invoice.svg') }}"
                                                                                alt="xtreme-img" class="img-fluid"
                                                                                width="24" height="24" />
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                                Invoice App
                                                                            </h6>
                                                                            <span
                                                                                class="fs-2 d-block text-body-secondary">Get
                                                                                latest invoice</span>
                                                                        </div>
                                                                    </a>
                                                                    <a href="../main/app-contact2.html"
                                                                        class="d-flex align-items-center pb-9 position-relative">
                                                                        <div
                                                                            class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                            <img src="{{ asset('assets/images/svgs/icon-dd-mobile.svg') }}"
                                                                                alt="xtreme-img" class="img-fluid"
                                                                                width="24" height="24" />
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                                Contact Application
                                                                            </h6>
                                                                            <span
                                                                                class="fs-2 d-block text-body-secondary">2
                                                                                Unsaved Contacts</span>
                                                                        </div>
                                                                    </a>
                                                                    <a href="../main/app-email.html"
                                                                        class="d-flex align-items-center pb-9 position-relative">
                                                                        <div
                                                                            class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                            <img src="{{ asset('assets/images/svgs/icon-dd-message-box.svg') }}"
                                                                                alt="xtreme-img" class="img-fluid"
                                                                                width="24" height="24" />
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                                Email App
                                                                            </h6>
                                                                            <span
                                                                                class="fs-2 d-block text-body-secondary">Get
                                                                                new emails</span>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="position-relative">
                                                                    <a href="../main/page-user-profile.html"
                                                                        class="d-flex align-items-center pb-9 position-relative">
                                                                        <div
                                                                            class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                            <img src="{{ asset('assets/images/svgs/icon-dd-cart.svg') }}"
                                                                                alt="xtreme-img" class="img-fluid"
                                                                                width="24" height="24" />
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                                User Profile
                                                                            </h6>
                                                                            <span
                                                                                class="fs-2 d-block text-body-secondary">learn
                                                                                more information</span>
                                                                        </div>
                                                                    </a>
                                                                    <a href="../main/app-calendar.html"
                                                                        class="d-flex align-items-center pb-9 position-relative">
                                                                        <div
                                                                            class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                            <img src="{{ asset('assets/images/svgs/icon-dd-date.svg') }}"
                                                                                alt="xtreme-img" class="img-fluid"
                                                                                width="24" height="24" />
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                                Calendar App
                                                                            </h6>
                                                                            <span
                                                                                class="fs-2 d-block text-body-secondary">Get
                                                                                dates</span>
                                                                        </div>
                                                                    </a>
                                                                    <a href="../main/app-contact.html"
                                                                        class="d-flex align-items-center pb-9 position-relative">
                                                                        <div
                                                                            class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                            <img src="{{ asset('assets/images/svgs/icon-dd-lifebuoy.svg') }}"
                                                                                alt="xtreme-img" class="img-fluid"
                                                                                width="24" height="24" />
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                                Contact List Table
                                                                            </h6>
                                                                            <span
                                                                                class="fs-2 d-block text-body-secondary">Add
                                                                                new contact</span>
                                                                        </div>
                                                                    </a>
                                                                    <a href="../main/app-notes.html"
                                                                        class="d-flex align-items-center pb-9 position-relative">
                                                                        <div
                                                                            class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                            <img src="{{ asset('assets/images/svgs/icon-dd-application.svg') }}"
                                                                                alt="xtreme-img" class="img-fluid"
                                                                                width="24" height="24" />
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                                Notes Application
                                                                            </h6>
                                                                            <span
                                                                                class="fs-2 d-block text-body-secondary">To-do
                                                                                and Daily tasks</span>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center py-3">
                                                        <div class="col-8">
                                                            <a class="fw-semibold d-flex align-items-center lh-1"
                                                                href="javascript:void(0)">
                                                                <i class="ti ti-help fs-6 me-2"></i>Frequently
                                                                Asked Questions
                                                            </a>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="d-flex justify-content-end pe-4">
                                                                <button class="btn btn-primary">Check</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 ms-n4">
                                                <div class="position-relative p-7 border-start h-100">
                                                    <h5 class="fs-5 mb-9 fw-semibold">Quick Links</h5>
                                                    <ul class="">
                                                        <li class="mb-3">
                                                            <a class="fw-semibold bg-hover-primary"
                                                                href="../main/page-pricing.html">Pricing Page</a>
                                                        </li>
                                                        <li class="mb-3">
                                                            <a class="fw-semibold bg-hover-primary"
                                                                href="../main/authentication-login.html">Authentication
                                                                Design</a>
                                                        </li>
                                                        <li class="mb-3">
                                                            <a class="fw-semibold bg-hover-primary"
                                                                href="../main/authentication-register.html">Register
                                                                Now</a>
                                                        </li>
                                                        <li class="mb-3">
                                                            <a class="fw-semibold bg-hover-primary"
                                                                href="../main/authentication-error.html">404 Error
                                                                Page</a>
                                                        </li>
                                                        <li class="mb-3">
                                                            <a class="fw-semibold bg-hover-primary"
                                                                href="../main/app-notes.html">Notes App</a>
                                                        </li>
                                                        <li class="mb-3">
                                                            <a class="fw-semibold bg-hover-primary"
                                                                href="../main/page-user-profile.html">User
                                                                Application</a>
                                                        </li>
                                                        <li class="mb-3">
                                                            <a class="fw-semibold bg-hover-primary"
                                                                href="../main/page-account-settings.html">Account
                                                                Settings</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown d-none d-lg-block">
                                <a class="nav-link" href="../main/app-chat.html"> Chat </a>
                            </li>
                            <li class="nav-item dropdown d-none d-lg-block">
                                <a class="nav-link" href="../main/app-calendar.html">
                                    Calendar
                                </a>
                            </li>
                            <li class="nav-item dropdown d-none d-lg-block">
                                <a class="nav-link" href="../main/app-email.html"> Email </a>
                            </li>
                        </ul>

                        <div class="d-block d-lg-none">
                            <div class="brand-logo d-flex align-items-center justify-content-between">
                                <a href="../main/index.html" class="text-nowrap logo-img">
                                    <b class="">
                                        <img src="{{ asset('assets/images/logos/logo-light-icon.svg') }}"
                                            alt="homepage" class="" />
                                    </b>
                                    <!--End Logo icon -->
                                    <!-- Logo text -->
                                    <span class="">
                                        <img src="{{ asset('assets/images/logos/logo-light-text.svg') }}"
                                            class="ps-2" alt="homepage" />
                                    </span>
                                </a>
                            </div>
                        </div>
                        <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 border-0 text-white"
                            href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="p-2">
                                <i class="ti ti-dots fs-7"></i>
                            </span>
                        </a>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <div class="d-flex align-items-center justify-content-between py-3">
                                <ul class="navbar-nav flex-row d-flex d-lg-none">
                                    <li class="nav-item dropdown mega-dropdown nav-icon-hover-bg rounded-circle">
                                        <a class="nav-link" id="drop2" href="javascript:void(0)"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="d-lg-flex d-none">Mega</span>
                                            <iconify-icon icon="solar:alt-arrow-down-outline"
                                                class="ps-1 fs-4 d-lg-flex d-none"></iconify-icon>
                                            <span class="d-lg-none d-flex"><iconify-icon
                                                    icon="solar:code-scan-line-duotone"></iconify-icon></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop2"
                                            data-simplebar>
                                            <div class="mega-dropdown-menu row">
                                                <div class="col-lg-3 col-xl-2 mb-4">
                                                    <h4 class="mb-3 fs-5">Carousel</h4>
                                                    <!-- CAROUSEL -->
                                                    <div id="carouselExampleControls"
                                                        class="carousel slide carousel-dark" data-bs-ride="carousel">
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <img class="d-block img-fluid"
                                                                    src="{{ asset('assets/images/blog/blog-img1.jpg') }}"
                                                                    alt="First slide" />
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img class="d-block img-fluid"
                                                                    src="{{ asset('assets/images/blog/blog-img2.jpg') }}"
                                                                    alt="Second slide" />
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img class="d-block img-fluid"
                                                                    src="{{ asset('assets/images/blog/blog-img3.jpg') }}"
                                                                    alt="Third slide" />
                                                            </div>
                                                        </div>
                                                        <a class="carousel-control-prev"
                                                            href="#carouselExampleControls" role="button"
                                                            data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next"
                                                            href="#carouselExampleControls" role="button"
                                                            data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </a>
                                                    </div>
                                                    <!-- End CAROUSEL -->
                                                </div>
                                                <div class="col-lg-3 mb-4">
                                                    <h4 class="mb-3 fs-5">Accordion</h4>
                                                    <!-- Accordian -->
                                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="flush-headingOne">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapseOne"
                                                                    aria-expanded="false"
                                                                    aria-controls="flush-collapseOne">
                                                                    Accordion Item #1
                                                                </button>
                                                            </h2>
                                                            <div id="flush-collapseOne"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="flush-headingOne"
                                                                data-bs-parent="#accordionFlushExample">
                                                                <div class="accordion-body">
                                                                    Anim pariatur cliche reprehenderit, enim
                                                                    eiusmod high life accusamus terry richardson
                                                                    ad squid.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="flush-headingTwo">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapseTwo"
                                                                    aria-expanded="false"
                                                                    aria-controls="flush-collapseTwo">
                                                                    Accordion Item #2
                                                                </button>
                                                            </h2>
                                                            <div id="flush-collapseTwo"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="flush-headingTwo"
                                                                data-bs-parent="#accordionFlushExample">
                                                                <div class="accordion-body">
                                                                    Anim pariatur cliche reprehenderit, enim
                                                                    eiusmod high life accusamus terry richardson
                                                                    ad squid.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="flush-headingThree">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapseThree"
                                                                    aria-expanded="false"
                                                                    aria-controls="flush-collapseThree">
                                                                    Accordion Item #3
                                                                </button>
                                                            </h2>
                                                            <div id="flush-collapseThree"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="flush-headingThree"
                                                                data-bs-parent="#accordionFlushExample">
                                                                <div class="accordion-body">
                                                                    Anim pariatur cliche reprehenderit, enim
                                                                    eiusmod high life accusamus terry richardson
                                                                    ad squid.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 mb-4">
                                                    <h4 class="mb-3 fs-5">Contact Us</h4>
                                                    <!-- Contact -->
                                                    <form>
                                                        <div class="mb-3 form-floating">
                                                            <input type="text" class="form-control"
                                                                id="exampleInputname1" placeholder="Enter Name" />
                                                            <label>Enter Name</label>
                                                        </div>
                                                        <div class="mb-3 form-floating">
                                                            <input type="email" class="form-control"
                                                                placeholder="Enter email" />
                                                            <label>Enter Email address</label>
                                                        </div>
                                                        <div class="mb-3 form-floating">
                                                            <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                                            <label>Enter Message</label>
                                                        </div>
                                                        <button type="submit"
                                                            class="btn px-4 rounded-pill btn-primary">
                                                            Submit
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-lg-3 col-xlg-4 mb-4">
                                                    <h4 class="mb-3 fs-5">List style</h4>
                                                    <ol class="list-group list-group-numbered px-0">
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start">
                                                            <div class="ms-2 me-auto">
                                                                <h6 class="fw-semibold mb-0">Subheading</h6>
                                                                <div
                                                                    class="d-block text-muted text-truncate text-truncate">
                                                                    Content for list item
                                                                </div>
                                                            </div>
                                                            <span class="badge bg-primary rounded-pill">14</span>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start">
                                                            <div class="ms-2 me-auto">
                                                                <h6 class="fw-semibold mb-0">Subheading</h6>
                                                                <div
                                                                    class="d-block text-muted text-truncate text-truncate">
                                                                    Content for list item
                                                                </div>
                                                            </div>
                                                            <span class="badge bg-primary rounded-pill">14</span>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start">
                                                            <div class="ms-2 me-auto">
                                                                <h6 class="fw-semibold mb-0">Subheading</h6>
                                                                <div
                                                                    class="d-block text-muted text-truncate text-truncate">
                                                                    Content for list item
                                                                </div>
                                                            </div>
                                                            <span class="badge bg-primary rounded-pill">14</span>
                                                        </li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown nav-icon-hover-bg rounded-circle">
                                        <a href="javascript:void(0)"
                                            class="nav-link d-flex d-lg-none align-items-center justify-content-center"
                                            type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                                            aria-controls="offcanvasWithBothOptions">
                                            <iconify-icon icon="solar:menu-dots-circle-linear"></iconify-icon>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                                    <li class="nav-item nav-icon-hover-bg rounded-circle">
                                        <a class="nav-link moon dark-layout" href="javascript:void(0)">
                                            <iconify-icon icon="solar:moon-line-duotone"
                                                class="moon"></iconify-icon>
                                        </a>
                                        <a class="nav-link sun light-layout" href="javascript:void(0)">
                                            <iconify-icon icon="solar:sun-2-line-duotone"
                                                class="sun"></iconify-icon>
                                        </a>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- start language Dropdown -->
                                    <!-- ------------------------------- -->
                                    <li class="nav-item dropdown nav-icon-hover-bg rounded-circle">
                                        <a class="nav-link" href="javascript:void(0)" id="drop2"
                                            aria-expanded="false">
                                            <img src="{{ asset('assets/images/svgs/icon-flag-en.svg') }}"
                                                alt="xtreme-img" width="22px" height="22px" />
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop2">
                                            <div class="message-body">
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-3 py-2 px-4 dropdown-item">
                                                    <div class="position-relative">
                                                        <img src="{{ asset('assets/images/svgs/icon-flag-en.svg') }}"
                                                            alt="xtreme-img" width="20px" height="20px"
                                                            class="round-20" />
                                                    </div>
                                                    <p class="mb-0">English</p>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-3 py-2 px-4 dropdown-item">
                                                    <div class="position-relative">
                                                        <img src="{{ asset('assets/images/svgs/icon-flag-cn.svg') }}"
                                                            alt="xtreme-img" width="20px" height="20px"
                                                            class="round-20" />
                                                    </div>
                                                    <p class="mb-0">Chinese</p>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-3 py-2 px-4 dropdown-item">
                                                    <div class="position-relative">
                                                        <img src="{{ asset('assets/images/svgs/icon-flag-fr.svg') }}"
                                                            alt="xtreme-img" width="20px" height="20px"
                                                            class="round-20" />
                                                    </div>
                                                    <p class="mb-0">French</p>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-3 py-2 px-4 dropdown-item">
                                                    <div class="position-relative">
                                                        <img src="{{ asset('assets/images/svgs/icon-flag-sa.svg') }}"
                                                            alt="xtreme-img" width="20px" height="20px"
                                                            class="round-20" />
                                                    </div>
                                                    <p class="mb-0">Arabic</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- end language Dropdown -->
                                    <!-- ------------------------------- -->
                                    <!-- ------------------------------- -->
                                    <!-- start notification Dropdown -->
                                    <!-- ------------------------------- -->
                                    <li class="nav-item dropdown nav-icon-hover-bg rounded-circle">
                                        <a class="nav-link" href="javascript:void(0)" id="drop2"
                                            aria-expanded="false">
                                            <iconify-icon icon="solar:bell-outline"></iconify-icon>
                                            <div class="notify">
                                                <span class="heartbit"></span>
                                                <span class="point"></span>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu content-dd mailbox dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop2">
                                            <div
                                                class="d-flex border-bottom align-items-center justify-content-between py-3 px-4">
                                                <div class="mb-0 fs-4 fw-medium h6">
                                                    Notifications
                                                </div>
                                            </div>
                                            <div class="message-body" data-simplebar>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span
                                                        class="flex-shrink-0 bg-danger-subtle rounded-circle round d-flex align-items-center justify-content-center fs-6 text-danger">
                                                        <iconify-icon
                                                            icon="solar:widget-3-line-duotone"></iconify-icon>
                                                    </span>
                                                    <div class="w-75">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Luanch Admin</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:30
                                                                AM</span>
                                                        </div>
                                                        <span class="d-block text-truncate text-truncate">Just see the
                                                            my new admin!</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span
                                                        class="flex-shrink-0 bg-success-subtle rounded-circle round d-flex align-items-center justify-content-center fs-6 text-success">
                                                        <iconify-icon
                                                            icon="solar:calendar-mark-line-duotone"></iconify-icon>
                                                    </span>
                                                    <div class="w-75">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Event today</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:10
                                                                AM</span>
                                                        </div>

                                                        <span class="d-block text-truncate text-truncate">Just a
                                                            reminder that you have event</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span
                                                        class="flex-shrink-0 bg-primary-subtle rounded-circle round d-flex align-items-center justify-content-center fs-6 text-primary">
                                                        <iconify-icon
                                                            icon="solar:settings-minimalistic-line-duotone"></iconify-icon>
                                                    </span>
                                                    <div class="w-75">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Settings</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:08
                                                                AM</span>
                                                        </div>
                                                        <span class="d-block text-truncate text-truncate">You can
                                                            customize this template as you
                                                            want</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span
                                                        class="flex-shrink-0 bg-warning-subtle rounded-circle round d-flex align-items-center justify-content-center fs-6 text-warning">
                                                        <iconify-icon
                                                            icon="solar:link-circle-line-duotone"></iconify-icon>
                                                    </span>
                                                    <div class="w-75">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Luanch Admin</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:30
                                                                AM</span>
                                                        </div>
                                                        <span class="d-block text-truncate text-truncate">Just see the
                                                            my new admin!</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span
                                                        class="flex-shrink-0 bg-success-subtle rounded-circle round d-flex align-items-center justify-content-center">
                                                        <i data-feather="calendar"
                                                            class="feather-sm fill-white text-success"></i>
                                                    </span>
                                                    <div class="w-75">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Event today</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:10
                                                                AM</span>
                                                        </div>
                                                        <span class="d-block text-truncate text-truncate">Just a
                                                            reminder that you have event</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span
                                                        class="flex-shrink-0 bg-primary-subtle rounded-circle round d-flex align-items-center justify-content-center">
                                                        <i data-feather="settings"
                                                            class="feather-sm fill-white text-primary"></i>
                                                    </span>
                                                    <div class="w-75">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Settings</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:08
                                                                AM</span>
                                                        </div>
                                                        <span class="d-block text-truncate text-truncate">You can
                                                            customize this template as you
                                                            want</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div>
                                                <a class="d-flex align-items-center pt-3 pb-2 justify-content-center h6 mb-0"
                                                    href="javascript:void(0);">
                                                    <span class="">Check all notifications</span>
                                                    <i data-feather="chevron-right" class="feather-sm"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown nav-icon-hover-bg rounded-circle">
                                        <a class="nav-link" href="javascript:void(0)" id="drop2"
                                            aria-expanded="false">
                                            <iconify-icon icon="solar:chat-line-outline"></iconify-icon>
                                            <div class="notify">
                                                <span class="heartbit"></span>
                                                <span class="point"></span>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu message-box content-dd mailbox dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop2">
                                            <div
                                                class="d-flex border-bottom align-items-center justify-content-between py-3 px-4">
                                                <h5 class="mb-0 fs-4 fw-medium h6">
                                                    You have 4 new messages
                                                </h5>
                                            </div>
                                            <div class="message-body" data-simplebar>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span class="user-img position-relative d-inline-block">
                                                        <img src="{{ asset('assets/images/profile/user-2.jpg') }}"
                                                            alt="user" class="rounded-circle w-100 round" />
                                                        <span
                                                            class="profile-status bg-success position-absolute rounded-circle"></span>
                                                    </span>
                                                    <div class="w-75">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Mathew Anderson</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:30
                                                                AM</span>
                                                        </div>
                                                        <span class="d-block text-truncate text-truncate">Just see the
                                                            my new admin!</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span class="user-img position-relative d-inline-block">
                                                        <img src="{{ asset('assets/images/profile/user-3.jpg') }}"
                                                            alt="user" class="rounded-circle w-100 round" />
                                                        <span
                                                            class="profile-status bg-success position-absolute rounded-circle"></span>
                                                    </span>
                                                    <div class="w-75">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Bianca Anderson</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:10
                                                                AM</span>
                                                        </div>

                                                        <span class="d-block text-truncate text-truncate">Just a
                                                            reminder that you have event</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span class="user-img position-relative d-inline-block">
                                                        <img src="{{ asset('assets/images/profile/user-4.jpg') }}"
                                                            alt="user" class="rounded-circle w-100 round" />
                                                        <span
                                                            class="profile-status bg-success position-absolute rounded-circle"></span>
                                                    </span>
                                                    <div class="w-75">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Andrew Johnson</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:08
                                                                AM</span>
                                                        </div>
                                                        <span class="d-block text-truncate text-truncate">You can
                                                            customize this template as you
                                                            want</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span class="user-img position-relative d-inline-block">
                                                        <img src="{{ asset('assets/images/profile/user-5.jpg') }}"
                                                            alt="user" class="rounded-circle w-100 round" />
                                                        <span
                                                            class="profile-status bg-success position-absolute rounded-circle"></span>
                                                    </span>
                                                    <div class="w-75">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Mark Strokes</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:30
                                                                AM</span>
                                                        </div>
                                                        <span class="d-block text-truncate text-truncate">Just see the
                                                            my new admin!</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span class="user-img position-relative d-inline-block">
                                                        <img src="{{ asset('assets/images/profile/user-6.jpg') }}"
                                                            alt="user" class="rounded-circle w-100 round" />
                                                        <span
                                                            class="profile-status bg-success position-absolute rounded-circle"></span>
                                                    </span>
                                                    <div class="w-75">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Mark, Stoinus & Rishvi..</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:10
                                                                AM</span>
                                                        </div>
                                                        <span class="d-block text-truncate text-truncate">Just a
                                                            reminder that you have event</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span class="user-img position-relative d-inline-block">
                                                        <img src="{{ asset('assets/images/profile/user-7.jpg') }}"
                                                            alt="user" class="rounded-circle w-100 round" />
                                                        <span
                                                            class="profile-status bg-success position-absolute rounded-circle"></span>
                                                    </span>
                                                    <div class="w-75">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Settings</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:08
                                                                AM</span>
                                                        </div>
                                                        <span class="d-block text-truncate text-truncate">You can
                                                            customize this template as you
                                                            want</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div>
                                                <a class="d-flex align-items-center pt-3 pb-2 justify-content-center h6 mb-0"
                                                    href="javascript:void(0);">
                                                    <span>See all e-Mails</span>
                                                    <i data-feather="chevron-right" class="feather-sm"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- start profile Dropdown -->
                                    <!-- ------------------------------- -->

                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="javascript:void(0)" id="drop2"
                                            aria-expanded="false">
                                            <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="user"
                                                width="30" class="profile-pic rounded-circle" />
                                        </a>
                                        <div class="dropdown-menu message-box pt-0 content-dd mailbox dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop2">
                                            <div class="profile-dropdown position-relative" data-simplebar>
                                                <div class="py-3 px-7 pb-0">
                                                    <h5 class="mb-0 fs-5">User Profile</h5>
                                                </div>
                                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                                    <img src="{{ asset('assets/images/profile/user-1.jpg') }}"
                                                        class="rounded-circle" width="80" height="80"
                                                        alt="xtreme-img" />
                                                    <div class="ms-3">
                                                        <h5 class="mb-1 fs-4 text-secondary">
                                                            Steve Jobs
                                                        </h5>
                                                        <span class="mb-1 d-block text-secondary">Designer</span>
                                                        <p class="mb-0 d-flex align-items-center gap-2">
                                                            <i class="ti ti-mail fs-4"></i> info@xtreme.com
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="message-body">
                                                    <a href="../main/page-user-profile.html"
                                                        class="py-8 px-7 mt-8 d-flex align-items-center">
                                                        <span
                                                            class="d-flex align-items-center justify-content-center bg-primary-subtle rounded-circle round p-6 fs-6 text-primary">
                                                            <iconify-icon icon="solar:user-circle-line-duotone"
                                                                class="text-primary"></iconify-icon>
                                                        </span>
                                                        <div class="w-75 ps-3">
                                                            <h6 class="mb-1 fs-3 lh-base">My Profile</h6>
                                                            <span class="fs-3 d-block text-secondary">Account
                                                                Settings</span>
                                                        </div>
                                                    </a>
                                                    <a href="../main/app-email.html"
                                                        class="py-8 px-7 d-flex align-items-center">
                                                        <span
                                                            class="d-flex align-items-center justify-content-center bg-warning-subtle rounded-circle round p-6 fs-6 text-primary">
                                                            <iconify-icon icon="solar:inbox-line-line-duotone"
                                                                class="text-warning"></iconify-icon>
                                                        </span>
                                                        <div class="w-75 ps-3">
                                                            <h6 class="mb-1 fs-3 lh-base">My Inbox</h6>
                                                            <span class="fs-3 d-block text-secondary">Messages &
                                                                Emails</span>
                                                        </div>
                                                    </a>
                                                    <a href="../main/app-notes.html"
                                                        class="py-8 px-7 d-flex align-items-center">
                                                        <span
                                                            class="d-flex align-items-center justify-content-center bg-success-subtle rounded-circle round p-6 fs-6 text-primary">
                                                            <iconify-icon
                                                                icon="solar:checklist-minimalistic-line-duotone"
                                                                class="text-success"></iconify-icon>
                                                        </span>
                                                        <div class="w-75 ps-3">
                                                            <h6 class="mb-1 fs-3 lh-base">My Task</h6>
                                                            <span class="fs-3 d-block text-secondary">To-do and Daily
                                                                Tasks</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="d-grid py-4 px-7 pt-8">
                                                    <a href="../main/authentication-login.html"
                                                        class="btn btn-primary">Log Out</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- ------------------------------- -->
                                    <!-- end profile Dropdown -->
                                    <!-- ------------------------------- -->
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- ---------------------------------- -->
                    <!-- End Vertical Layout Header -->
                    <!-- ---------------------------------- -->

                    <!-- ------------------------------- -->
                    <!-- apps Dropdown in Small screen -->
                    <!-- ------------------------------- -->
                    <!--  Mobilenavbar -->
                    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar"
                        aria-labelledby="offcanvasWithBothOptionsLabel">
                        <nav class="sidebar-nav scroll-sidebar">
                            <div class="offcanvas-header justify-content-between">
                                <div class="brand-logo d-flex align-items-center justify-content-between">
                                    <a href="../main/index.html"
                                        class="text-nowrap logo-img d-flex align-items-center gap-6">
                                        <b class="logo-icon">
                                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                            <!-- Dark Logo icon -->
                                            <img src="{{ asset('assets/images/logos/logo-icon.svg') }}"
                                                alt="homepage" class="dark-logo" />
                                            <!-- Light Logo icon -->
                                            <img src="{{ asset('assets/images/logos/logo-light-icon.svg') }}"
                                                alt="homepage" class="light-logo" />
                                        </b>
                                        <!--End Logo icon -->
                                        <!-- Logo text -->
                                        <span class="logo-text">
                                            <!-- dark Logo text -->
                                            <img src="{{ asset('assets/images/logos/logo-text.svg') }}"
                                                alt="homepage" class="dark-logo" />
                                            <!-- Light Logo text -->
                                            <img src="{{ asset('assets/images/logos/logo-light-text.svg') }}"
                                                class="light-logo" alt="homepage" />
                                        </span>
                                    </a>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body h-n80" data-simplebar="" data-simplebar>
                                <ul id="sidebarnav">
                                    <li class="sidebar-item">
                                        <a class="sidebar-link has-arrow ms-0" href="javascript:void(0)"
                                            aria-expanded="false">
                                            <span>
                                                <iconify-icon icon="solar:shield-plus-outline"
                                                    class="iconify-sm"></iconify-icon>
                                            </span>
                                            <span class="hide-menu">Apps</span>
                                        </a>
                                        <ul aria-expanded="false" class="collapse first-level my-3">
                                            <li class="sidebar-item py-2">
                                                <a href="../main/app-chat.html" class="d-flex align-items-center">
                                                    <div
                                                        class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{ asset('assets/images/svgs/icon-dd-chat.svg') }}"
                                                            alt="xtreme-img" class="img-fluid" width="24"
                                                            height="24" />
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 bg-hover-primary">
                                                            Chat Application
                                                        </h6>
                                                        <span class="fs-3 d-block text-secondary">New messages
                                                            arrived</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="sidebar-item py-2">
                                                <a href="../main/app-invoice.html" class="d-flex align-items-center">
                                                    <div
                                                        class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{ asset('assets/images/svgs/icon-dd-invoice.svg') }}"
                                                            alt="xtreme-img" class="img-fluid" width="24"
                                                            height="24" />
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 bg-hover-primary">Invoice App</h6>
                                                        <span class="fs-3 d-block text-secondary">Get latest
                                                            invoice</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="sidebar-item py-2">
                                                <a href="../main/app-contact.html" class="d-flex align-items-center">
                                                    <div
                                                        class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{ asset('assets/images/svgs/icon-dd-mobile.svg') }}"
                                                            alt="xtreme-img" class="img-fluid" width="24"
                                                            height="24" />
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 bg-hover-primary">
                                                            Contact Application
                                                        </h6>
                                                        <span class="fs-3 d-block text-secondary">2 Unsaved
                                                            Contacts</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="sidebar-item py-2">
                                                <a href="../main/app-email.html" class="d-flex align-items-center">
                                                    <div
                                                        class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{ asset('assets/images/svgs/icon-dd-message-box.svg') }}"
                                                            alt="xtreme-img" class="img-fluid" width="24"
                                                            height="24" />
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 bg-hover-primary">Email App</h6>
                                                        <span class="fs-3 d-block text-secondary">Get new
                                                            emails</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="sidebar-item py-2">
                                                <a href="../main/page-user-profile.html"
                                                    class="d-flex align-items-center">
                                                    <div
                                                        class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{ asset('assets/images/svgs/icon-dd-cart.svg') }}"
                                                            alt="xtreme-img" class="img-fluid" width="24"
                                                            height="24" />
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 bg-hover-primary">
                                                            User Profile
                                                        </h6>
                                                        <span class="fs-3 d-block text-secondary">learn more
                                                            information</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="sidebar-item py-2">
                                                <a href="../main/app-calendar.html"
                                                    class="d-flex align-items-center">
                                                    <div
                                                        class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{ asset('assets/images/svgs/icon-dd-date.svg') }}"
                                                            alt="xtreme-img" class="img-fluid" width="24"
                                                            height="24" />
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 bg-hover-primary">
                                                            Calendar App
                                                        </h6>
                                                        <span class="fs-3 d-block text-secondary">Get dates</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="sidebar-item py-2">
                                                <a href="../main/app-contact2.html"
                                                    class="d-flex align-items-center">
                                                    <div
                                                        class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{ asset('assets/images/svgs/icon-dd-lifebuoy.svg') }}"
                                                            alt="xtreme-img" class="img-fluid" width="24"
                                                            height="24" />
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 bg-hover-primary">
                                                            Contact List Table
                                                        </h6>
                                                        <span class="fs-3 d-block text-secondary">Add new
                                                            contact</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="sidebar-item py-2">
                                                <a href="../main/app-notes.html" class="d-flex align-items-center">
                                                    <div
                                                        class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{ asset('assets/images/svgs/icon-dd-application.svg') }}"
                                                            alt="xtreme-img" class="img-fluid" width="24"
                                                            height="24" />
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 bg-hover-primary">
                                                            Notes Application
                                                        </h6>
                                                        <span class="fs-3 d-block text-secondary">To-do and Daily
                                                            tasks</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <ul class="px-8 mt-7 mb-4">
                                                <li class="sidebar-item mb-3">
                                                    <h5 class="fs-5 fw-semibold">Quick Links</h5>
                                                </li>
                                                <li class="mb-3">
                                                    <a class="fw-semibold bg-hover-primary"
                                                        href="../main/page-pricing.html">Pricing Page</a>
                                                </li>
                                                <li class="mb-3">
                                                    <a class="fw-semibold bg-hover-primary"
                                                        href="../main/authentication-login.html">Authentication
                                                        Design</a>
                                                </li>
                                                <li class="mb-3">
                                                    <a class="fw-semibold bg-hover-primary"
                                                        href="../main/authentication-register.html">Register Now</a>
                                                </li>
                                                <li class="mb-3">
                                                    <a class="fw-semibold bg-hover-primary"
                                                        href="../main/authentication-error.html">404 Error Page</a>
                                                </li>
                                                <li class="mb-3">
                                                    <a class="fw-semibold bg-hover-primary"
                                                        href="../main/app-notes.html">Notes App</a>
                                                </li>
                                                <li class="mb-3">
                                                    <a class="fw-semibold bg-hover-primary"
                                                        href="../main/page-user-profile.html">User Application</a>
                                                </li>
                                                <li class="mb-3">
                                                    <a class="fw-semibold bg-hover-primary"
                                                        href="../main/page-account-settings.html">Account Settings</a>
                                                </li>
                                            </ul>
                                        </ul>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link ms-0" href="../main/app-chat.html"
                                            aria-expanded="false">
                                            <span>
                                                <iconify-icon icon="solar:chat-unread-outline"
                                                    class="iconify-sm"></iconify-icon>
                                            </span>
                                            <span class="hide-menu">Chat</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link ms-0" href="../main/app-calendar.html"
                                            aria-expanded="false">
                                            <span>
                                                <iconify-icon icon="solar:calendar-minimalistic-outline"
                                                    class="iconify-sm"></iconify-icon>
                                            </span>
                                            <span class="hide-menu">Calendar</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link ms-0" href="../main/app-email.html"
                                            aria-expanded="false">
                                            <span>
                                                <iconify-icon icon="solar:inbox-unread-outline"
                                                    class="iconify-sm"></iconify-icon>
                                            </span>
                                            <span class="hide-menu">Email</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="app-header with-horizontal">
                    <nav class="navbar navbar-expand-xl container-fluid p-0">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item d-block d-xl-none">
                                <a class="nav-link sidebartoggler ms-n3" id="sidebarCollapse"
                                    href="javascript:void(0)">
                                    <i class="ti ti-menu-2"></i>
                                </a>
                            </li>
                            <li class="nav-item d-none d-xl-block">
                                <div class="brand-logo d-flex align-items-center justify-content-between">
                                    <a href="../main/index.html" class="text-nowrap logo-img">
                                        <b class="">
                                            <img src="{{ asset('assets/images/logos/logo-light-icon.svg') }}"
                                                alt="homepage" class="" />
                                        </b>
                                        <!--End Logo icon -->
                                        <!-- Logo text -->
                                        <span class="">
                                            <img src="{{ asset('assets/images/logos/logo-light-text.svg') }}"
                                                class="ps-2" alt="homepage" />
                                        </span>
                                    </a>
                                </div>
                            </li>

                            <li class="nav-item d-none d-lg-flex search-box nav-icon-hover-bg rounded-circle">
                                <a class="nav-link d-none d-md-flex" href="javascript:void(0)"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <iconify-icon icon="solar:magnifer-linear"></iconify-icon>
                                </a>
                            </li>

                            <li class="nav-item dropdown mega-dropdown d-none d-lg-block">
                                <a class="nav-link" id="drop2" href="javascript:void(0)"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Mega
                                    <iconify-icon icon="solar:alt-arrow-down-outline"
                                        class="ps-1 fs-4"></iconify-icon>
                                </a>
                                <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop2">
                                    <div class="mega-dropdown-menu row">
                                        <div class="col-lg-3 col-xl-2 mb-4">
                                            <h4 class="mb-3 fs-5">Carousel</h4>
                                            <!-- CAROUSEL -->
                                            <div id="carouselExampleControls" class="carousel slide carousel-dark"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block img-fluid"
                                                            src="{{ asset('assets/images/blog/blog-img1.jpg') }}"
                                                            alt="First slide" />
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block img-fluid"
                                                            src="{{ asset('assets/images/blog/blog-img2.jpg') }}"
                                                            alt="Second slide" />
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block img-fluid"
                                                            src="{{ asset('assets/images/blog/blog-img3.jpg') }}"
                                                            alt="Third slide" />
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleControls"
                                                    role="button" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon"
                                                        aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleControls"
                                                    role="button" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon"
                                                        aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </a>
                                            </div>
                                            <!-- End CAROUSEL -->
                                        </div>
                                        <div class="col-lg-3 mb-4">
                                            <h4 class="mb-3 fs-5">Accordion</h4>
                                            <!-- Accordian -->
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-headingOne">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapseOne"
                                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                                            Accordion Item #1
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                        aria-labelledby="flush-headingOne"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod
                                                            high life accusamus terry richardson ad squid.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-headingTwo">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapseTwo"
                                                            aria-expanded="false" aria-controls="flush-collapseTwo">
                                                            Accordion Item #2
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                                        aria-labelledby="flush-headingTwo"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod
                                                            high life accusamus terry richardson ad squid.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-headingThree">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapseThree"
                                                            aria-expanded="false"
                                                            aria-controls="flush-collapseThree">
                                                            Accordion Item #3
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseThree"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="flush-headingThree"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod
                                                            high life accusamus terry richardson ad squid.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-4">
                                            <h4 class="mb-3 fs-5">Contact Us</h4>
                                            <!-- Contact -->
                                            <form>
                                                <div class="mb-3 form-floating">
                                                    <input type="text" class="form-control"
                                                        id="exampleInputname1" placeholder="Enter Name" />
                                                    <label>Enter Name</label>
                                                </div>
                                                <div class="mb-3 form-floating">
                                                    <input type="email" class="form-control"
                                                        placeholder="Enter email" />
                                                    <label>Enter Email address</label>
                                                </div>
                                                <div class="mb-3 form-floating">
                                                    <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                                    <label>Enter Message</label>
                                                </div>
                                                <button type="submit" class="btn px-4 rounded-pill btn-primary">
                                                    Submit
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-lg-3 col-xlg-4 mb-4">
                                            <h4 class="mb-3 fs-5">List style</h4>
                                            <ol class="list-group list-group-numbered px-0">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <h6 class="fw-semibold mb-0">Subheading</h6>
                                                        <div class="d-block text-muted text-truncate text-truncate">
                                                            Content for list item
                                                        </div>
                                                    </div>
                                                    <span class="badge bg-primary rounded-pill">14</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <h6 class="fw-semibold mb-0">Subheading</h6>
                                                        <div class="d-block text-muted text-truncate text-truncate">
                                                            Content for list item
                                                        </div>
                                                    </div>
                                                    <span class="badge bg-primary rounded-pill">14</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <h6 class="fw-semibold mb-0">Subheading</h6>
                                                        <div class="d-block text-muted text-truncate text-truncate">
                                                            Content for list item
                                                        </div>
                                                    </div>
                                                    <span class="badge bg-primary rounded-pill">14</span>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item dropdown hover-dd d-none d-lg-block">
                                <a class="nav-link" id="drop2" href="javascript:void(0)"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Apps
                                    <iconify-icon icon="solar:alt-arrow-down-outline"
                                        class="ps-1 fs-4"></iconify-icon>
                                </a>
                                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="ps-7 pt-7">
                                                <div class="border-bottom">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="position-relative">
                                                                <a href="../main/app-chat.html"
                                                                    class="d-flex align-items-center pb-9 position-relative">
                                                                    <div
                                                                        class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="{{ asset('assets/images/svgs/icon-dd-chat.svg') }}"
                                                                            alt="xtreme-img" class="img-fluid"
                                                                            width="24" height="24" />
                                                                    </div>
                                                                    <div>
                                                                        <h6 class="mb-1 fw-semibold fs-3">
                                                                            Chat Application
                                                                        </h6>
                                                                        <span
                                                                            class="fs-2 d-block text-body-secondary">New
                                                                            messages arrived</span>
                                                                    </div>
                                                                </a>
                                                                <a href="../main/app-invoice.html"
                                                                    class="d-flex align-items-center pb-9 position-relative">
                                                                    <div
                                                                        class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="{{ asset('assets/images/svgs/icon-dd-invoice.svg') }}"
                                                                            alt="xtreme-img" class="img-fluid"
                                                                            width="24" height="24" />
                                                                    </div>
                                                                    <div>
                                                                        <h6 class="mb-1 fw-semibold fs-3">
                                                                            Invoice App
                                                                        </h6>
                                                                        <span
                                                                            class="fs-2 d-block text-body-secondary">Get
                                                                            latest invoice</span>
                                                                    </div>
                                                                </a>
                                                                <a href="../main/app-contact2.html"
                                                                    class="d-flex align-items-center pb-9 position-relative">
                                                                    <div
                                                                        class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="{{ asset('assets/images/svgs/icon-dd-mobile.svg') }}"
                                                                            alt="xtreme-img" class="img-fluid"
                                                                            width="24" height="24" />
                                                                    </div>
                                                                    <div>
                                                                        <h6 class="mb-1 fw-semibold fs-3">
                                                                            Contact Application
                                                                        </h6>
                                                                        <span
                                                                            class="fs-2 d-block text-body-secondary">2
                                                                            Unsaved Contacts</span>
                                                                    </div>
                                                                </a>
                                                                <a href="../main/app-email.html"
                                                                    class="d-flex align-items-center pb-9 position-relative">
                                                                    <div
                                                                        class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="{{ asset('assets/images/svgs/icon-dd-message-box.svg') }}"
                                                                            alt="xtreme-img" class="img-fluid"
                                                                            width="24" height="24" />
                                                                    </div>
                                                                    <div>
                                                                        <h6 class="mb-1 fw-semibold fs-3">
                                                                            Email App
                                                                        </h6>
                                                                        <span
                                                                            class="fs-2 d-block text-body-secondary">Get
                                                                            new emails</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="position-relative">
                                                                <a href="../main/page-user-profile.html"
                                                                    class="d-flex align-items-center pb-9 position-relative">
                                                                    <div
                                                                        class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="{{ asset('assets/images/svgs/icon-dd-cart.svg') }}"
                                                                            alt="xtreme-img" class="img-fluid"
                                                                            width="24" height="24" />
                                                                    </div>
                                                                    <div>
                                                                        <h6 class="mb-1 fw-semibold fs-3">
                                                                            User Profile
                                                                        </h6>
                                                                        <span
                                                                            class="fs-2 d-block text-body-secondary">learn
                                                                            more information</span>
                                                                    </div>
                                                                </a>
                                                                <a href="../main/app-calendar.html"
                                                                    class="d-flex align-items-center pb-9 position-relative">
                                                                    <div
                                                                        class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="{{ asset('assets/images/svgs/icon-dd-date.svg') }}"
                                                                            alt="xtreme-img" class="img-fluid"
                                                                            width="24" height="24" />
                                                                    </div>
                                                                    <div>
                                                                        <h6 class="mb-1 fw-semibold fs-3">
                                                                            Calendar App
                                                                        </h6>
                                                                        <span
                                                                            class="fs-2 d-block text-body-secondary">Get
                                                                            dates</span>
                                                                    </div>
                                                                </a>
                                                                <a href="../main/app-contact.html"
                                                                    class="d-flex align-items-center pb-9 position-relative">
                                                                    <div
                                                                        class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="{{ asset('assets/images/svgs/icon-dd-lifebuoy.svg') }}"
                                                                            alt="xtreme-img" class="img-fluid"
                                                                            width="24" height="24" />
                                                                    </div>
                                                                    <div>
                                                                        <h6 class="mb-1 fw-semibold fs-3">
                                                                            Contact List Table
                                                                        </h6>
                                                                        <span
                                                                            class="fs-2 d-block text-body-secondary">Add
                                                                            new contact</span>
                                                                    </div>
                                                                </a>
                                                                <a href="../main/app-notes.html"
                                                                    class="d-flex align-items-center pb-9 position-relative">
                                                                    <div
                                                                        class="bg-primary-subtle rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="{{ asset('assets/images/svgs/icon-dd-application.svg') }}"
                                                                            alt="xtreme-img" class="img-fluid"
                                                                            width="24" height="24" />
                                                                    </div>
                                                                    <div>
                                                                        <h6 class="mb-1 fw-semibold fs-3">
                                                                            Notes Application
                                                                        </h6>
                                                                        <span
                                                                            class="fs-2 d-block text-body-secondary">To-do
                                                                            and Daily tasks</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center py-3">
                                                    <div class="col-8">
                                                        <a class="fw-semibold d-flex align-items-center lh-1"
                                                            href="javascript:void(0)">
                                                            <i class="ti ti-help fs-6 me-2"></i>Frequently
                                                            Asked Questions
                                                        </a>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="d-flex justify-content-end pe-4">
                                                            <button class="btn btn-primary">Check</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 ms-n4">
                                            <div class="position-relative p-7 border-start h-100">
                                                <h5 class="fs-5 mb-9 fw-semibold">Quick Links</h5>
                                                <ul class="">
                                                    <li class="mb-3">
                                                        <a class="fw-semibold bg-hover-primary"
                                                            href="../main/page-pricing.html">Pricing Page</a>
                                                    </li>
                                                    <li class="mb-3">
                                                        <a class="fw-semibold bg-hover-primary"
                                                            href="../main/authentication-login.html">Authentication
                                                            Design</a>
                                                    </li>
                                                    <li class="mb-3">
                                                        <a class="fw-semibold bg-hover-primary"
                                                            href="../main/authentication-register.html">Register
                                                            Now</a>
                                                    </li>
                                                    <li class="mb-3">
                                                        <a class="fw-semibold bg-hover-primary"
                                                            href="../main/authentication-error.html">404 Error
                                                            Page</a>
                                                    </li>
                                                    <li class="mb-3">
                                                        <a class="fw-semibold bg-hover-primary"
                                                            href="../main/app-notes.html">Notes App</a>
                                                    </li>
                                                    <li class="mb-3">
                                                        <a class="fw-semibold bg-hover-primary"
                                                            href="../main/page-user-profile.html">User Application</a>
                                                    </li>
                                                    <li class="mb-3">
                                                        <a class="fw-semibold bg-hover-primary"
                                                            href="../main/page-account-settings.html">Account
                                                            Settings</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown hover-dd d-none d-lg-block">
                                <a class="nav-link" href="../main/app-chat.html"> Chat </a>
                            </li>
                            <li class="nav-item dropdown hover-dd d-none d-lg-block">
                                <a class="nav-link" href="../main/app-calendar.html">
                                    Calendar
                                </a>
                            </li>
                            <li class="nav-item dropdown hover-dd d-none d-lg-block">
                                <a class="nav-link" href="../main/app-email.html"> Email </a>
                            </li>
                        </ul>

                        <a class="navbar-toggler p-0 border-0 nav-icon-hover-bg rounded-circle"
                            href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="p-2">
                                <iconify-icon icon="solar:menu-dots-bold" class="fs-7"></iconify-icon>
                            </span>
                        </a>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
                                <a href="javascript:void(0)"
                                    class="nav-link round p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center"
                                    type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                                    aria-controls="offcanvasWithBothOptions">
                                    <i class="ti ti-align-justified fs-7"></i>
                                </a>
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                                    <li class="nav-item nav-icon-hover-bg rounded-circle">
                                        <a class="nav-link moon dark-layout" href="javascript:void(0)">
                                            <iconify-icon icon="solar:moon-line-duotone"
                                                class="moon"></iconify-icon>
                                        </a>
                                        <a class="nav-link sun light-layout" href="javascript:void(0)">
                                            <iconify-icon icon="solar:sun-2-line-duotone"
                                                class="sun"></iconify-icon>
                                        </a>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- start language Dropdown -->
                                    <!-- ------------------------------- -->
                                    <li class="nav-item dropdown nav-icon-hover-bg rounded-circle">
                                        <a class="nav-link" href="javascript:void(0)" id="drop2"
                                            aria-expanded="false">
                                            <img src="{{ asset('assets/images/svgs/icon-flag-en.svg') }}"
                                                alt="xtreme-img" width="22px" height="22px" />
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop2">
                                            <div class="message-body">
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-3 py-2 px-4 dropdown-item">
                                                    <div class="position-relative">
                                                        <img src="{{ asset('assets/images/svgs/icon-flag-en.svg') }}"
                                                            alt="xtreme-img" width="20px" height="20px"
                                                            class="round-20" />
                                                    </div>
                                                    <p class="mb-0">English</p>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-3 py-2 px-4 dropdown-item">
                                                    <div class="position-relative">
                                                        <img src="{{ asset('assets/images/svgs/icon-flag-cn.svg') }}"
                                                            alt="xtreme-img" width="20px" height="20px"
                                                            class="round-20" />
                                                    </div>
                                                    <p class="mb-0">Chinese</p>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-3 py-2 px-4 dropdown-item">
                                                    <div class="position-relative">
                                                        <img src="{{ asset('assets/images/svgs/icon-flag-fr.svg') }}"
                                                            alt="xtreme-img" width="20px" height="20px"
                                                            class="round-20" />
                                                    </div>
                                                    <p class="mb-0">French</p>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-3 py-2 px-4 dropdown-item">
                                                    <div class="position-relative">
                                                        <img src="{{ asset('assets/images/svgs/icon-flag-sa.svg') }}"
                                                            alt="xtreme-img" width="20px" height="20px"
                                                            class="round-20" />
                                                    </div>
                                                    <p class="mb-0">Arabic</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- end language Dropdown -->
                                    <!-- ------------------------------- -->
                                    <!-- ------------------------------- -->
                                    <!-- start notification Dropdown -->
                                    <!-- ------------------------------- -->
                                    <li class="nav-item dropdown nav-icon-hover-bg rounded-circle">
                                        <a class="nav-link" href="javascript:void(0)" id="drop2"
                                            aria-expanded="false">
                                            <iconify-icon icon="solar:bell-outline"></iconify-icon>
                                            <div class="notify">
                                                <span class="heartbit"></span>
                                                <span class="point"></span>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu pt-0 content-dd mailbox dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop2">
                                            <div
                                                class="d-flex border-bottom align-items-center justify-content-between py-3 px-4">
                                                <div class="mb-0 fs-4 fw-medium h6">
                                                    Notifications
                                                </div>
                                            </div>
                                            <div class="message-body" data-simplebar>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span
                                                        class="flex-shrink-0 bg-danger-subtle rounded-circle round d-flex align-items-center justify-content-center fs-6 text-danger">
                                                        <iconify-icon
                                                            icon="solar:widget-3-line-duotone"></iconify-icon>
                                                    </span>
                                                    <div class="w-75">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Luanch Admin</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:30
                                                                AM</span>
                                                        </div>
                                                        <span class="d-block text-truncate text-truncate">Just see the
                                                            my new admin!</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span
                                                        class="flex-shrink-0 bg-success-subtle rounded-circle round d-flex align-items-center justify-content-center fs-6 text-success">
                                                        <iconify-icon
                                                            icon="solar:calendar-mark-line-duotone"></iconify-icon>
                                                    </span>
                                                    <div class="w-75">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Event today</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:10
                                                                AM</span>
                                                        </div>

                                                        <span class="d-block text-truncate text-truncate">Just a
                                                            reminder that you have event</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span
                                                        class="flex-shrink-0 bg-primary-subtle rounded-circle round d-flex align-items-center justify-content-center fs-6 text-primary">
                                                        <iconify-icon
                                                            icon="solar:settings-minimalistic-line-duotone"></iconify-icon>
                                                    </span>
                                                    <div class="w-75">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Settings</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:08
                                                                AM</span>
                                                        </div>
                                                        <span class="d-block text-truncate text-truncate">You can
                                                            customize this template as you
                                                            want</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span
                                                        class="flex-shrink-0 bg-warning-subtle rounded-circle round d-flex align-items-center justify-content-center fs-6 text-warning">
                                                        <iconify-icon
                                                            icon="solar:link-circle-line-duotone"></iconify-icon>
                                                    </span>
                                                    <div class="w-75">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Luanch Admin</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:30
                                                                AM</span>
                                                        </div>
                                                        <span class="d-block text-truncate text-truncate">Just see the
                                                            my new admin!</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span
                                                        class="flex-shrink-0 bg-success-subtle rounded-circle round d-flex align-items-center justify-content-center">
                                                        <i data-feather="calendar"
                                                            class="feather-sm fill-white text-success"></i>
                                                    </span>
                                                    <div class="w-75">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Event today</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:10
                                                                AM</span>
                                                        </div>
                                                        <span class="d-block text-truncate text-truncate">Just a
                                                            reminder that you have event</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span
                                                        class="flex-shrink-0 bg-primary-subtle rounded-circle round d-flex align-items-center justify-content-center">
                                                        <i data-feather="settings"
                                                            class="feather-sm fill-white text-primary"></i>
                                                    </span>
                                                    <div class="w-75">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Settings</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:08
                                                                AM</span>
                                                        </div>
                                                        <span class="d-block text-truncate text-truncate">You can
                                                            customize this template as you
                                                            want</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div>
                                                <a class="d-flex align-items-center pt-3 pb-2 justify-content-center h6 mb-0"
                                                    href="javascript:void(0);">
                                                    <span class="">Check all notifications</span>
                                                    <i data-feather="chevron-right" class="feather-sm"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown nav-icon-hover-bg rounded-circle">
                                        <a class="nav-link" href="javascript:void(0)" id="drop2"
                                            aria-expanded="false">
                                            <iconify-icon icon="solar:chat-line-outline"></iconify-icon>
                                            <div class="notify">
                                                <span class="heartbit"></span>
                                                <span class="point"></span>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu message-box pt-0 content-dd mailbox dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop2">
                                            <div
                                                class="d-flex border-bottom align-items-center justify-content-between py-3 px-4">
                                                <h5 class="mb-0 fs-4 fw-medium h6">
                                                    You have 4 new messages
                                                </h5>
                                            </div>
                                            <div class="message-body" data-simplebar>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span class="user-img position-relative d-inline-block">
                                                        <img src="{{ asset('assets/images/profile/user-2.jpg') }}"
                                                            alt="user" class="rounded-circle w-100 round" />
                                                        <span
                                                            class="profile-status bg-success position-absolute rounded-circle"></span>
                                                    </span>
                                                    <div class="w-75">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Mathew Anderson</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:30
                                                                AM</span>
                                                        </div>
                                                        <span class="d-block text-truncate text-truncate">Just see the
                                                            my new admin!</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span class="user-img position-relative d-inline-block">
                                                        <img src="{{ asset('assets/images/profile/user-3.jpg') }}"
                                                            alt="user" class="rounded-circle w-100 round" />
                                                        <span
                                                            class="profile-status bg-success position-absolute rounded-circle"></span>
                                                    </span>
                                                    <div class="w-75">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Bianca Anderson</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:10
                                                                AM</span>
                                                        </div>

                                                        <span class="d-block text-truncate text-truncate">Just a
                                                            reminder that you have event</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span class="user-img position-relative d-inline-block">
                                                        <img src="{{ asset('assets/images/profile/user-4.jpg') }}"
                                                            alt="user" class="rounded-circle w-100 round" />
                                                        <span
                                                            class="profile-status bg-success position-absolute rounded-circle"></span>
                                                    </span>
                                                    <div class="w-75">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Andrew Johnson</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:08
                                                                AM</span>
                                                        </div>
                                                        <span class="d-block text-truncate text-truncate">You can
                                                            customize this template as you
                                                            want</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span class="user-img position-relative d-inline-block">
                                                        <img src="{{ asset('assets/images/profile/user-5.jpg') }}"
                                                            alt="user" class="rounded-circle w-100 round" />
                                                        <span
                                                            class="profile-status bg-success position-absolute rounded-circle"></span>
                                                    </span>
                                                    <div class="w-75">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Mark Strokes</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:30
                                                                AM</span>
                                                        </div>
                                                        <span class="d-block text-truncate text-truncate">Just see the
                                                            my new admin!</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span class="user-img position-relative d-inline-block">
                                                        <img src="{{ asset('assets/images/profile/user-6.jpg') }}"
                                                            alt="user" class="rounded-circle w-100 round" />
                                                        <span
                                                            class="profile-status bg-success position-absolute rounded-circle"></span>
                                                    </span>
                                                    <div class="w-75">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Mark, Stoinus & Rishvi..</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:10
                                                                AM</span>
                                                        </div>
                                                        <span class="d-block text-truncate text-truncate">Just a
                                                            reminder that you have event</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="p-3 pe-0 d-flex align-items-center dropdown-item gap-3 border-bottom">
                                                    <span class="user-img position-relative d-inline-block">
                                                        <img src="{{ asset('assets/images/profile/user-7.jpg') }}"
                                                            alt="user" class="rounded-circle w-100 round" />
                                                        <span
                                                            class="profile-status bg-success position-absolute rounded-circle"></span>
                                                    </span>
                                                    <div class="w-75">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Settings</h6>
                                                            <span class="fs-2 text-nowrap d-block text-muted">9:08
                                                                AM</span>
                                                        </div>
                                                        <span class="d-block text-truncate text-truncate">You can
                                                            customize this template as you
                                                            want</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div>
                                                <a class="d-flex align-items-center pt-3 pb-2 justify-content-center h6 mb-0"
                                                    href="javascript:void(0);">
                                                    <span>See all e-Mails</span>
                                                    <i data-feather="chevron-right" class="feather-sm"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- start profile Dropdown -->
                                    <!-- ------------------------------- -->

                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="javascript:void(0)" id="drop2"
                                            aria-expanded="false">
                                            <img src="{{ asset('assets/images/profile/user-6.jpg') }}"
                                                alt="user" width="30"
                                                class="profile-pic rounded-circle" />
                                        </a>
                                        <div class="dropdown-menu message-box pt-0 content-dd mailbox dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop2">
                                            <div class="profile-dropdown position-relative" data-simplebar>
                                                <div class="py-3 px-7 pb-0">
                                                    <h5 class="mb-0 fs-5">User Profile</h5>
                                                </div>
                                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                                    <img src="{{ asset('assets/images/profile/user-1.jpg') }}"
                                                        class="rounded-circle" width="80" height="80"
                                                        alt="xtreme-img" />
                                                    <div class="ms-3">
                                                        <h5 class="mb-1 fs-4 text-secondary">
                                                            Steve Jobs
                                                        </h5>
                                                        <span class="mb-1 d-block text-secondary">Designer</span>
                                                        <p class="mb-0 d-flex align-items-center gap-2">
                                                            <i class="ti ti-mail fs-4"></i> info@xtreme.com
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="message-body">
                                                    <a href="../main/page-user-profile.html"
                                                        class="py-8 px-7 mt-8 d-flex align-items-center">
                                                        <span
                                                            class="d-flex align-items-center justify-content-center bg-primary-subtle rounded-circle round p-6 fs-6 text-primary">
                                                            <iconify-icon icon="solar:user-circle-line-duotone"
                                                                class="text-primary"></iconify-icon>
                                                        </span>
                                                        <div class="w-75 ps-3">
                                                            <h6 class="mb-1 fs-3 lh-base">My Profile</h6>
                                                            <span class="fs-3 d-block text-secondary">Account
                                                                Settings</span>
                                                        </div>
                                                    </a>
                                                    <a href="../main/app-email.html"
                                                        class="py-8 px-7 d-flex align-items-center">
                                                        <span
                                                            class="d-flex align-items-center justify-content-center bg-warning-subtle rounded-circle round p-6 fs-6 text-primary">
                                                            <iconify-icon icon="solar:inbox-line-line-duotone"
                                                                class="text-warning"></iconify-icon>
                                                        </span>
                                                        <div class="w-75 ps-3">
                                                            <h6 class="mb-1 fs-3 lh-base">My Inbox</h6>
                                                            <span class="fs-3 d-block text-secondary">Messages &
                                                                Emails</span>
                                                        </div>
                                                    </a>
                                                    <a href="../main/app-notes.html"
                                                        class="py-8 px-7 d-flex align-items-center">
                                                        <span
                                                            class="d-flex align-items-center justify-content-center bg-success-subtle rounded-circle round p-6 fs-6 text-primary">
                                                            <iconify-icon
                                                                icon="solar:checklist-minimalistic-line-duotone"
                                                                class="text-success"></iconify-icon>
                                                        </span>
                                                        <div class="w-75 ps-3">
                                                            <h6 class="mb-1 fs-3 lh-base">My Task</h6>
                                                            <span class="fs-3 d-block text-secondary">To-do and Daily
                                                                Tasks</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="d-grid py-4 px-7 pt-8">
                                                    <a href="../main/authentication-login.html"
                                                        class="btn btn-primary">Log Out</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>
            <!--  Header End -->
            <!-- Sidebar scroll-->
            <aside class="left-sidebar with-horizontal">
                <div>
                    <!-- Sidebar navigation-->
                    <nav id="sidebarnavh" class="sidebar-nav scroll-sidebar container-fluid">
                        <ul id="sidebarnav">
                            <!-- =================== -->
                            <!-- Dashboard -->
                            <!-- =================== -->
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow" href="{{ route('admin.dashboard') }}"
                                    aria-expanded="false">
                                    <span class="d-flex">
                                        <iconify-icon icon="solar:screencast-2-outline"
                                            class="fs-6"></iconify-icon>
                                    </span>
                                    <span class="hide-menu">Dashboard</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">


                                </ul>
                            </li>









                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
            </aside>

            <div class="body-wrapper">
                @yield('content') <!-- This is a placeholder for page content -->

            </div>
            <script>
                function handleColorTheme(e) {
                    document.documentElement.setAttribute("data-color-theme", e);
                }
            </script>
            <button
                class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn"
                type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample">
                <i class="icon ti ti-settings fs-7 text-white"></i>
            </button>

            <div class="offcanvas customizer offcanvas-end" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                    <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">
                        Settings
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body h-n80" data-simplebar>
                    <h6 class="fw-semibold fs-4 mb-2">Theme</h6>

                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <input type="radio" class="btn-check light-layout" name="theme-layout"
                            id="light-layout" autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="light-layout">
                            <iconify-icon icon="solar:sun-2-outline"
                                class="icon fs-7 me-2"></iconify-icon>Light</label>
                        <input type="radio" class="btn-check dark-layout" name="theme-layout" id="dark-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="dark-layout"><iconify-icon
                                icon="solar:moon-outline" class="icon fs-7 me-2"></iconify-icon>Dark</label>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Direction</h6>
                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <input type="radio" class="btn-check" name="direction-l" id="ltr-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="ltr-layout"><iconify-icon
                                icon="solar:align-left-linear" class="icon fs-7 me-2"></iconify-icon>LTR</label>

                        <input type="radio" class="btn-check" name="direction-l" id="rtl-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="rtl-layout">
                            <iconify-icon icon="solar:align-right-linear" class="icon fs-7 me-2"></iconify-icon>RTL
                        </label>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Colors</h6>

                    <div class="d-flex flex-row flex-wrap gap-3 customizer-box color-pallete" role="group">
                        <input type="radio" class="btn-check" name="color-theme-layout" id="Blue_Theme"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Blue_Theme')" for="Blue_Theme" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="BLUE_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-1">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="color-theme-layout" id="Aqua_Theme"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Aqua_Theme')" for="Aqua_Theme" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="AQUA_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-2">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="color-theme-layout" id="Purple_Theme"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Purple_Theme')" for="Purple_Theme" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="PURPLE_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-3">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="color-theme-layout"
                            id="green-theme-layout" autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Green_Theme')" for="green-theme-layout"
                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="GREEN_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-4">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="color-theme-layout" id="cyan-theme-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Cyan_Theme')" for="cyan-theme-layout"
                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="CYAN_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-5">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="color-theme-layout"
                            id="orange-theme-layout" autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Orange_Theme')" for="orange-theme-layout"
                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="ORANGE_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-6">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Layout Type</h6>
                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <div>
                            <input type="radio" class="btn-check" name="page-layout" id="vertical-layout"
                                autocomplete="off" />
                            <label class="btn p-9 btn-outline-primary" for="vertical-layout">
                                <iconify-icon icon="solar:slider-vertical-minimalistic-linear"
                                    class="icon fs-7 me-2"></iconify-icon>Vertical
                            </label>
                        </div>
                        <div>
                            <input type="radio" class="btn-check" name="page-layout" id="horizontal-layout"
                                autocomplete="off" />
                            <label class="btn p-9 btn-outline-primary" for="horizontal-layout">
                                <iconify-icon icon="solar:slider-minimalistic-horizontal-outline"
                                    class="icon fs-7 me-2"></iconify-icon>
                                Horizontal
                            </label>
                        </div>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Container Option</h6>

                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <input type="radio" class="btn-check" name="layout" id="boxed-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="boxed-layout">
                            <iconify-icon icon="solar:cardholder-linear" class="icon fs-7 me-2"></iconify-icon>
                            Boxed
                        </label>

                        <input type="radio" class="btn-check" name="layout" id="full-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="full-layout">
                            <iconify-icon icon="solar:scanner-linear" class="icon fs-7 me-2"></iconify-icon>
                            Full
                        </label>
                    </div>

                    <h6 class="fw-semibold fs-4 mb-2 mt-5">Sidebar Type</h6>
                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <a href="javascript:void(0)" class="fullsidebar">
                            <input type="radio" class="btn-check" name="sidebar-type" id="full-sidebar"
                                autocomplete="off" />
                            <label class="btn p-9 btn-outline-primary" for="full-sidebar"><iconify-icon
                                    icon="solar:sidebar-minimalistic-outline" class="icon fs-7 me-2"></iconify-icon>
                                Full</label>
                        </a>
                        <div>
                            <input type="radio" class="btn-check" name="sidebar-type" id="mini-sidebar"
                                autocomplete="off" />
                            <label class="btn p-9 btn-outline-primary" for="mini-sidebar">
                                <iconify-icon icon="solar:siderbar-outline"
                                    class="icon fs-7 me-2"></iconify-icon>Collapse
                            </label>
                        </div>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Card With</h6>

                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <input type="radio" class="btn-check" name="card-layout" id="card-with-border"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="card-with-border"><iconify-icon
                                icon="solar:library-broken" class="icon fs-7 me-2"></iconify-icon>Border</label>

                        <input type="radio" class="btn-check" name="card-layout" id="card-without-border"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="card-without-border">
                            <iconify-icon icon="solar:box-outline" class="icon fs-7 me-2"></iconify-icon>Shadow
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <!--  Search Bar -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content rounded-1">
                    <div class="modal-header border-bottom">
                        <input type="search" class="form-control fs-3" placeholder="Search here"
                            id="search" />
                        <a href="javascript:void(0)" data-bs-dismiss="modal" class="lh-1">
                            <i class="ti ti-x fs-5 ms-3"></i>
                        </a>
                    </div>
                    <div class="modal-body message-body" data-simplebar="">
                        <h5 class="mb-0 fs-5 p-1">Quick Page Links</h5>
                        <ul class="list mb-0 py-2">
                            <li class="p-1 mb-1 px-2 rounded bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="fs-3 h6 mb-0 d-block">Modern</span>
                                    <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 px-2 rounded bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="fs-3 h6 mb-0 d-block">Dashboard</span>
                                    <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 px-2 rounded bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="fs-3 h6 mb-0 d-block">Contacts</span>
                                    <span class="fs-3 text-muted d-block">/apps/contacts</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 px-2 rounded bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="fs-3 h6 mb-0 d-block">Posts</span>
                                    <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 px-2 rounded bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="fs-3 h6 mb-0 d-block">Detail</span>
                                    <span
                                        class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 px-2 rounded bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="fs-3 h6 mb-0 d-block">Shop</span>
                                    <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 px-2 rounded bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="fs-3 h6 mb-0 d-block">Modern</span>
                                    <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 px-2 rounded bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="fs-3 h6 mb-0 d-block">Dashboard</span>
                                    <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 px-2 rounded bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="fs-3 h6 mb-0 d-block">Contacts</span>
                                    <span class="fs-3 text-muted d-block">/apps/contacts</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 px-2 rounded bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="fs-3 h6 mb-0 d-block">Posts</span>
                                    <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 px-2 rounded bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="fs-3 h6 mb-0 d-block">Detail</span>
                                    <span
                                        class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 px-2 rounded bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="fs-3 fw-normal d-block">Shop</span>
                                    <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <!-- Import Js Files -->
    <script src="{{ asset('assets/js/breadcrumb/breadcrumbChart.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme/app.init.js') }}"></script>
    <script src="{{ asset('assets/js/theme/theme.js') }}"></script>
    <script src="{{ asset('assets/js/theme/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/theme/feather.min.js') }}"></script>

    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboards/dashboard5.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-basic.init.js') }}"></script>
    <script src="{{ asset('assets/libs/quill/dist/quill.min.js') }}"></script>
    <script src="{{ asset('assets/js/forms/quill-init.js') }}"></script>
    <script src="{{ asset('assets/js/forms/quill-init.js') }}"></script>
    <script src="{{ asset('assets/js/forms/quill-init.js') }}"></script>
    <script src="{{ asset('assets/js/tables-datatables-advanced.js') }}"></script>
    <script src="{{ asset('assets/js/ui-modals.js') }}"></script>
    <script src="{{ asset('assets/js/tables-datatables-basic.js') }}"></script>
  

   
    <script src="{{ asset('assets/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/forms/select2.init.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/forms/repeater-init.js') }}"></script>
    <script src="{{asset('assets/libs/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/js/forms/sweet-alert.init.js')}}"></script>
    @yield('script')
</body>

</html>
