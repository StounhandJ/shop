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
                console.log("Добавлено в корзину");
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
                console.log("Добавлено в корзину");
                $(".btn-cart-p-d")[0].innerHTML = "<i class=\"fa fa-check-circle\"></i>Добавлено в корзину";
                update(data["cart"]);
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
        var element = $(`#${id}>.fa-shopping-cart`);
        if (element) {
            element.addClass("fa-check-circle").removeClass("fa-shopping-cart");
            $(`button#${id}`).addClass("link-disabled");
        }
    });
}
