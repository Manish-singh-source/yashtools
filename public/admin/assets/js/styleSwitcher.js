"use strict"
function addSwitcher() {
    var icSwitcher = '<div class=sidebar-right><div class=bg-overlay></div><a class="sidebar-right-trigger wave-effect wave-effect-x"href=javascript:void(0); data-bs-toggle=tooltip data-original-title="Change Layout"data-placement=right><span><i class="fa fa-cog fa-spin"></i><a class=sidebar-close-trigger href=javascript:void(0);><span><i class="la-times las"></i></span></a><div class=sidebar-right-inner><h4>Pick your style<a class="btn btn-primary btn-sm pull-right"href=javascript:void(0); onclick=deleteAllCookie()>Delete All Cookie</a></h4><div class=card-tabs><ul class="nav nav-tabs"role=tablist><li class=nav-item><a class="nav-link active"href=#tab1 data-bs-toggle=tab>Theme</a><li class=nav-item><a class=nav-link href=#tab2 data-bs-toggle=tab>Header</a><li class=nav-item><a class=nav-link href=#tab3 data-bs-toggle=tab>Content</a></ul></div><div class="tab-content tab-content-default tabcontent-border"><div class="fade tab-pane active show"id=tab1><div class=admin-settings><div class=row><div class=col-sm-12><p>Background</p><select class="default-select form-control wide"id=theme_version name=theme_version><option value="disabled selected hidden">Choose Mode<option value=light>Light<option value=dark>Dark</select></div><div class=col-sm-6><p>Primary Color<div><span data-bs-toggle=tooltip data-placement=top title="Color 1"><input class="chk-col-primary filled-in"id=primary_color_1 name=primary_bg type=radio value=color_1><label for=primary_color_1 class=bg-label-pattern></label></span><span><input class="chk-col-primary filled-in"id=primary_color_2 name=primary_bg type=radio value=color_2><label for=primary_color_2></label></span><span><input class="chk-col-primary filled-in"id=primary_color_3 name=primary_bg type=radio value=color_3><label for=primary_color_3></label></span><span><input class="chk-col-primary filled-in"id=primary_color_4 name=primary_bg type=radio value=color_4><label for=primary_color_4></label></span><span><input class="chk-col-primary filled-in"id=primary_color_5 name=primary_bg type=radio value=color_5><label for=primary_color_5></label></span><span><input class="chk-col-primary filled-in"id=primary_color_6 name=primary_bg type=radio value=color_6><label for=primary_color_6></label></span><span><input class="chk-col-primary filled-in"id=primary_color_7 name=primary_bg type=radio value=color_7><label for=primary_color_7></label></span><span><input class="chk-col-primary filled-in"id=primary_color_9 name=primary_bg type=radio value=color_9><label for=primary_color_9></label></span><span><input class="chk-col-primary filled-in"id=primary_color_10 name=primary_bg type=radio value=color_10><label for=primary_color_10></label></span><span><input class="chk-col-primary filled-in"id=primary_color_11 name=primary_bg type=radio value=color_11><label for=primary_color_11></label></span><span><input class="chk-col-primary filled-in"id=primary_color_12 name=primary_bg type=radio value=color_12><label for=primary_color_12></label></span><span><input class="chk-col-primary filled-in"id=primary_color_13 name=primary_bg type=radio value=color_13><label for=primary_color_13></label></span><span><input class="chk-col-primary filled-in"id=primary_color_14 name=primary_bg type=radio value=color_14><label for=primary_color_14></label></span><span><input class="chk-col-primary filled-in"id=primary_color_15 name=primary_bg type=radio value=color_15><label for=primary_color_15></label></span></div></div><div class=col-sm-6><p>Navigation Header<div><span><input class="chk-col-primary filled-in"id=nav_header_color_1 name=navigation_header type=radio value=color_1><label for=nav_header_color_1 class=bg-label-pattern></label></span><span><input class="chk-col-primary filled-in"id=nav_header_color_2 name=navigation_header type=radio value=color_2><label for=nav_header_color_2></label></span><span><input class="chk-col-primary filled-in"id=nav_header_color_3 name=navigation_header type=radio value=color_3><label for=nav_header_color_3></label></span><span><input class="chk-col-primary filled-in"id=nav_header_color_4 name=navigation_header type=radio value=color_4><label for=nav_header_color_4></label></span><span><input class="chk-col-primary filled-in"id=nav_header_color_5 name=navigation_header type=radio value=color_5><label for=nav_header_color_5></label></span><span><input class="chk-col-primary filled-in"id=nav_header_color_6 name=navigation_header type=radio value=color_6><label for=nav_header_color_6></label></span><span><input class="chk-col-primary filled-in"id=nav_header_color_7 name=navigation_header type=radio value=color_7><label for=nav_header_color_7></label></span><span><input class="chk-col-primary filled-in"id=nav_header_color_8 name=navigation_header type=radio value=color_8><label for=nav_header_color_8></label></span><span><input class="chk-col-primary filled-in"id=nav_header_color_9 name=navigation_header type=radio value=color_9><label for=nav_header_color_9></label></span><span><input class="chk-col-primary filled-in"id=nav_header_color_10 name=navigation_header type=radio value=color_10><label for=nav_header_color_10></label></span><span><input class="chk-col-primary filled-in"id=nav_header_color_11 name=navigation_header type=radio value=color_11><label for=nav_header_color_11></label></span><span><input class="chk-col-primary filled-in"id=nav_header_color_12 name=navigation_header type=radio value=color_12><label for=nav_header_color_12></label></span><span><input class="chk-col-primary filled-in"id=nav_header_color_13 name=navigation_header type=radio value=color_13><label for=nav_header_color_13></label></span><span><input class="chk-col-primary filled-in"id=nav_header_color_14 name=navigation_header type=radio value=color_14><label for=nav_header_color_14></label></span><span><input class="chk-col-primary filled-in"id=nav_header_color_15 name=navigation_header type=radio value=color_15><label for=nav_header_color_15></label></span></div></div><div class=col-sm-6><p>Header<div><span><input class="chk-col-primary filled-in"id=header_color_1 name=header_bg type=radio value=color_1><label for=header_color_1 class=bg-label-pattern></label></span><span><input class="chk-col-primary filled-in"id=header_color_2 name=header_bg type=radio value=color_2><label for=header_color_2></label></span><span><input class="chk-col-primary filled-in"id=header_color_3 name=header_bg type=radio value=color_3><label for=header_color_3></label></span><span><input class="chk-col-primary filled-in"id=header_color_4 name=header_bg type=radio value=color_4><label for=header_color_4></label></span><span><input class="chk-col-primary filled-in"id=header_color_5 name=header_bg type=radio value=color_5><label for=header_color_5></label></span><span><input class="chk-col-primary filled-in"id=header_color_6 name=header_bg type=radio value=color_6><label for=header_color_6></label></span><span><input class="chk-col-primary filled-in"id=header_color_7 name=header_bg type=radio value=color_7><label for=header_color_7></label></span><span><input class="chk-col-primary filled-in"id=header_color_8 name=header_bg type=radio value=color_8><label for=header_color_8></label></span><span><input class="chk-col-primary filled-in"id=header_color_9 name=header_bg type=radio value=color_9><label for=header_color_9></label></span><span><input class="chk-col-primary filled-in"id=header_color_10 name=header_bg type=radio value=color_10><label for=header_color_10></label></span><span><input class="chk-col-primary filled-in"id=header_color_11 name=header_bg type=radio value=color_11><label for=header_color_11></label></span><span><input class="chk-col-primary filled-in"id=header_color_12 name=header_bg type=radio value=color_12><label for=header_color_12></label></span><span><input class="chk-col-primary filled-in"id=header_color_13 name=header_bg type=radio value=color_13><label for=header_color_13></label></span><span><input class="chk-col-primary filled-in"id=header_color_14 name=header_bg type=radio value=color_14><label for=header_color_14></label></span><span><input class="chk-col-primary filled-in"id=header_color_15 name=header_bg type=radio value=color_15><label for=header_color_15></label></span></div></div><div class=col-sm-6><p>Sidebar<div><span><input class="chk-col-primary filled-in"id=sidebar_color_1 name=sidebar_bg type=radio value=color_1><label for=sidebar_color_1 class=bg-label-pattern></label></span><span><input class="chk-col-primary filled-in"id=sidebar_color_2 name=sidebar_bg type=radio value=color_2><label for=sidebar_color_2></label></span><span><input class="chk-col-primary filled-in"id=sidebar_color_3 name=sidebar_bg type=radio value=color_3><label for=sidebar_color_3></label></span><span><input class="chk-col-primary filled-in"id=sidebar_color_4 name=sidebar_bg type=radio value=color_4><label for=sidebar_color_4></label></span><span><input class="chk-col-primary filled-in"id=sidebar_color_5 name=sidebar_bg type=radio value=color_5><label for=sidebar_color_5></label></span><span><input class="chk-col-primary filled-in"id=sidebar_color_6 name=sidebar_bg type=radio value=color_6><label for=sidebar_color_6></label></span><span><input class="chk-col-primary filled-in"id=sidebar_color_7 name=sidebar_bg type=radio value=color_7><label for=sidebar_color_7></label></span><span><input class="chk-col-primary filled-in"id=sidebar_color_8 name=sidebar_bg type=radio value=color_8><label for=sidebar_color_8></label></span><span><input class="chk-col-primary filled-in"id=sidebar_color_9 name=sidebar_bg type=radio value=color_9><label for=sidebar_color_9></label></span><span><input class="chk-col-primary filled-in"id=sidebar_color_10 name=sidebar_bg type=radio value=color_10><label for=sidebar_color_10></label></span><span><input class="chk-col-primary filled-in"id=sidebar_color_11 name=sidebar_bg type=radio value=color_11><label for=sidebar_color_11></label></span><span><input class="chk-col-primary filled-in"id=sidebar_color_12 name=sidebar_bg type=radio value=color_12><label for=sidebar_color_12></label></span><span><input class="chk-col-primary filled-in"id=sidebar_color_13 name=sidebar_bg type=radio value=color_13><label for=sidebar_color_13></label></span><span><input class="chk-col-primary filled-in"id=sidebar_color_14 name=sidebar_bg type=radio value=color_14><label for=sidebar_color_14></label></span><span><input class="chk-col-primary filled-in"id=sidebar_color_15 name=sidebar_bg type=radio value=color_15><label for=sidebar_color_15></label></span></div></div></div></div></div><div class="fade tab-pane"id=tab2><div class=admin-settings><div class=row><div class=col-sm-6><p>Layout</p><select class="default-select form-control wide"id=theme_layout name=theme_layout><option value="disabled selected hidden">Choose Layout<option value=vertical>Vertical<option value=horizontal>Horizontal</select></div><div class=col-sm-6><p>Header position</p><select class="default-select form-control wide"id=header_position name=header_position><option value="disabled selected hidden">Choose Header Positon<option value=static>Static<option value=fixed>Fixed</select></div><div class=col-sm-6><p>Sidebar</p><select class="default-select form-control wide"id=sidebar_style name=sidebar_style><option value="disabled selected hidden">Choose Sidebar<option value=full>Full<option value=mini>Mini<option value=compact>Compact<option value=modern>Modern<option value=overlay>Overlay<option value=icon-hover>Icon-hover</select></div><div class=col-sm-6><p>Sidebar position</p><select class="default-select form-control wide"id=sidebar_position name=sidebar_position><option value="disabled selected hidden">Choose Sidebar Position<option value=static>Static<option value=fixed>Fixed</select></div></div></div></div><div class="fade tab-pane"id=tab3><div class=admin-settings><div class=row><div class=col-sm-12><p>Body Font</p><select class="default-select form-control wide"id=typography name=typography><option value="disabled selected hidden">Choose Font<option value=roboto>Roboto<option value=poppins>Poppins<option value=opensans>Open Sans</select></div></div></div></div></div><div class=note-text><span class=text-danger>*Note :</span>This theme switcher is not part of product. It is only for demo. you will get all guideline in documentation. please check <a class="doc text-primary"href=../doc/index.html target=_blank>documentation.</a></div></div></div>';


    var demoPanel = '<div class=ic-demo-panel><div class=bg-close></div><a class=ic-demo-trigger href=javascript:void(0) data-bs-toggle=tooltip data-original-title="Check out more demos"data-placement=right><span><i class="las la-tint"></i></span></a><div class=ic-demo-inner><a class="btn btn-sm btn-primary mb-3 px-2 py-1"href=javascript:void(0); onclick=deleteAllCookie()>Delete All Cookie</a><div class=ic-demo-header><h3 class=text-white>Select Preset Demo</h3><a class=ic-demo-close href=javascript:void(0)><span><i class="las la-times"></i></span></a></div><div class=ic-demo-content><div class="ic-wrapper row"><div class="col-md-6 col-xl-4 mb-4"><div class="ic-demo-bx overlay-bx"><div class=overlay-wrapper><img alt=""class=w-100 src=assets/images/demo/pic1.jpg></div><div class=overlay-layer><a class="btn btn-sm btn-secondary ic_theme_demo me-2"href=javascript:void(0); data-theme=1>Default</a></div></div><h5 class=text-white>Demo 1</h5></div><div class="col-md-6 col-xl-4 mb-4"><div class="ic-demo-bx overlay-bx"><div class=overlay-wrapper><img alt=""class=w-100 src=assets/images/demo/pic2.jpg></div><div class=overlay-layer><a class="btn btn-sm btn-secondary ic_theme_demo me-2"href=javascript:void(0); data-theme=2>Default</a></div></div><h5 class=text-white>Demo 2</h5></div><div class="col-md-6 col-xl-4 mb-4"><div class="ic-demo-bx overlay-bx"><div class=overlay-wrapper><img alt=""class=w-100 src=assets/images/demo/pic3.jpg></div><div class=overlay-layer><a class="btn btn-sm btn-secondary ic_theme_demo me-2"href=javascript:void(0); data-theme=3>Default</a></div></div><h5 class=text-white>Demo 3</h5></div><div class="col-md-6 col-xl-4 mb-4"><div class="ic-demo-bx overlay-bx"><div class=overlay-wrapper><img alt=""class=w-100 src=assets/images/demo/pic4.jpg></div><div class=overlay-layer><a class="btn btn-sm btn-secondary ic_theme_demo me-2"href=javascript:void(0); data-theme=4>Default</a></div></div><h5 class=text-white>Demo 4</h5></div><div class="col-md-6 col-xl-4 mb-4"><div class="ic-demo-bx overlay-bx"><div class=overlay-wrapper><img alt=""class=w-100 src=assets/images/demo/pic5.jpg></div><div class=overlay-layer><a class="btn btn-sm btn-secondary ic_theme_demo me-2"href=javascript:void(0); data-theme=5>Default</a></div></div><h5 class=text-white>Demo 5</h5></div><div class="col-md-6 col-xl-4 mb-4"><div class="ic-demo-bx overlay-bx"><div class=overlay-wrapper><img alt=""class=w-100 src=assets/images/demo/pic6.jpg></div><div class=overlay-layer><a class="btn btn-sm btn-secondary ic_theme_demo me-2"href=javascript:void(0); data-theme=6>Default</a></div></div><h5 class=text-white>Demo 6</h5></div></div></div><div class="fs-14 pt-3"><span class=text-danger>*Note :</span>This theme switcher is not part of product. It is only for demo. you will get all guideline in documentation. please check <a class=text-secondary href=../doc/index.html target=_blank>documentation.</a></div></div></div>';

    if ($("#icSwitcher").length == 0) {
        jQuery('body').append(icSwitcher + demoPanel);




        $('.sidebar-right-trigger').on('click', function () {
            $('.sidebar-right').toggleClass('show');
        });
        $('.sidebar-close-trigger,.bg-overlay').on('click', function () {
            $('.sidebar-right').removeClass('show');
        });
    }
}

