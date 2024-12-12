@inject('errors', 'Illuminate\Support\ViewErrorBag')
<!DOCTYPE html>
<html
    lang="en"
    dir="ltr"
    data-bs-theme="light"
    data-color-theme="Blue_Theme"
    data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link
        rel="shortcut icon"
        type="image/png"
        href="{{asset('assets/images/logos/favicon.png')}}" />

    <!-- Core Css -->
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}" />

    <title>Xtreme Bootstrap Admin</title>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img
            src="{{asset('assets/images/logos/logo-icon.svg')}}"
            alt="loader"
            class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper" class="auth-customizer-none">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
            <div class="position-relative z-3">
                <div class="row">
                    <div class="col-xl-7 col-xxl-8">
                        <a
                            href="{{asset('main/index.html')}}"
                            class="text-nowrap logo-img d-flex align-items-center px-4 py-9 w-100">
                            <b class="logo-icon">
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img
                                    src="{{asset('assets/images/logos/logo-icon.svg')}}"
                                    alt="homepage"
                                    class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img
                                    src="{{asset('assets/images/logos/logo-light-icon.svg')}}"
                                    alt="homepage"
                                    class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img
                                    src="{{asset('assets/images/logos/logo-text.svg')}}"
                                    alt="homepage"
                                    class="dark-logo ps-2" />
                                <!-- Light Logo text -->
                                <img
                                    src="{{asset('assets/images/logos/logo-light-text.svg')}}"
                                    class="light-logo ps-2"
                                    alt="homepage" />
                            </span>
                        </a>
                        <div
                            class="d-none d-xl-flex align-items-center justify-content-center h-n80')}}">
                            <img
                                src="{{asset('assets/images/backgrounds/login-security.svg')}}"
                                alt="xtreme-img"
                                class="img-fluid"
                                width="600" />
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-4">
                        <div
                            class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                            <div class="auth-max-width col-sm-8 col-md-6 col-xl-9">
                                <h2 class="mb-1 fs-7 fw-bolder">Welcome to Xtreme</h2>
                                <p class="mb-4">Your Admin Dashboard</p>
                                <div class="row">
                                    <div class="col-6 mb-2 mb-sm-0">
                                        <a
                                            class="btn btn-link border border-muted d-flex align-items-center justify-content-center rounded-2 py-8 text-decoration-none"
                                            href="javascript:void(0)"
                                            role="button">
                                            <img
                                                src="{{asset('assets/images/svgs/google-icon.svg')}}"
                                                alt="xtreme-img"
                                                class="img-fluid me-2"
                                                width="18"
                                                height="18" />
                                            Google
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a
                                            class="btn btn-link border border-muted d-flex align-items-center justify-content-center rounded-2 py-8 text-decoration-none"
                                            href="javascript:void(0)"
                                            role="button">
                                            <img
                                                src="{{asset('assets/images/svgs/facebook-icon.svg')}}"
                                                alt="xtreme-img"
                                                class="img-fluid me-2"
                                                width="18"
                                                height="18" />
                                            Facebook
                                        </a>
                                    </div>
                                </div>
                                <div class="position-relative text-center my-4">
                                    <p
                                        class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-3 position-relative">
                                        or sign Up with
                                    </p>
                                    <span
                                        class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                                </div>
                                @if($data !== "vendor")
                                <form method="POST" id="signupForm">
                                    @csrf
                                    <div class="mb-3">
                                        <div id="error-messages" class="text-danger"></div> <!-- Error message  -->
                                        <div id="success-message" class="text-danger"></div> <!-- success message -->
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Name</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="exampleInputtext"
                                            aria-describedby="textHelp" name="name" />
                                        <div id="nameError" class="text-danger"></div> <!-- Error message for name -->
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input
                                            type="email"
                                            class="form-control"
                                            id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="email" />
                                        <div id="emailError" class="text-danger"></div> <!-- Error message for email -->
                                    </div>

                                    <div></div>

                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input
                                            type="password"
                                            class="form-control"
                                            id="exampleInputPassword1" name="password" />
                                        <div id="passwordError" class="text-danger"></div> <!-- Error message for password -->
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign Up</button>
                                    <div class="d-flex align-items-center">
                                        <p class="fs-4 mb-0 text-dark">
                                            Already have an Account?
                                        </p>
                                        <a
                                            class="text-primary fw-medium ms-2">Sign In</a>
                                    </div>

                                </form>
                                @else
                                <form method="POST" action="" id="vendorSignupForm">
                                    @csrf
                                    <div class="mb-3">
                                        <div id="error-messages" class="text-danger"></div> <!-- Error message -->
                                        <div id="success-message" class="text-success"></div> <!-- Success message -->
                                    </div>

                                    <!-- Business Name -->
                                    <div class="mb-3">
                                        <label for="businessName" class="form-label">Business Name</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="businessName"
                                            aria-describedby="businessNameHelp"
                                            name="business_name" />
                                        <div id="businessNameError" class="text-danger"></div> <!-- Error message for business name -->
                                    </div>

                                    <!-- Owner's Name -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Owner's Name</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            aria-describedby="nameHelp"
                                            name="name" />
                                        <div id="nameError" class="text-danger"></div> <!-- Error message for owner's name -->
                                    </div>

                                    <!-- Email Address -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input
                                            type="email"
                                            class="form-control"
                                            id="email"
                                            aria-describedby="emailHelp"
                                            name="email" />
                                        <div id="emailError" class="text-danger"></div> <!-- Error message for email -->
                                    </div>

                                    <!-- Phone Number -->
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="phone"
                                            aria-describedby="phoneHelp"
                                            name="phone" />
                                        <div id="phoneError" class="text-danger"></div> <!-- Error message for phone -->
                                    </div>

                                    <!-- Business Address -->
                                    <div class="mb-4">
                                        <label for="address" class="form-label">Business Address</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="address"
                                            name="address" />
                                        <div id="addressError" class="text-danger"></div> <!-- Error message for address -->
                                    </div>

                                    <!-- Password -->
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input
                                            type="password"
                                            class="form-control"
                                            id="password"
                                            name="password" />
                                        <div id="passwordError" class="text-danger"></div> <!-- Error message for password -->
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary w-100 py-2 mb-4 rounded-2">Create Vendor Account</button>

                                    <!-- Already have an account -->
                                    <div class="d-flex align-items-center">
                                        <p class="fs-4 mb-0 text-dark">Already have an Account?</p>
                                        <a href="{{ route('login') }}" class="text-primary fw-medium ms-2">Sign In</a>
                                    </div>
                                </form>


                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function handleColorTheme(e) {
                    document.documentElement.setAttribute("data-color-theme", e);
                }
            </script>
            <button
                class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample">
                <i class="icon ti ti-settings fs-7 text-white"></i>
            </button>

            <div
                class="offcanvas customizer offcanvas-end"
                tabindex="-1"
                id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div
                    class="d-flex align-items-center justify-content-between p-3 border-bottom">
                    <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">
                        Settings
                    </h4>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body h-n80" data-simplebar>
                    <h6 class="fw-semibold fs-4 mb-2">Theme</h6>

                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <input
                            type="radio"
                            class="btn-check light-layout"
                            name="theme-layout"
                            id="light-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="light-layout">
                            <iconify-icon
                                icon="solar:sun-2-outline"
                                class="icon fs-7 me-2"></iconify-icon>Light</label>
                        <input
                            type="radio"
                            class="btn-check dark-layout"
                            name="theme-layout"
                            id="dark-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="dark-layout"><iconify-icon
                                icon="solar:moon-outline"
                                class="icon fs-7 me-2"></iconify-icon>Dark</label>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Direction</h6>
                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <input
                            type="radio"
                            class="btn-check"
                            name="direction-l"
                            id="ltr-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="ltr-layout"><iconify-icon
                                icon="solar:align-left-linear"
                                class="icon fs-7 me-2"></iconify-icon>LTR</label>

                        <input
                            type="radio"
                            class="btn-check"
                            name="direction-l"
                            id="rtl-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="rtl-layout">
                            <iconify-icon
                                icon="solar:align-right-linear"
                                class="icon fs-7 me-2"></iconify-icon>RTL
                        </label>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Colors</h6>

                    <div
                        class="d-flex flex-row flex-wrap gap-3 customizer-box color-pallete"
                        role="group">
                        <input
                            type="radio"
                            class="btn-check"
                            name="color-theme-layout"
                            id="Blue_Theme"
                            autocomplete="off" />
                        <label
                            class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Blue_Theme')"
                            for="Blue_Theme"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            data-bs-title="BLUE_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-1">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input
                            type="radio"
                            class="btn-check"
                            name="color-theme-layout"
                            id="Aqua_Theme"
                            autocomplete="off" />
                        <label
                            class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Aqua_Theme')"
                            for="Aqua_Theme"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            data-bs-title="AQUA_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-2">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input
                            type="radio"
                            class="btn-check"
                            name="color-theme-layout"
                            id="Purple_Theme"
                            autocomplete="off" />
                        <label
                            class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Purple_Theme')"
                            for="Purple_Theme"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            data-bs-title="PURPLE_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-3">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input
                            type="radio"
                            class="btn-check"
                            name="color-theme-layout"
                            id="green-theme-layout"
                            autocomplete="off" />
                        <label
                            class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Green_Theme')"
                            for="green-theme-layout"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            data-bs-title="GREEN_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-4">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input
                            type="radio"
                            class="btn-check"
                            name="color-theme-layout"
                            id="cyan-theme-layout"
                            autocomplete="off" />
                        <label
                            class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Cyan_Theme')"
                            for="cyan-theme-layout"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            data-bs-title="CYAN_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-5">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input
                            type="radio"
                            class="btn-check"
                            name="color-theme-layout"
                            id="orange-theme-layout"
                            autocomplete="off" />
                        <label
                            class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Orange_Theme')"
                            for="orange-theme-layout"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            data-bs-title="ORANGE_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-6">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Layout Type</h6>
                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <div>
                            <input
                                type="radio"
                                class="btn-check"
                                name="page-layout"
                                id="vertical-layout"
                                autocomplete="off" />
                            <label
                                class="btn p-9 btn-outline-primary"
                                for="vertical-layout">
                                <iconify-icon
                                    icon="solar:slider-vertical-minimalistic-linear"
                                    class="icon fs-7 me-2"></iconify-icon>Vertical
                            </label>
                        </div>
                        <div>
                            <input
                                type="radio"
                                class="btn-check"
                                name="page-layout"
                                id="horizontal-layout"
                                autocomplete="off" />
                            <label
                                class="btn p-9 btn-outline-primary"
                                for="horizontal-layout">
                                <iconify-icon
                                    icon="solar:slider-minimalistic-horizontal-outline"
                                    class="icon fs-7 me-2"></iconify-icon>
                                Horizontal
                            </label>
                        </div>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Container Option</h6>

                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <input
                            type="radio"
                            class="btn-check"
                            name="layout"
                            id="boxed-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="boxed-layout">
                            <iconify-icon
                                icon="solar:cardholder-linear"
                                class="icon fs-7 me-2"></iconify-icon>
                            Boxed
                        </label>

                        <input
                            type="radio"
                            class="btn-check"
                            name="layout"
                            id="full-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="full-layout">
                            <iconify-icon
                                icon="solar:scanner-linear"
                                class="icon fs-7 me-2"></iconify-icon>
                            Full
                        </label>
                    </div>

                    <h6 class="fw-semibold fs-4 mb-2 mt-5">Sidebar Type</h6>
                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <a href="javascript:void(0)" class="fullsidebar">
                            <input
                                type="radio"
                                class="btn-check"
                                name="sidebar-type"
                                id="full-sidebar"
                                autocomplete="off" />
                            <label class="btn p-9 btn-outline-primary" for="full-sidebar"><iconify-icon
                                    icon="solar:sidebar-minimalistic-outline"
                                    class="icon fs-7 me-2"></iconify-icon>
                                Full</label>
                        </a>
                        <div>
                            <input
                                type="radio"
                                class="btn-check"
                                name="sidebar-type"
                                id="mini-sidebar"
                                autocomplete="off" />
                            <label class="btn p-9 btn-outline-primary" for="mini-sidebar">
                                <iconify-icon
                                    icon="solar:siderbar-outline"
                                    class="icon fs-7 me-2"></iconify-icon>Collapse
                            </label>
                        </div>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Card With</h6>

                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <input
                            type="radio"
                            class="btn-check"
                            name="card-layout"
                            id="card-with-border"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="card-with-border"><iconify-icon
                                icon="solar:library-broken"
                                class="icon fs-7 me-2"></iconify-icon>Border</label>

                        <input
                            type="radio"
                            class="btn-check"
                            name="card-layout"
                            id="card-without-border"
                            autocomplete="off" />
                        <label
                            class="btn p-9 btn-outline-primary"
                            for="card-without-border">
                            <iconify-icon
                                icon="solar:box-outline"
                                class="icon fs-7 me-2"></iconify-icon>Shadow
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <!--  Search Bar -->
        <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content rounded-1">
                    <div class="modal-header border-bottom">
                        <input
                            type="search"
                            class="form-control fs-3"
                            placeholder="Search here"
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
                                    <span class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
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
                                    <span class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
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
    <!-- Import Js Files -->
    <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/libs/simplebar/dist/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/js/theme/app.init.js')}}"></script>
    <script src="{{asset('assets/js/theme/theme.js')}}"></script>
    <script src="{{asset('assets/js/theme/app.min.js')}}"></script>
    <script src="{{asset('assets/js/theme/feather.min.js')}}"></script>

    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form'); // Select the form element
            const errorDiv = document.querySelector('#error-messages'); // Error container div
            const successDiv = document.querySelector('#success-message'); // Success container div

            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent default form submission

                // Clear any previous messages
                errorDiv.innerHTML = '';
                successDiv.innerHTML = '';

                // Get the form data
                const formData = new FormData(form);

                // Send the form data via AJAX to the backend
                fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest', // To identify AJAX requests
                            'Accept': 'application/json', // Set Accept header to JSON for proper handling
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        // If validation fails (422 status code)
                        if (data.errors) {
                            const errors = data.errors;

                            // Loop through and display validation errors
                            Object.keys(errors).forEach(function(key) {
                                const errorMessage = errors[key].join(', ');
                                const errorElement = document.createElement('div');
                                errorElement.classList.add('alert', 'alert-danger'); // Bootstrap styling for error
                                errorElement.innerText = errorMessage;
                                errorDiv.appendChild(errorElement);
                            });

                            // Automatically clear error messages after 30 seconds
                            setTimeout(() => {
                                errorDiv.innerHTML = '';
                            }, 30000); // 30 seconds
                        }

                        // If registration is successful (201 or success status)
                        if (data.success) {
                            const successElement = document.createElement('div');
                            successElement.classList.add('alert', 'alert-success'); // Bootstrap styling for success
                            successElement.innerText = 'Registration successful! Redirecting to sign-in...';
                            successDiv.appendChild(successElement);

                            // Redirect after 3 seconds
                            setTimeout(() => {
                                window.location.href = 'signin'; // Redirect to the sign-in page
                            }, 3000); // 3-second delay before redirection
                        }
                    })
                    .catch(error => {
                        console.error('An error occurred:', error);
                    });
            });
        });
    </script>
</body>

</html>