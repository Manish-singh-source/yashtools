"use strict";
var direction = getUrlParams("dir");
var theme = getUrlParams("theme");
var themeOptionArr = {
  typography: "",
  version: "",
  layout: "",
  primary: "",
  headerBg: "",
  navheaderBg: "",
  sidebarBg: "",
  sidebarStyle: "",
  sidebarPosition: "",
  headerPosition: "",
  containerLayout: "",
  direction: "ltr",
};

(function ($) {
  "use strict";

  //var direction =  getUrlParams('dir');
  var theme = getUrlParams("theme");

  /* Dz Theme Demo Settings  */

  var icThemeSet0 = {
    /* Default Theme */ typography: "poppins",
    version: "light",
    layout: "vertical",
    primary: "color_1",
    headerBg: "color_1",
    navheaderBg: "color_1",
    sidebarBg: "color_1",
    sidebarStyle: "full",
    sidebarPosition: "fixed",
    headerPosition: "fixed",
    containerLayout: "wide",
    direction: "ltr",
  };

  var icThemeSet1 = {
    typography: "poppins",
    version: "light",
    layout: "vertical",
    primary: "color_1",
    headerBg: "color_1",
    navheaderBg: "color_1",
    sidebarBg: "color_1",
    sidebarStyle: "full",
    sidebarPosition: "fixed",
    headerPosition: "fixed",
    containerLayout: "wide",
    direction: "ltr",
  };

  var icThemeSet2 = {
    typography: "poppins",
    version: "light",
    layout: "horizontal",
    primary: "color_1",
    headerBg: "color_1",
    navheaderBg: "color_1",
    sidebarBg: "color_3",
    sidebarStyle: "modern",
    sidebarPosition: "fixed",
    headerPosition: "fixed",
    containerLayout: "wide",
    direction: "ltr",
  };

  var icThemeSet3 = {
    typography: "poppins",
    version: "light",
    layout: "vertical",
    primary: "color_10",
    headerBg: "color_10",
    navheaderBg: "color_1",
    sidebarBg: "color_1",
    sidebarStyle: "compact",
    sidebarPosition: "fixed",
    headerPosition: "fixed",
    containerLayout: "wide",
    direction: "ltr",
  };

  var icThemeSet4 = {
    typography: "poppins",
    version: "light",
    layout: "vertical",
    primary: "color_15",
    headerBg: "color_1",
    navheaderBg: "color_1",
    sidebarBg: "color_15",
    sidebarStyle: "modern",
    sidebarPosition: "fixed",
    headerPosition: "fixed",
    containerLayout: "wide",
    direction: "ltr",
  };

  var icThemeSet5 = {
    typography: "poppins",
    version: "light",
    layout: "vertical",
    primary: "color_13",
    headerBg: "color_1",
    navheaderBg: "color_13",
    sidebarBg: "color_13",
    sidebarStyle: "icon-hover",
    sidebarPosition: "fixed",
    headerPosition: "fixed",
    containerLayout: "wide",
    direction: "ltr",
  };
  var icThemeSet6 = {
    typography: "poppins",
    version: "light",
    layout: "horizontal",
    primary: "color_1",
    headerBg: "color_12",
    navheaderBg: "color_12",
    sidebarBg: "color_1",
    sidebarStyle: "full",
    sidebarPosition: "fixed",
    headerPosition: "fixed",
    containerLayout: "wide",
    direction: "ltr",
  };

  function themeChange(theme) {
    var themeSettings = {};
    themeSettings = eval("icThemeSet" + theme);
    icSettingsOptions = themeSettings; /* For Screen Resize */
    new icSettings(themeSettings);

    setThemeInCookie(themeSettings);
  }

  function setThemeInCookie(themeSettings) {
    jQuery.each(themeSettings, function (optionKey, optionValue) {
      setCookie(optionKey, optionValue);
    });
  }

  function setThemeLogo() {
    var logo = getCookie("logo_src");

    var logo2 = getCookie("logo_src2");

    if (logo != "") {
      jQuery(".nav-header .logo-abbr").attr("src", logo);
    }

    if (logo2 != "") {
      jQuery(".nav-header .logo-compact, .nav-header .brand-title").attr("src", logo2);
    }
  }

  function setThemeOptionOnPage() {
    if (getCookie("version") != "") {
      jQuery.each(themeOptionArr, function (optionKey, optionValue) {
        var optionData = getCookie(optionKey);
        themeOptionArr[optionKey] = optionData != "" ? optionData : icSettingsOptions[optionKey];
      });

      icSettingsOptions = themeOptionArr;
      new icSettings(icSettingsOptions);

      setThemeLogo();
    }
  }

  /*  set switcher option start  */
  function getElementAttrs(el) {
    return [].slice.call(el.attributes).map((attr) => {
      return {
        name: attr.name,
        value: attr.value,
      };
    });
  }

  function handleSetThemeOption(item, index, arr) {
    var attrName = item.name.replace("data-", "").replace("-", "_");

    if (attrName === "sidebarbg" || attrName === "primary" || attrName === "headerbg" || attrName === "nav_headerbg") {
      if (item.value === "color_1") {
        return false;
      }
      var attrNameColor = attrName.replace("bg", "");
      document.getElementById(attrNameColor + "_" + item.value).checked = true;
    } else if (attrName === "navigationbarimg") {
      document.getElementById("sidebar_img_" + item.value.split("sidebar-img/")[1].split(".")[0]).checked = true;
    } else if (attrName === "sidebartext") {
      document.getElementById("sidebar_text_" + item.value).checked = true;
    } else if (attrName === "direction" || attrName === "nav_headerbg" || attrName === "headerbg") {
      //document.getElementById("theme_direction").value = item.value;
    } else if (attrName === "sidebar_style" || attrName === "sidebar_position" || attrName === "header_position" || attrName === "typography" || attrName === "theme_version") {
      if (item.value === "cairo" || item.value === "full" || item.value === "fixed" || item.value === "light") {
        return false;
      }
      document.getElementById(attrName).value = item.value;
    } else if (attrName === "layout") {
      if (item.value === "vertical") {
        return false;
      }
      document.getElementById("theme_layout").value = item.value;
    } else if (attrName === "container") {
      if (item.value === "wide") {
        return false;
      }
      document.getElementById("container_layout").value = item.value;
    }

    $(".default-select").selectpicker("refresh");
  }
  /* / set switcher option end / */

  jQuery(document).on("click", ".ic_theme_demo", function () {
    setTimeout(() => {
      var allAttrs = getElementAttrs(document.querySelector("body"));
      allAttrs.forEach(handleSetThemeOption);
    }, 1500);

    var demoTheme = jQuery(this).data("theme");
    themeChange(demoTheme, "ltr");
    $(".ic-demo-panel").removeClass("show");
    jQuery(".main-css").attr("href", "css/style.css");
  });

  jQuery(document).on("click", ".ic_theme_demo_rtl", function () {
    var demoTheme = jQuery(this).data("theme");
    themeChange(demoTheme, "rtl");
    $(".ic-demo-panel").removeClass("show");
    jQuery(".main-css").attr("href", "css/style-rtl.css");
  });

  jQuery(window).on("load", function () {
    direction = direction != undefined ? direction : "ltr";

    if (getCookie("direction") == "rtl") {
      jQuery(".main-css").attr("href", "css/style-rtl.css");
    }

    if (theme != undefined) {
      if (theme == "rtl") {
        themeChange(0, "rtl");
        jQuery(".main-css").attr("href", "css/style-rtl.css");
      } else {
        themeChange(theme, direction);
      }
    } else if (direction != undefined) {
      if (getCookie("version") == "") {
        themeChange(0, direction);
      }
    }

    setTimeout(() => {
      var allAttrs = getElementAttrs(document.querySelector("body"));
      allAttrs.forEach(handleSetThemeOption);
    }, 1500);

    /* Set Theme On Page From Cookie */
    setThemeOptionOnPage();
  });

  jQuery(window).on("resize", function () {
    setThemeOptionOnPage();
  });
})(jQuery);
