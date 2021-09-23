/*price range*/

$("#sl2").slider();

var RGBChange = function () {
    $("#RGB").css(
        "background",
        "rgb(" + r.getValue() + "," + g.getValue() + "," + b.getValue() + ")"
    );
};

function sort(by) {
    var currentUrl = $(location).attr("href");
    window.history.pushState(null, null, currentUrl + "?" + by);
}

function updateURLParameter(url, param, paramVal) {
    var newAdditionalURL = "";
    var tempArray = url.split("?");
    var baseURL = tempArray[0];
    var additionalURL = tempArray[1];
    var temp = "";
    if (additionalURL) {
        tempArray = additionalURL.split("&");
        for (var i = 0; i < tempArray.length; i++) {
            if (tempArray[i].split("=")[0] != param) {
                newAdditionalURL += temp + tempArray[i];
                temp = "&";
            }
        }
    }
    var rows_txt = temp + "" + param + "=" + paramVal;
    return baseURL + "?" + newAdditionalURL + rows_txt;
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
    $("#filter-price").click(function () {
        minmax = $("#sl2")[0].value.split(",");

        var newURL = updateURLParameter(
            window.location.href,
            "mip",
            minmax[0]
        );

        window.history.replaceState(
            "",
            "",
            updateURLParameter(window.location.href, "map", minmax[1])
        );
    });
    $("#filter-popular").click(function () {
        // $("#filter-popular").css({ color: "#FE980F", "font-weight": "500" });
        window.history.replaceState(
            "",
            "",
            updateURLParameter(window.location.href, "popular", 1)
        );
    });
    $("#filter-Az").click(function () {
        // sort("");
        // $("#filter-popular").css({"color":"#FE980F", "font-weight": "500",})
    });
});
