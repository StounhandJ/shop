$(document).ready(function () {
    $(".search-icons>button").hide();
    $(".search-icons>button").click(function () {
        $("#search")[0].value = '';
        $(this).hide();
    });
    $("#search").focus(function () {
        $("#search").on("input", function () {
            $(".search-dropdown-content").slideDown();
            if ($(this)[0].value != '') {
                $(".search-icons>button").show();
            }
            else {
                $(".search-icons>button").hide();
            }
            $.ajax({
                type: "GET",
                cache: false,
                data: {
                    'p_title': $(this)[0].value
                },
                url: "/action/search/products",
                success: function (data) {
                    $("a.search-product-link").remove();
                    data["products"].forEach((item) => {
                        $(".search-dropdown-content").append(
                            `<a href="${item.url}" class="search-product-link">${item.title}</a>`
                        );
                    });
                    if (data['products'].length == 0) {
                        $(".search-dropdown-content").append(
                            `<a class="search-product-link">Товары не найдено</a>`
                        );
                    }
                },
                error: function () {
                    console.log("Ошибка");
                },
            });
        });
    });
    $("#search").focusout(function () {
        $(".search-dropdown-content").slideUp();
    });
});
