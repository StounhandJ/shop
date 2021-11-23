const url = new URL(window.location.href.toString().split("?")[0]);

function updateUrl(param) {
    for (var key in param) {
        url.searchParams.set(key, param[key]);
    }
    window.history.replaceState("", "", url);
    location.reload();
}

function getUrlParams() {
    var params = {};
    if (window.location.href.split("?")[1]) {
        window.location.href
            .split("?")[1]
            .split("&")
            .forEach(function (data) {
                params[data.split("=")[0]] = data.split("=")[1];
            });
    }
    return params;
}

function changeFilterIcon() {
    var urlParams = getUrlParams();

    // abc
    if ("abc" in urlParams) {
        if (urlParams["abc"] == 1) {
            $("#filter-Az")
                .siblings("img")
                .attr("src", "/images/filters/filter-10.svg");
        } else if (urlParams["abc"] == 0) {
            $("#filter-Az").addClass("clicked");
            $("#filter-Az")
                .siblings("img")
                .attr("src", "/images/filters/filter-01.svg");
        }
        $("#filter-Az").siblings("img").show();
    }

    //popular
    if ("popular" in urlParams) {
        if (urlParams["popular"] == 1) {
            $("#filter-popular").addClass("popular-clicked");
        }
    }

    // price
    if ("price" in urlParams) {
        if (urlParams["price"] == 1) {
            $("#filter-price")
                .siblings("img")
                .attr("src", "/images/filters/filter-10.svg");
        } else if (urlParams["price"] == 0) {
            $("#filter-price").addClass("clicked");
            $("#filter-price")
                .siblings("img")
                .attr("src", "/images/filters/filter-01.svg");
        }
        $("#filter-price").siblings("img").show();
    }
}

function clearSortBy(urlParam) {
    delete urlParam["price"];
    delete urlParam["popular"];
    delete urlParam["abc"];
    return urlParam;
}

$(document).ready(function () {
    $(function () {
        $(".filter").hide();

        if (window.location.href.split("?")[1]) {
            changeFilterIcon();
        }

        var urlParams = getUrlParams();

        // $("#min-price")[0].value = urlParams["mip"];
        // $("#max-price")[0].value = urlParams["map"];

        // $("#filter-price-slider").click(function () {
        //     console.log("af");
        //     var minPriceSlider = $("#min-price")[0].value;
        //     var maxPriceSlider = $("#max-price")[0].value;
        //     if (maxPriceSlider == "" || maxPriceSlider > minPriceSlider) {
        //         urlParams["mip"] = minPriceSlider;
        //         urlParams["map"] = maxPriceSlider;
        //         updateUrl(urlParams);
        //     } else {
        //         $("#price-required").show();
        //     }
        // });

        $("#filter-price").click(function () {
            urlParams = clearSortBy(urlParams);
            if (!$(this).hasClass("clicked")) {
                urlParams["price"] = 0;
            } else {
                urlParams["price"] = 1;
            }
            updateUrl(urlParams);
        });

        $("#filter-popular").click(function () {
            urlParams = clearSortBy(urlParams);
            if (!$(this).hasClass("popular-clicked")) {
                urlParams["popular"] = 1;
            } else {
                urlParams["popular"] = 0;
            }
            updateUrl(urlParams);
        });

        $("#filter-Az").click(function () {
            urlParams = clearSortBy(urlParams);
            if (!$(this).hasClass("clicked")) {
                urlParams["abc"] = 0;
            } else {
                urlParams["abc"] = 1;
            }
            updateUrl(urlParams);
        });

        // $("#filter-clear").click(function () {
        //     updateUrl();
        // });

        $.scrollUp({
            scrollName: "scrollUp",
            scrollDistance: 300,
            scrollFrom: "top",
            scrollSpeed: 300,
            easingType: "linear",
            animation: "fade",
            animationSpeed: 200,
            scrollTrigger: false,
            scrollText: '<i class="fa fa-angle-up"></i>',
            scrollTitle: false,
            scrollImg: false,
            activeOverlay: false,
            zIndex: 2147483647,
        });

        // $(".category-mobile").click(function () {
        //     // $("#accordian").slideToggle();
        //     $(this).toggleClass("category-open category-close");
        //     if ($(this).hasClass("category-open")) {
        //         $("#accordian").slideUp();
        //         $(this).children().children().addClass("fa-minus");
        //         $(this).children().children().removeClass("fa-plus");
        //     };
        //     if ($(this).hasClass("category-close")) {
        //         $("#accordian").slideDown();
        //         $(this).children().children().addClass("fa-plus");
        //         $(this).children().children().removeClass("fa-minus");
        //     };
        // });

        $(".filters-checkbox-more").click(function () {
            $(".filters-checkbox-ul").toggleClass("filters-checkbox-open");
            $(".fa-checkbox-arrow").toggleClass("fa-arrow-up fa-arrow-down");
            if ($(".filters-checkbox-more-text").text() == "Ещё") {
                $(".filters-checkbox-more-text").text("Свернуть");
            } else {
                $(".filters-checkbox-more-text").text("Ещё");
            }
        });

        $("#filter-price-slider").click(function () {
            $(".filter-checkbox-self").each((index, element) => {
                if (element.checked == true) {
                    console.log(element);
                    // urlParams["maker"] += element.id;
                    // updateUrl(urlParams);
                }
            });
        });
    });
    
});
