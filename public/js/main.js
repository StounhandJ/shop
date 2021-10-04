/*price range*/

$("#sl2").slider();

var RGBChange = function () {
    $("#RGB").css(
        "background",
        "rgb(" + r.getValue() + "," + g.getValue() + "," + b.getValue() + ")"
    );
};

const url = new URL(window.location.href.toString());

function updateUrl(param) {
    var currentUrl = window.location.href;
    var clearUrl = currentUrl.split("?");
    if (param) {
        window.history.replaceState("", "", clearUrl[0] + "?" + param);
    } else {
        window.history.replaceState("", "", clearUrl[0]);
    }
    location.reload();
}

function changeFilterIcon() {
    switch (window.location.href.split("?")[1]) {
        case "abc=1":
            $("#filter-Az").addClass("clicked");
            $("#filter-Az").siblings("img").attr('src', '/images/filters/filter-01.svg');
            $("#filter-Az").siblings("img").show();
            console.log("abc=1")
            break;
        case "abc=0":
            $("#filter-Az").siblings("img").attr('src', '/images/filters/filter-10.svg');
            $("#filter-Az").siblings("img").show();
            console.log("abc=0")
            break;
        case "popular=1":
            $("#filter-popular").addClass("clicked");
            $("#filter-popular").siblings("img").attr('src', '/images/filters/filter-01.svg');
            $("#filter-popular").siblings("img").show();
            console.log("popular=1")
            break;
        case "popular=0":
            $("#filter-popular").siblings("img").attr('src', '/images/filters/filter-10.svg');
            $("#filter-popular").siblings("img").show();
            console.log("popular=0")
            break;
        case "price=1":
            $("#filter-price").addClass("clicked");
            $("#filter-price").siblings("img").attr('src', '/images/filters/filter-01.svg');
            $("#filter-price").siblings("img").show();
            console.log("price=1")
            break;
        case "price=0":
            $("#filter-price").siblings("img").attr('src', '/images/filters/filter-10.svg');
            $("#filter-price").siblings("img").show();
            console.log("price=0")
            break;
    }
}

$(document).ready(function () {
    $(function () {
        $(".filter").hide();

        if (window.location.href.split("?")[1]) {
            changeFilterIcon();
        }

        $("#filters-all-input-wrapper").hide();

        $("#filter-price").click(function () {
            $("#filters-all-input-wrapper").slideToggle();
        });

        $("#min-price")[0].value = url.searchParams.get("mip");
        $("#max-price")[0].value = url.searchParams.get("map");

        $("#filter-price-slider").click(function () {
            if (
                $("#min-price")[0].value > 0 &&
                $("#max-price")[0].value < 500000 &&
                $("#min-price")[0].value < $("#max-price")[0].value
            ) {
                minmax = [$("#min-price")[0].value, $("#max-price")[0].value];
                updateUrl(`mip=${minmax[0]}&map=${minmax[1]}`);
            } else {
                $("#price-required").show();
            }
        });

        $("#filter-popular").click(function () {
            if ($(this).hasClass("clicked")) {
                updateUrl(`popular=0`);    
            } else {
                updateUrl(`popular=1`);
                changeFilterIcon($(this));
            };
        });

        $("#filter-Az").click(function () {
            if ($(this).hasClass("clicked")) {
                updateUrl(`abc=0`);    
            } else {
                updateUrl(`abc=1`);
                changeFilterIcon($(this));
            };
        });

        $("#filter-clear").click(function () {
            updateUrl();
        });

        $.scrollUp({
            scrollName: "scrollUp", // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: "top", // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: "linear", // Scroll to top easing (see http://easings.net/)
            animation: "fade", // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            //scrollTarget: false, // Set a custom target element for scrolling to the top
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647, // Z-Index for the overlay
        });
    });
});
