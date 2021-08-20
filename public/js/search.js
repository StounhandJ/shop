$(document).ready(function () {
    $("#search").focus(function () {
        $("#search").on("input", function () {
            $(".search-dropdown-content").slideDown();
            var formData = new FormData();
            formData.append("p_title", $(this)[0].value);
            $.ajax({
                type: "GET",
                cache: false,
                processData: false,
                contentType: false,
                data: formData,
                url: "/search/products",
                success: function (data) {
                    data["products"].forEach((item) => {
                        console.log(item);
                        $(".search-dropdown-content").append(
                            `<a href="#about" class="search-product-link">${item.title}</a>`
                        );
                    });
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
