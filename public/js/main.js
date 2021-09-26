/*price range*/

$("#sl2").slider();

var RGBChange = function () {
    $("#RGB").css(
        "background",
        "rgb(" + r.getValue() + "," + g.getValue() + "," + b.getValue() + ")"
    );
};

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

$(document).ready(function () {
    $(function () {
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
    $("#filters-all-input-wrapper").hide();
    $("#sortByPriceTitle").click(function () {
        $("#filters-all-input-wrapper").slideToggle();
    });
    $("#filter-price").click(function () {
        if ($("#min-price")[0].value > 0 && $("#max-price")[0].value < 500000) {
            minmax = [$("#min-price")[0].value, $("#max-price")[0].value];
            // localStorage.setItem("minValue", JSON.stringify(minmax[0]));
            // localStorage.setItem("maxValue", JSON.stringify(minmax[1]));
            updateUrl(`mip=${minmax[0]}&map=${minmax[1]}`);
            // $("#min-price") = JSON.parse(localStorage.getItem("minValue"));
            // $("#max-price") = JSON.parse(localStorage.getItem("maxValue"));
        } else{
            $("#price-required").show();
        }
    });
    $("#filter-popular").click(function () {
        updateUrl(`popular=1`);
    });
    $("#filter-Az").click(function () {
        // updateUrl(`popular=1`);
    });
    $("#filter-clear").click(function () {
        updateUrl();
    });
});
