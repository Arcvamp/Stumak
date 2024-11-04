
<!DOCTYPE html>
<html
  lang="en"
  dir="ltr"
  data-bs-theme="light"
  data-color-theme="Blue_Theme"
  data-layout="vertical"
>
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link
      rel="shortcut icon"
      type="image/png"
      href="{{asset('assets/images/logos/favicon.png')}}"
    />

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
        class="lds-ripple img-fluid"
      />
    </div>
    <div id="main-wrapper" class="auth-customizer-none">
      <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center"
      >
        <div class="d-flex align-items-center justify-content-center w-100">
          <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3 auth-card">
              <div class="card mb-0">
                <div class="card-body p-5">
                  <a
                    href="#"
                    class="text-nowrap logo-img text-center d-flex align-items-center justify-content-center mb-5 w-100"
                  >
                    <b class="logo-icon">
                      <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                      <!-- Dark Logo icon -->
                      <img
                        src="{{asset('assets/images/logos/logo-icon.svg')}}"
                        alt="homepage"
                        class="dark-logo"
                      />
                      <!-- Light Logo icon -->
                      <img
                        src="{{asset('assets/images/logos/logo-light-icon.svg')}}"
                        alt="homepage"
                        class="light-logo"
                      />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                      <!-- dark Logo text -->
                      <img
                        src="{{asset('assets/images/logos/logo-text.svg')}}"
                        alt="homepage"
                        class="dark-logo ps-2"
                      />
                      <!-- Light Logo text -->
                      <img
                        src="{{asset('assets/images/logos/logo-light-text.svg')}}"
                        class="light-logo ps-2"
                        alt="homepage"
                      />
                    </span>
                  </a>
                  <div class="row">
                    <div class="col-6 mb-2 mb-sm-0">
                      <a
                        class="btn btn-link border border-muted d-flex align-items-center justify-content-center rounded-2 py-8 text-decoration-none"
                        href="javascript:void(0)"
                        role="button"
                      >
                        <img
                          src="{{asset('assets/images/svgs/google-icon.svg')}}"
                          alt="xtreme-img"
                          class="img-fluid me-2"
                          width="18"
                          height="18"
                        />
                        Google
                      </a>
                    </div>
                    <div class="col-6">
                      <a
                        class="btn btn-link border border-muted d-flex align-items-center justify-content-center rounded-2 py-8 text-decoration-none"
                        href="javascript:void(0)"
                        role="button"
                      >
                        <img
                          src="{{asset('assets/images/svgs/facebook-icon.svg')}}"
                          alt="xtreme-img"
                          class="img-fluid me-2"
                          width="18"
                          height="18"
                        />
                        Facebook
                      </a>
                    </div>
                  </div>
                  <div class="position-relative text-center my-4">
                    <p
                      class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-3 position-relative"
                    >
                      or sign in with
                    </p>
                    <span
                      class="border-top w-100 position-absolute top-50 start-50 translate-middle"
                    ></span>
                  </div>
                  <form>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"
                        >Username</label
                      >
                      <input
                        type="email"
                        class="form-control"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                      />
                    </div>
                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label"
                        >Password</label
                      >
                      <input
                        type="password"
                        class="form-control"
                        id="exampleInputPassword1"
                      />
                    </div>
                    <div
                      class="d-flex align-items-center justify-content-between mb-4"
                    >
                      <div class="form-check">
                        <input
                          class="form-check-input primary"
                          type="checkbox"
                          value=""
                          id="flexCheckChecked"
                          checked
                        />
                        <label
                          class="form-check-label text-dark"
                          for="flexCheckChecked"
                        >
                          Remeber this Device
                        </label>
                      </div>
                      <a
                        class="text-primary fw-medium"
                        href="main/authentication-forgot-password.html"
                        >Forgot Password ?</a
                      >
                    </div>
                    <a
                      href=""
                      class="btn btn-primary w-100 py-8 mb-4 rounded-2"
                      >Sign In</a
                    >
                    <div
                      class="d-flex align-items-center justify-content-center"
                    >
                      <p class="fs-4 mb-0 fw-medium">New to Xtreme?</p>
                      <a
                        class="text-primary fw-medium ms-2"
                        href="{{ route('api/signin') }}"
                        >Create an account</a
                      >
                    </div>
                  </form>
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
          aria-controls="offcanvasExample"
        >
          <i class="icon ti ti-settings fs-7 text-white"></i>
        </button>

        <div
          class="offcanvas customizer offcanvas-end"
          tabindex="-1"
          id="offcanvasExample"
          aria-labelledby="offcanvasExampleLabel"
        >
          <div
            class="d-flex align-items-center justify-content-between p-3 border-bottom"
          >
            <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">
              Settings
            </h4>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
          <div class="offcanvas-body h-n80" data-simplebar>
            <h6 class="fw-semibold fs-4 mb-2">Theme</h6>

            <div class="d-flex flex-row gap-3 customizer-box" role="group">
              <input
                type="radio"
                class="btn-check light-layout"
                name="theme-layout"
                id="light-layout"
                autocomplete="off"
              />
              <label class="btn p-9 btn-outline-primary" for="light-layout">
                <iconify-icon
                  icon="solar:sun-2-outline"
                  class="icon fs-7 me-2"
                ></iconify-icon
                >Light</label
              >
              <input
                type="radio"
                class="btn-check dark-layout"
                name="theme-layout"
                id="dark-layout"
                autocomplete="off"
              />
              <label class="btn p-9 btn-outline-primary" for="dark-layout"
                ><iconify-icon
                  icon="solar:moon-outline"
                  class="icon fs-7 me-2"
                ></iconify-icon
                >Dark</label
              >
            </div>

            <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Direction</h6>
            <div class="d-flex flex-row gap-3 customizer-box" role="group">
              <input
                type="radio"
                class="btn-check"
                name="direction-l"
                id="ltr-layout"
                autocomplete="off"
              />
              <label class="btn p-9 btn-outline-primary" for="ltr-layout"
                ><iconify-icon
                  icon="solar:align-left-linear"
                  class="icon fs-7 me-2"
                ></iconify-icon
                >LTR</label
              >

              <input
                type="radio"
                class="btn-check"
                name="direction-l"
                id="rtl-layout"
                autocomplete="off"
              />
              <label class="btn p-9 btn-outline-primary" for="rtl-layout">
                <iconify-icon
                  icon="solar:align-right-linear"
                  class="icon fs-7 me-2"
                ></iconify-icon
                >RTL
              </label>
            </div>

            <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Colors</h6>

            <div
              class="d-flex flex-row flex-wrap gap-3 customizer-box color-pallete"
              role="group"
            >
              <input
                type="radio"
                class="btn-check"
                name="color-theme-layout"
                id="Blue_Theme"
                autocomplete="off"
              />
              <label
                class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                onclick="handleColorTheme('Blue_Theme')"
                for="Blue_Theme"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                data-bs-title="BLUE_THEME"
              >
                <div
                  class="color-box rounded-circle d-flex align-items-center justify-content-center skin-1"
                >
                  <i class="ti ti-check text-white d-flex icon fs-5"></i>
                </div>
              </label>

              <input
                type="radio"
                class="btn-check"
                name="color-theme-layout"
                id="Aqua_Theme"
                autocomplete="off"
              />
              <label
                class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                onclick="handleColorTheme('Aqua_Theme')"
                for="Aqua_Theme"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                data-bs-title="AQUA_THEME"
              >
                <div
                  class="color-box rounded-circle d-flex align-items-center justify-content-center skin-2"
                >
                  <i class="ti ti-check text-white d-flex icon fs-5"></i>
                </div>
              </label>

              <input
                type="radio"
                class="btn-check"
                name="color-theme-layout"
                id="Purple_Theme"
                autocomplete="off"
              />
              <label
                class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                onclick="handleColorTheme('Purple_Theme')"
                for="Purple_Theme"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                data-bs-title="PURPLE_THEME"
              >
                <div
                  class="color-box rounded-circle d-flex align-items-center justify-content-center skin-3"
                >
                  <i class="ti ti-check text-white d-flex icon fs-5"></i>
                </div>
              </label>

              <input
                type="radio"
                class="btn-check"
                name="color-theme-layout"
                id="green-theme-layout"
                autocomplete="off"
              />
              <label
                class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                onclick="handleColorTheme('Green_Theme')"
                for="green-theme-layout"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                data-bs-title="GREEN_THEME"
              >
                <div
                  class="color-box rounded-circle d-flex align-items-center justify-content-center skin-4"
                >
                  <i class="ti ti-check text-white d-flex icon fs-5"></i>
                </div>
              </label>

              <input
                type="radio"
                class="btn-check"
                name="color-theme-layout"
                id="cyan-theme-layout"
                autocomplete="off"
              />
              <label
                class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                onclick="handleColorTheme('Cyan_Theme')"
                for="cyan-theme-layout"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                data-bs-title="CYAN_THEME"
              >
                <div
                  class="color-box rounded-circle d-flex align-items-center justify-content-center skin-5"
                >
                  <i class="ti ti-check text-white d-flex icon fs-5"></i>
                </div>
              </label>

              <input
                type="radio"
                class="btn-check"
                name="color-theme-layout"
                id="orange-theme-layout"
                autocomplete="off"
              />
              <label
                class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                onclick="handleColorTheme('Orange_Theme')"
                for="orange-theme-layout"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                data-bs-title="ORANGE_THEME"
              >
                <div
                  class="color-box rounded-circle d-flex align-items-center justify-content-center skin-6"
                >
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
                  autocomplete="off"
                />
                <label
                  class="btn p-9 btn-outline-primary"
                  for="vertical-layout"
                >
                  <iconify-icon
                    icon="solar:slider-vertical-minimalistic-linear"
                    class="icon fs-7 me-2"
                  ></iconify-icon
                  >Vertical
                </label>
              </div>
              <div>
                <input
                  type="radio"
                  class="btn-check"
                  name="page-layout"
                  id="horizontal-layout"
                  autocomplete="off"
                />
                <label
                  class="btn p-9 btn-outline-primary"
                  for="horizontal-layout"
                >
                  <iconify-icon
                    icon="solar:slider-minimalistic-horizontal-outline"
                    class="icon fs-7 me-2"
                  ></iconify-icon>
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
                autocomplete="off"
              />
              <label class="btn p-9 btn-outline-primary" for="boxed-layout">
                <iconify-icon
                  icon="solar:cardholder-linear"
                  class="icon fs-7 me-2"
                ></iconify-icon>
                Boxed
              </label>

              <input
                type="radio"
                class="btn-check"
                name="layout"
                id="full-layout"
                autocomplete="off"
              />
              <label class="btn p-9 btn-outline-primary" for="full-layout">
                <iconify-icon
                  icon="solar:scanner-linear"
                  class="icon fs-7 me-2"
                ></iconify-icon>
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
                  autocomplete="off"
                />
                <label class="btn p-9 btn-outline-primary" for="full-sidebar"
                  ><iconify-icon
                    icon="solar:sidebar-minimalistic-outline"
                    class="icon fs-7 me-2"
                  ></iconify-icon>
                  Full</label
                >
              </a>
              <div>
                <input
                  type="radio"
                  class="btn-check"
                  name="sidebar-type"
                  id="mini-sidebar"
                  autocomplete="off"
                />
                <label class="btn p-9 btn-outline-primary" for="mini-sidebar">
                  <iconify-icon
                    icon="solar:siderbar-outline"
                    class="icon fs-7 me-2"
                  ></iconify-icon
                  >Collapse
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
                autocomplete="off"
              />
              <label class="btn p-9 btn-outline-primary" for="card-with-border"
                ><iconify-icon
                  icon="solar:library-broken"
                  class="icon fs-7 me-2"
                ></iconify-icon
                >Border</label
              >

              <input
                type="radio"
                class="btn-check"
                name="card-layout"
                id="card-without-border"
                autocomplete="off"
              />
              <label
                class="btn p-9 btn-outline-primary"
                for="card-without-border"
              >
                <iconify-icon
                  icon="solar:box-outline"
                  class="icon fs-7 me-2"
                ></iconify-icon
                >Shadow
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
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
          <div class="modal-content rounded-1">
            <div class="modal-header border-bottom">
              <input
                type="search"
                class="form-control fs-3"
                placeholder="Search here"
                id="search"
              />
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
                    <span class="fs-3 text-muted d-block"
                      >/dashboards/dashboard1</span
                    >
                  </a>
                </li>
                <li class="p-1 mb-1 px-2 rounded bg-hover-light-black">
                  <a href="javascript:void(0)">
                    <span class="fs-3 h6 mb-0 d-block">Dashboard</span>
                    <span class="fs-3 text-muted d-block"
                      >/dashboards/dashboard2</span
                    >
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
                    <span class="fs-3 text-muted d-block"
                      >/apps/blog/posts</span
                    >
                  </a>
                </li>
                <li class="p-1 mb-1 px-2 rounded bg-hover-light-black">
                  <a href="javascript:void(0)">
                    <span class="fs-3 h6 mb-0 d-block">Detail</span>
                    <span class="fs-3 text-muted d-block"
                      >/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span
                    >
                  </a>
                </li>
                <li class="p-1 mb-1 px-2 rounded bg-hover-light-black">
                  <a href="javascript:void(0)">
                    <span class="fs-3 h6 mb-0 d-block">Shop</span>
                    <span class="fs-3 text-muted d-block"
                      >/apps/ecommerce/shop</span
                    >
                  </a>
                </li>
                <li class="p-1 mb-1 px-2 rounded bg-hover-light-black">
                  <a href="javascript:void(0)">
                    <span class="fs-3 h6 mb-0 d-block">Modern</span>
                    <span class="fs-3 text-muted d-block"
                      >/dashboards/dashboard1</span
                    >
                  </a>
                </li>
                <li class="p-1 mb-1 px-2 rounded bg-hover-light-black">
                  <a href="javascript:void(0)">
                    <span class="fs-3 h6 mb-0 d-block">Dashboard</span>
                    <span class="fs-3 text-muted d-block"
                      >/dashboards/dashboard2</span
                    >
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
                    <span class="fs-3 text-muted d-block"
                      >/apps/blog/posts</span
                    >
                  </a>
                </li>
                <li class="p-1 mb-1 px-2 rounded bg-hover-light-black">
                  <a href="javascript:void(0)">
                    <span class="fs-3 h6 mb-0 d-block">Detail</span>
                    <span class="fs-3 text-muted d-block"
                      >/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span
                    >
                  </a>
                </li>
                <li class="p-1 mb-1 px-2 rounded bg-hover-light-black">
                  <a href="javascript:void(0)">
                    <span class="fs-3 fw-normal d-block">Shop</span>
                    <span class="fs-3 text-muted d-block"
                      >/apps/ecommerce/shop</span
                    >
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
  </body>
</html>
