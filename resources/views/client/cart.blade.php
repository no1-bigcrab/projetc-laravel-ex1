<!DOCTYPE html>
<html lang="en">
<head>
    @include('.assets.client.head')
</head>
<body>
    @include('.assets.client.home.topbar')
    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            @include('.assets.client.menu.categories-menu')
            <div class="col-lg-9">
                @include('.assets.client.menu.menu')
                <div class="container-fluid bg-secondary mb-5">
                    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
                        <div class="d-inline-flex">
                            <p class="m-0"><a href="">Home</a></p>
                            <p class="m-0 px-2">-</p>
                            <p class="m-0">Shopping Cart</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
     {{-- Cart --}}
     @include('.assets.client.cart.cart-table')
     {{-- End Cart --}}
    <!-- Shop Detail End -->
    @include('.assets.client.footer')
</body>
</html>