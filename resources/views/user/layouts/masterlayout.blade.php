<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Yash Tools A HOUSE OF DIE & MOLD POLISHING & FINISHING PRODUCTSYash Tools A HOUSE OF DIE & MOLD POLISHING &
        FINISHING PRODUCTS</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('csrf-token')
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/sal.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <style>
        .activeTab {
            background-color: #ffffff !important;
            transition: background-color 0.5sease;
            color: #303667;
            border-radius: 26px;
        }

        input[type='search'] {
            padding: 5px 10px;
            height: revert-layer;
            border: 1px solid gray;
            background-color: #fff;
            margin-right: 20px;
            border-radius: 5px;
            width: 100%
        }

        @media only screen and (max-width: 767px) {
            input[type='search'] {
                width: 100%;
                background-position-x: 95%;
            }
        }

        .suggestions {
            display: none;
            position: absolute;
            z-index: 999;
            padding: 20px;
            background-color: #f0f0f0;
            width: 400px;
            min-height: 100px;
            max-height: 550px;
            margin-top: 11px;
            border-radius: 10px;
            overflow-x: hidden;
            overflow-y: scroll;
        }

        .suggestions::-webkit-scrollbar {
            display: none;
        }

        .suggestions {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .suggestions .suggestion-list-item {
            /* background-color: #9ad7ff; */
            background-color: #fff;
            padding: 5px 10px;
            margin-top: 5px;
        }
    </style>
    @yield('style')
</head>

<body class="backl">
    @include('user.mainheader')

    @yield('content')

    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ asset('assets/js/vendor/modernizr.min.js') }}"></script>
    <!-- jQuery JS -->
    <script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/js.cookie.js') }}"></script>
    <!-- <script src="assets/js/vendor/jquery.style.switcher.js') }}"></script> -->
    <script src="{{ asset('assets/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/sal.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/counterup.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/waypoints.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @yield('script')

    <script>
        $(document).ready(function() {

            $(document).on('click', function(event) {
                const $target = $(event.target);

                if (!$target.closest('.suggestions, .search-input').length) {
                    // Hide the suggestions container
                    $('.suggestions').hide();

                    // Clear the input field
                    $('.search-input').val('');
                }
            });


            $(".search-input").on("input", function() {
                $("#product-list-suggestions").show();
                let searchItem = $(this).val();

                $.ajax({
                    url: "/search-products",
                    type: "GET",
                    data: {
                        searchItem: searchItem,
                    },
                    success: function(response) {
                        console.log(response)
                        $('#product-list-suggestions').html('');
                        $.each(response, function(index, product) {
                            $('#product-list-suggestions').append(
                                `<div data-suggestionid="${product.id}" class="suggestion-list-item">
                                    <div class="d-flex gap-2">
                                        <img src="/uploads/products/thumbnails/${product.product_thumbain}" width="50px" alt="">
                                        <a href="/product-detail-info/${product.product_slug}">${product.product_name}</a>
                                    </div>
                                </div>`
                            );
                        });
                    }
                });
            });

        });
    </script>
</body>

</html>