(function ($) {
    "use strict"
    addSwitcher();


    const body = $('body');
    const html = $('html');

    //get the DOM elements from right sidebar
    const typographySelect = $('#typography');
    const versionSelect = $('#theme_version');
    const layoutSelect = $('#theme_layout');
    const sidebarStyleSelect = $('#sidebar_style');
    const sidebarPositionSelect = $('#sidebar_position');
    const headerPositionSelect = $('#header_position');
    const containerLayoutSelect = $('#container_layout');
    const themeDirectionSelect = $('#theme_direction');

    //change the theme typography controller
    typographySelect.on('change', function () {
        body.attr('data-typography', this.value);

        setCookie('typography', this.value);
    });

    //change the theme version controller
    versionSelect.on('change', function () {
        body.attr('data-theme-version', this.value);

        if (this.value === 'dark') {
            $('.ic-theme-mode').addClass('active')
        } else {
            $('.ic-theme-mode').removeClass('active')

        }

        setCookie('version', this.value);
    });




    //change the sidebar position controller
    sidebarPositionSelect.on('change', function () {
        this.value === "fixed" && body.attr('data-sidebar-style') === "modern" && body.attr('data-layout') === "vertical" ?
            alert("Sorry, Modern sidebar layout dosen't support fixed position!") :
            body.attr('data-sidebar-position', this.value);
        setCookie('sidebarPosition', this.value);
    });

    //change the header position controller
    headerPositionSelect.on('change', function () {
        body.attr('data-header-position', this.value);
        setCookie('headerPosition', this.value);
    });

    //change the theme direction (rtl, ltr) controller
    themeDirectionSelect.on('change', function () {
        html.attr('dir', this.value);
        html.attr('class', '');
        html.addClass(this.value);
        if (this.value == 'rtl') {
            jQuery('.main-css').attr('href', 'css/style-rtl.css');
        } else {
            jQuery('.main-css').attr('href', 'css/style.css');
        }
        body.attr('direction', this.value);
        setCookie('direction', this.value);
    });

    //change the theme layout controller
    layoutSelect.on('change', function () {
        if (body.attr('data-sidebar-style') === 'overlay') {
            body.attr('data-sidebar-style', 'full');
            body.attr('data-layout', this.value);
            return;
        }

        body.attr('data-layout', this.value);
        setCookie('layout', this.value);

        setTimeout(function () {
            $(window).trigger('resize');
        }, 200);
    });

    //change the container layout controller
    containerLayoutSelect.on('change', function () {
        if (this.value === "boxed") {

            if (body.attr('data-layout') === "vertical" && body.attr('data-sidebar-style') === "full") {
                body.attr('data-sidebar-style', 'overlay');
                body.attr('data-container', this.value);

                setTimeout(function () {
                    $(window).trigger('resize');
                }, 200);

                return;
            }


        }

        body.attr('data-container', this.value);
        setCookie('containerLayout', this.value);
    });

    //change the sidebar style controller
    sidebarStyleSelect.on('change', function () {
        if (body.attr('data-layout') === "horizontal") {
            if (this.value === "overlay") {
                alert("Sorry! Overlay is not possible in Horizontal layout.");
                return;
            }
        }

        if (body.attr('data-layout') === "vertical") {
            if (body.attr('data-container') === "boxed" && this.value === "full") {
                alert("Sorry! Full menu is not available in Vertical Boxed layout.");
                return;
            }

            if (this.value === "modern" && body.attr('data-sidebar-position') === "fixed") {
                alert("Sorry! Modern sidebar layout is not available in the fixed position. Please change the sidebar position into Static.");
                return;
            }
        }

        body.attr('data-sidebar-style', this.value);

        if (body.attr('data-sidebar-style') === 'icon-hover') {
            $('.ic-sidenav').hover(function () {
                $('#main-wrapper').addClass('iconhover-toggle');
            }, function () {
                $('#main-wrapper').removeClass('iconhover-toggle');
            });
        }

        setCookie('sidebarStyle', this.value);

        setTimeout(function () {
            $(window).trigger('resize');
        }, 200);

    });



    /* jQuery("#nav_header_color_1").on('click',function(){
        jQuery(".nav-header .logo-abbr").attr("src", "./images/logo.png");
        setCookie('logo_src', './images/logo.png');
        return false;
    }); */

    /* jQuery("#sidebar_color_2, #sidebar_color_3, #sidebar_color_4, #sidebar_color_5, #sidebar_color_6, #sidebar_color_7, #sidebar_color_8, #sidebar_color_9, #sidebar_color_10, #sidebar_color_11, #sidebar_color_12, #sidebar_color_13, #sidebar_color_14, #sidebar_color_15").on('click',function(){
        jQuery(".nav-header .logo-abbr").attr("src", "./images/logo-white.png");
        jQuery(".nav-header .brand-title").attr("src", "./images/logo-text-white.png");
        setCookie('logo_src', './images/logo-white.png');
        return false;
    }); */

    /* jQuery("#nav_header_color_3").on('click',function(){
        jQuery(".nav-header .logo-abbr").attr("src", "./images/logo-white.png");
        setCookie('logo_src', './images/logo-white.png');
        return false;
    }); */


    //change the nav-header background controller
    $('input[name="navigation_header"]').on('click', function () {
        body.attr('data-nav-headerbg', this.value);
        setCookie('navheaderBg', this.value);
    });

    //change the header background controller
    $('input[name="header_bg"]').on('click', function () {
        body.attr('data-headerbg', this.value);
        setCookie('headerBg', this.value);
    });

    //change the sidebar background controller
    $('input[name="sidebar_bg"]').on('click', function () {
        body.attr('data-sibebarbg', this.value);
        setCookie('sidebarBg', this.value);
    });

    //change the primary color controller
    $('input[name="primary_bg"]').on('click', function () {
        body.attr('data-primary', this.value);
        setCookie('primary', this.value);
    });



})(jQuery);


