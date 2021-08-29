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
    $(".add-to-cart ~ .add-to-cart").click(function () {
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
});

function update(cart) {
    $(".count-products-in-cart")[0].innerHTML = cart.length;
    cart.forEach((id) => {
        var element = $(`#${id}>.fa-shopping-cart`);
        if (element) {
            element.addClass("fa-check-circle").removeClass("fa-shopping-cart");
            $(`#${id}`).addClass("link-disabled");
        }
    });
}
