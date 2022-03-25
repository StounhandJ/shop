$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$.ajax({
    type: "POST",
    cache: false,
    processData: false,
    contentType: false,
    url: "/action/cart/info",
    success: function (data) {
        update(data["cart"]);
    },
    error: function () {
        console.log("Ошибка");
    },
});
$(document).ready(function () {
    $(".add-to-cart:first-child").click(function () {
        var fd = new FormData();
        var productID = $(this)[0].id;
        fd.append("p_id", productID);
        $.ajax({
            type: "POST",
            cache: false,
            processData: false,
            contentType: false,
            data: fd,
            url: "/action/cart/add",
            success: function (data) {
                update(data["cart"]);
            },
            error: function () {
                console.log("Ошибка");
            },
        });
        return false;
    });
    $(".btn-cart-p-d").click(function () {
        var fd = new FormData();
        var productID = $(this)[0].id;
        fd.append("p_id", productID);
        $.ajax({
            type: "POST",
            cache: false,
            processData: false,
            contentType: false,
            data: fd,
            url: "/action/cart/add",
            success: function (data) {
                $(".btn-cart-p-d")[0].innerHTML =
                    '<i class="fa fa-check-circle"></i>Добавлено в корзину';
                update(data["cart"]);
            },
            error: function () {
                console.log("Ошибка");
            },
        });
        return false;
    });

    $("#footer-callback").click(function () {
        var fd = new FormData();
        fd.append("phone", $("#footer-callback-input")[0].value);
        $.ajax({
            type: "POST",
            cache: false,
            processData: false,
            contentType: false,
            data: fd,
            url: "/action/callback-form",
            success: function (data) {
                $("body").addClass("modal__visible");
                $(".popup").addClass("modal__active");
                $("body").keydown(function (e) {
                    if (e.code == "Escape") {
                        $(".popup").removeClass("modal__active");
                        $("body").removeClass("modal__visible");
                    };
                });
                $(".popup__close").click(function () {
                    $(".popup").removeClass("modal__active");
                    $("body").removeClass("modal__visible");
                });
            },
            error: function () {
                console.log("Ошибка");
            },
        });
        return false;
    });
});

function update(cart) {
    $(".count-products-in-cart")[0].innerHTML = cart.length;
    cart.forEach((id) => {
        var element = $(`#${id.i}>.fa-shopping-cart`);
        if (element) {
            $(`button#${id.i}`).addClass("link-disabled");
            if (window.location.href.split("p/")[1]) {
                element.parent().html(`<i class="fa fa-check-circle"></i> Добавлено в корзину`);
            } else {
                element.parent().html(`<i class="fa fa-check-circle"></i>`);
            }
            element.removeClass("fa-shopping-cart");
        }
    });
}
