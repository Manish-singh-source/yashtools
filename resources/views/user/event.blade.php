@extends('user.layouts.app')

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const sliders = document.querySelectorAll(".emotions-slider");

            if (!sliders.length) return;

            const list = [];

            sliders.forEach((element) => {
                const [slider, prevEl, nextEl, pagination] = [
                    element.querySelector(".swiper"),
                    element.querySelector(".slider-nav__item_prev"),
                    element.querySelector(".slider-nav__item_next"),
                    element.querySelector(".slider-pagination")
                ];

                list.push(
                    new Swiper(slider, {
                        slidesPerView: "auto",
                        spaceBetween: 20,
                        speed: 600,
                        observer: true,
                        watchOverflow: true,
                        watchSlidesProgress: true,
                        centeredSlides: true,
                        initialSlide: 1,
                        navigation: {
                            nextEl,
                            prevEl,
                            disabledClass: "disabled"
                        },
                        pagination: {
                            el: pagination,
                            type: "bullets",
                            modifierClass: "slider-pagination",
                            bulletClass: "slider-pagination__item",
                            bulletActiveClass: "active",
                            clickable: true
                        },
                        breakpoints: {
                            768: {
                                spaceBetween: 40
                            }
                        }
                    })
                );
            });
        });
    </script>
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <style>
        .base-template__wrapper {
            max-width: 1560px;
        }

        .base-template__text {
            margin-bottom: 60px;
        }

        /**
                                                                    * Slider Instance
                                                                    */

        .swiper {
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .emotions-slider {
            --color-gray: #818181;
            --color-gray-dark: #1e1e1e;

            padding-inline: 98px;
            position: relative;
        }

        .emotions-slider__slide {
            display: flex;
            align-items: center;
            min-height: 550px;
        }

        @media screen and (max-width: 767.9px) {
            .emotions-slider {
                padding: 0;
                margin-inline: -20px;
            }
        }

        /**
                                                                    * Slider Navigation
                                                                    */

        .slider-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            position: absolute;
            top: 50%;
            left: 0;
            translate: 0 -50%;
            z-index: 1;
            pointer-events: none;
        }

        .slider-nav__item {
            display: flex;
            align-items: center;
            justify-content: center;
            aspect-ratio: 1;
            width: 48px;
            pointer-events: auto;
            cursor: pointer;
            transition: all 0.3s ease-out;
        }

        .slider-nav__item.disabled {
            cursor: default;
            opacity: 0.5;
        }

        .slider-nav__item path {
            stroke: currentColor;
        }

        @media (hover: hover) and (pointer: fine) {
            .slider-nav__item:not(.disabled):hover {
                color: var(--color-blue);
            }
        }

        @media (hover: none) {
            .slider-nav__item:not(.disabled):active {
                color: var(--color-blue);
            }
        }

        @media screen and (max-width: 767.9px) {
            .slider-nav {
                display: none;
            }
        }

        /**
                                                                    * Slider Pagination
                                                                    */

        .slider-pagination {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 8px;
            padding-top: 40px;
        }

        .swiper-pagination-lock {
            display: none !important;
        }

        .slider-pagination__item {
            width: 8px;
            height: 8px;
            border-radius: 99px;
            background: #fff;
            transition: all 0.3s ease-out;
            opacity: 0.2;
        }

        .slider-pagination__item.active {
            width: 30px;
            opacity: 1;
        }

        /**
                                                                    * Slider Item
                                                                    */

        .swiper-slide {
            width: auto;
            height: auto;
        }

        @keyframes btn-arrow-move {
            0% {
                translate: 0;
            }

            100% {
                translate: 100% -100%;
            }
        }

        .emotions-slider-item {
            --border-radius: 10px;

            width: calc(100dvw - 60px);
            max-width: 400px;
            background: var(--color-gray-dark);
            border-radius: var(--border-radius);
            position: relative;
            overflow: hidden;
        }

        .emotions-slider-item__badge {
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px 4px 5px;
            background: #00000066;
            border-bottom-right-radius: var(--border-radius);
            font-size: 14px;
            line-height: calc(24 / 14);
            position: absolute;
            left: 0;
            top: 0;
            z-index: 1;
        }

        .emotions-slider-item__badge::before {
            content: "";
            flex-shrink: 0;
            display: block;
            aspect-ratio: 1;
            width: 18px;
            background: url("https://bato-web-agency.github.io/bato-shared/img/slider-1/icon-star.svg") center center no-repeat;
            background-size: 100%;
        }

        .emotions-slider-item__image {
            aspect-ratio: 400 / 270;
            overflow: hidden;
        }

        .emotions-slider-item__image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .emotions-slider-item__content {
            display: flex;
            flex-direction: column;
            gap: 30px;
            padding: 30px 20px;
        }

        .emotions-slider-item__header,
        .emotions-slider-item__footer {
            max-height: 50px;
            overflow: hidden;
            transition: max-height 0.6s ease-in;
        }

        .emotions-slider-item__header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .emotions-slider-item__price {
            font-weight: 600;
            font-size: 22px;
            line-height: calc(24 / 22);
        }

        .emotions-slider-item__author {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .emotions-slider-item__author-image {
            flex-shrink: 0;
            aspect-ratio: 1;
            width: 20px;
            border-radius: 100%;
            overflow: hidden;
        }

        .emotions-slider-item__author-image img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .emotions-slider-item__author-name {
            font-family: var(--font-poppins);
            font-size: 14px;
            line-height: calc(20 / 14);
            color: var(--color-gray);
        }

        .emotions-slider-item__title {
            font-weight: 600;
            font-size: 20px;
            line-height: 1.2;
            margin-bottom: 8px;
            color: #a5dbff;
        }

        .emotions-slider-item__text {
            font-weight: 300;
            font-size: 16px;
            line-height: 1.5;
        }

        .emotions-slider-item__btn {
            display: flex;
            align-items: center;
            gap: 4px;
            font-weight: 500;
            font-size: 18px;
            color: #fff;
            text-decoration: none;
        }

        .emotions-slider-item__btn-icon {
            flex-shrink: 0;
            display: block;
            aspect-ratio: 1;
            width: 24px;
            position: relative;
            overflow: hidden;
        }

        .emotions-slider-item__btn-icon::before,
        .emotions-slider-item__btn-icon::after {
            content: "";
            display: block;
            width: 100%;
            height: 100%;
            background: url("https://bato-web-agency.github.io/bato-shared/img/slider-1/icon-btn-arrow.svg") center center no-repeat;
            background-size: 100%;
        }

        .emotions-slider-item__btn-icon::after {
            position: absolute;
            top: 100%;
            right: 100%;
        }

        .emotions-slider__slide:not(.swiper-slide-active) .emotions-slider-item__header,
        .emotions-slider__slide:not(.swiper-slide-active) .emotions-slider-item__footer {
            max-height: 0;
        }

        @media (hover: hover) and (pointer: fine) {

            .emotions-slider-item__btn:hover .emotions-slider-item__btn-icon::before,
            .emotions-slider-item__btn:hover .emotions-slider-item__btn-icon::after {
                animation: btn-arrow-move 0.4s ease forwards;
            }
        }

        @media (hover: none) {

            .emotions-slider-item__btn:active .emotions-slider-item__btn-icon::before,
            .emotions-slider-item__btn:active .emotions-slider-item__btn-icon::after {
                animation: btn-arrow-move 0.4s ease forwards;
            }
        }

        .slider {
            background: #00000030;
            height: 100vh;
            position: relative;
            text-align: center;
            width: 100%;
        }

        .arrow {
            background: black;
            border: none;
            border-radius: 10%;
            color: white;
            cursor: pointer;
            display: none;
            opacity: .4;
            padding: 10px;
            position: absolute;
            text-transform: uppercase;
            -webkit-transition: .2s;
            top: 50%;
            transition: .2s;
        }

        .arrow:hover {
            opacity: .8;
        }

        .arrow.next {
            right: 2%
        }

        .arrow.prev {
            left: 2%;
        }

        .slide {
            background-repeat: no-repeat;
            background-size: 100% 100%;
            color: #fff;
            height: 100%;
            padding: 90px 0 0;
            position: absolute;
            width: 100%;
        }

        .slide-title {
            font-size: 40px;
            font-weight: bold;
            margin: 0 auto;
            padding: 15px 0;
            text-transform: uppercase;
        }

        .slide-desc {
            font-size: 20px;
            margin: 40px auto 0;
            width: 65%;
        }

        .slide-image,
        .slide-image img {
            height: 100%;
            width: 100%;
        }

        .slide:first-of-type {
            background-image: url("assets/images/myimg/Yash.png");
        }

        .slide:nth-of-type(2) {
            background-image: url("assets/images/myimg/yash1.png");
        }

        .active {
            display: block;
        }

        .slide-nav {
            bottom: 30px;
            position: absolute;
            width: 100%;
        }

        .nav-item {
            background: #fff;
            border: 2px solid #ff686b;
            cursor: pointer;
            display: inline-block;
            margin-right: 20px;
            transition: background .4s;
        }

        .nav-item:last-of-type {
            margin-right: 0;
        }

        .nav-item:hover {
            transform: scale(1.3);
        }

        .item-active {
            background: #ff686b;
            transform: scale(1.3);
        }

        .dot {
            border-radius: 50%;
        }

        .dot,
        .square {
            height: 15px;
            width: 15px;
        }

        .rectangle {
            height: 15px;
            width: 30px;
        }

        .statistic-section {
            padding-top: 70px;
            background-image: url(assets/images/myimg/bann.png);
            background-size: cover;
            padding-bottom: 70px;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        /* Hide nested submenus by default */
        /* General Dropdown Styling */
        /* General Dropdown Styling */
        .axil-submenu {
            display: none;
            list-style: none;
            margin: 0;
            padding: 10px 0;
            /* Add padding for a better click area */
            position: absolute;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 10;
            transition: visibility 0.2s ease-in-out, opacity 0.2s ease-in-out;
            visibility: hidden;
            opacity: 0;
        }

        /* Show submenu on hover */
        .menu-item-has-children:hover>.axil-submenu {
            display: block;
            visibility: visible;
            opacity: 1;
        }

        /* Add hover area for nested submenu */
        .axil-submenu>.menu-item-has-children {
            position: relative;
        }

        .menu-item-has-children>.axil-submenu>.menu-item-has-children:hover>.axil-submenu {
            left: 100%;
            /* Nested submenu appears to the right */
            top: 0;
            display: block;
            visibility: visible;
            opacity: 1;
            transition: visibility 0.2s ease-in-out, opacity 0.2s ease-in-out;
        }

        /* Add small delay for user interaction */
        .menu-item-has-children:hover>.axil-submenu {
            pointer-events: auto;
        }

        /* Increase padding to improve clickability */
        .menu-item-has-children>a {
            position: relative;
            padding-right: 20px;
            /* Adjust to make space for arrow */
            padding-left: 5px;
            /* Optional for more space */
        }

        /* Add spacing for the arrow */
        .mainmenu>.menu-item-has-children>a::after,
        .axil-submenu>.menu-item-has-children>a::after {
            content: "";
            /* Font Awesome arrow down icon */
            font-family: var(--font-awesome);
            font-weight: 400;
            color: #c6c6c6;
            font-size: 16px;
            position: absolute;
            top: 1px;
            right: -14px;
        }

        .axil-submenu>.menu-item-has-children>a::after {
            content: "";
            top: 50%;
            font-size: 17px;
            right: 10px;
            transform: translateY(-50%);
        }

        .secpad {
            padding: 80px 0px;
        }

        .pb-35 {
            margin-bottom: 35px;
        }

        .hec {
            color: #a5dbff
        }
    </style>
@endsection

@section('content')
    <main class="main-wrapper">

        <section class="base-template secpad eventb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center pb-35">
                        <h2 class="title">Yash Tools Events</h2>
                        <p>Dive into the world of abstract art, where every stroke and color tells a unique story.<br>
                            Feel the energy, harmony, and inspiration through captivating works of art.
                        </p>
                    </div>
                    <div class="col-12">
                        <div class="wrapper base-template__wrapper">

                            <div class="base-template__content">
                                <div class="emotions-slider">

                                    <!-- Slider Navigation -->
                                    <div class="emotions-slider__nav slider-nav">
                                        <div tabindex="0" class="slider-nav__item slider-nav__item_prev">
                                            <svg width="16" height="28" viewBox="0 0 16 28" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14 26L2 14L14 2" stroke="white" stroke-width="4"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div tabindex="0" class="slider-nav__item slider-nav__item_next">
                                            <svg width="16" height="28" viewBox="0 0 16 28" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 26L14 14L2 2" stroke="white" stroke-width="4"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>

                                    <!-- Slider Content -->
                                    <div class="emotions-slider__slider swiper">
                                        <div class="emotions-slider__wrapper swiper-wrapper">
                                            {{-- 
                                            <!-- Slider: Slide 1 -->
                                            <div class="emotions-slider__slide swiper-slide">
                                                <div class="emotions-slider__item emotions-slider-item">
                                                    <div class="emotions-slider-item__image">
                                                        <img src="https://bato-web-agency.github.io/bato-shared/img/slider-1/slide-1.jpg"
                                                            alt="Winds of Change" />
                                                    </div>

                                                    <div class="emotions-slider-item__content">

                                                        <div class="emotions-slider-item__info">
                                                            <h3 class="emotions-slider-item__title">
                                                                Winds of Change
                                                            </h3>
                                                            <p>October 13, 2022</p>
                                                            <div class="emotions-slider-item__text">
                                                                Gentle pink and blue hues remind us of moments when
                                                                everything changes for the better.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            @forelse ($events as $event)
                                                <!-- Slider: Slide 2 -->
                                                <div class="emotions-slider__slide swiper-slide">
                                                    <div class="emotions-slider__item emotions-slider-item">
                                                        @if ($event->events_tag != '')
                                                            <div class="emotions-slider-item__badge">
                                                                {{ $event->events_tag }}
                                                            </div>
                                                        @endif

                                                        <div class="emotions-slider-item__image">
                                                            <img src="uploads/events/{{ $event->events_image }}"
                                                                alt="Flames of Passion" />
                                                        </div>

                                                        <div class="emotions-slider-item__content">


                                                            <div class="emotions-slider-item__info">
                                                                <h3 class="emotions-slider-item__title">
                                                                    {{ $event->events_title }}
                                                                </h3>
                                                                @php
                                                                    $date = $event->events_date;
                                                                    $formattedDate = date('M d, Y', strtotime($date));
                                                                @endphp
                                                                <p>{{ $formattedDate }}</p>
                                                                <div class="emotions-slider-item__text">
                                                                    {{ $event->events_description }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="emotions-slider__slide swiper-slide">
                                                    <div class="emotions-slider__item emotions-slider-item">
                                                        <div class="emotions-slider-item__image">
                                                            <img src="uploads/events/"
                                                                alt="No Event Added" />
                                                        </div>

                                                        <div class="emotions-slider-item__content">
                                                            <div class="emotions-slider-item__info">
                                                                <h3 class="emotions-slider-item__title">
                                                                    There Are Currently No Event
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>

                                    <!-- Slider Pagination -->
                                    <div class="emotions-slider__pagination slider-pagination"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        </section>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const sliders = document.querySelectorAll(".emotions-slider");

                if (!sliders.length) return;

                const list = [];

                sliders.forEach((element) => {
                    const [slider, prevEl, nextEl, pagination] = [
                        element.querySelector(".swiper"),
                        element.querySelector(".slider-nav__item_prev"),
                        element.querySelector(".slider-nav__item_next"),
                        element.querySelector(".slider-pagination")
                    ];

                    list.push(
                        new Swiper(slider, {
                            slidesPerView: "auto",
                            spaceBetween: 20,
                            speed: 600,
                            observer: true,
                            watchOverflow: true,
                            watchSlidesProgress: true,
                            centeredSlides: true,
                            initialSlide: 1,
                            navigation: {
                                nextEl,
                                prevEl,
                                disabledClass: "disabled"
                            },
                            pagination: {
                                el: pagination,
                                type: "bullets",
                                modifierClass: "slider-pagination",
                                bulletClass: "slider-pagination__item",
                                bulletActiveClass: "active",
                                clickable: true
                            },
                            breakpoints: {
                                768: {
                                    spaceBetween: 40
                                }
                            }
                        })
                    );
                });
            });
        </script>


    </main>
@endsection
