@extends('cliqnshop::base')

@section('aimeos_header')
    <title>{{ __('Profile') }}</title>
    <?= $aiheader['locale/select'] ?? '' ?>
    <?= $aiheader['basket/mini'] ?? '' ?>
    <?= $aiheader['account/profile'] ?? '' ?>
    <?= $aiheader['account/review'] ?? '' ?>
    <?= $aiheader['account/subscription'] ?? '' ?>
    <?= $aiheader['account/history'] ?? '' ?>
    <?= $aiheader['account/favorite'] ?? '' ?>
    <?= $aiheader['account/watch'] ?? '' ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/session'] ?? '' ?>
    <?= $aiheader['catalog/tree'] ?? '' ?>
    <?= $aiheader['catalog/home'] ?? '' ?>
    <?= $aiheader['NewMenu/Design1'] ?? '' ?>

    <style>
        .nav-pills-dark .nav-item .nav-link.active {
            background-color: #3a606e;
            color: #fff;
        }

        .nav-pills-dark .nav-item .nav-link:hover {
            background-color: var(--ai-warning);
            color: #ffffff;
        }

        .nav-pills-dark .nav-item .nav-link {
            background-color: transparent;
            border-radius: 0.5rem;
            color: #21313c;
            font-weight: 500;
            padding: 0.5rem 0.75rem;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            background-color: var(--bs-nav-pills-link-active-bg);
            color: var(--bs-nav-pills-link-active-color);
        }

        .nav-pills .nav-link {
            background: none;
            border: 0;
            border-radius: var(--bs-nav-pills-border-radius);
        }

        .nav-link:focus,
        .nav-link:hover {
            color: var(--bs-nav-link-hover-color);
        }

        .nav-pills-dark .nav-item .nav-link {
            border-radius: 0;
        }

        .me-2 {
            margin-right: 0.5rem !important;
        }
    </style>


@stop

@section('aimeos_head_basket')
    <?= $aibody['basket/mini'] ?? '' ?>
@stop

@section('aimeos_head_nav')
    <?= $aibody['NewMenu/Design1'] ?? '' ?>
@stop

@section('aimeos_head_locale')
    <?= $aibody['locale/select'] ?? '' ?>
@stop

@section('aimeos_head_search')
    <?= $aibody['catalog/search'] ?? '' ?>
@stop

@section('aimeos_body')
    <div class="container-fluid">



        <main>
            <!-- section -->
            <section>
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <!-- col -->
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center d-md-none py-4">
                                <!-- heading -->
                                <h3 class="fs-5 mb-0 d-none">Account Setting</h3>
                                <!-- button -->
                                <button class="btn btn-outline-gray-400 text-muted d-md-none btn-icon btn-sm ms-3 "
                                    type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAccount"
                                    aria-controls="offcanvasAccount">
                                    <i class="bi bi-text-indent-left fs-3"></i>
                                </button>
                            </div>
                        </div>
                        <!-- col -->
                        <div class="col-lg-3 col-md-4 col-12 border-end d-md-block">
                            <div class="pt-10 pe-lg-10">
                                <!-- nav -->
                                <h3  class="profile-hamburger">&#9776;</h3>
                                <ul  class="mySidenav nav flex-column nav-pills nav-pills-dark">
                                    <!-- nav item -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ airoute('aimeos_shop_account') }}"><i
                                                class="fa fa-comments me-2" aria-hidden="true"></i>Reviews</a>
                                    </li>
                                    <!-- nav item -->
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="{{ airoute('aimeos_shop_orders') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                            </svg> Orders</a>
                                    </li>

                                    <!-- nav item -->
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page"
                                            href="{{ airoute('aimeos_shop_kyc_cliqnshop') }}">
                                            <i class="fa fa-file me-2" aria-hidden="true"></i> KYC Details</a>
                                    </li>


                                    <!-- nav item -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ airoute('aimeos_shop_address') }}">
                                            <i class="fa fa-map-marker me-2" aria-hidden="true"></i>Address</a>
                                    </li>
                                    <!-- nav item -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ airoute('aimeos_shop_subscription') }}"><i
                                                class="fa fa-rocket me-2" aria-hidden="true"></i>Subscription</a>
                                    </li>
                                    <!-- nav item -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ airoute('aimeos_shop_account_favorite') }}"><i
                                                class="fa fa-heart me-2" aria-hidden="true"></i> Favorite Products</a>
                                    </li>
                                    <!-- nav item -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ airoute('aimeos_shop_account_watch') }}"><i
                                                class="fa fa-eye me-2" aria-hidden="true"></i>Watched Products</a>
                                    </li>
                                    <!-- nav item -->
                                    <li class="nav-item">
                                        <hr>
                                    </li>
                                    <!-- nav item -->
                                    <li class="nav-item">
                                        <form class="feather-icon icon-bell me-2 nav-link" id="logout"
                                            action="{{ airoute('logout') }}" method="POST">{{ csrf_field() }}<button
                                                class="nav-link p-0"><span><i class="fa fa-stop me-2"
                                                        aria-hidden="true"></i>{{ __('Logout') }}</span></button></form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12">
                            <div class="py-6 p-md-6 p-lg-10">
                                <!-- heading -->
                                {{-- <h2 class="mb-6">Your Orders</h2> --}}

                                <div class="table-responsive border-0">
                                    <!-- Table -->

                                    @if (session()->has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif

                                    @if (session()->has('error'))
                                        <div class="alert alert-warning" role="alert">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="container">
                                        <form method="post" action="{{ airoute('aimeos_shop_store_kyc') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <select name="document" class="form-select"
                                                    aria-label="Default select example" required>
                                                    <option value="" selected>Select Document</option>
                                                    {{-- @foreach ($documents as $document) --}}
                                                    <option id="" value="Aadhaar Card">Aadhaar Card</option>
                                                    <option id="" value="Passport">Passport</option>
                                                    <option id="" value="Voter Id">Voter Id</option>
                                                    <option id="" value="Pan Card">Pan Card</option>
                                                    {{-- @endforeach --}}
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="file">Front</label>
                                                <input class="form-control" type="file" id="front"
                                                    name="front">
                                            </div>
                                            <div class="form-group">
                                                <br>
                                                <label for="file">Back</label>
                                                <input class="form-control " type="file" id="back"
                                                    name="back">
                                            </div>
                                            <div>
                                                <button class="btn btn-success center mt-4">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    {{-- <?= $aibody['account/kyc'] ?? '' ?> --}}

                                    {{-- <center class="pt-5">Coming Soon</center> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>

    </div>

    <script>
var button = document.querySelector('.profile-hamburger');
var items = document.querySelector('.mySidenav');

button.addEventListener('click', function() {
  items.classList.toggle('opened');
}, false);
</script>

@stop
@section('aimeos_aside')
    <?= $aibody['catalog/session'] ?>
@stop
