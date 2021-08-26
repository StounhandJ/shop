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
    data: formData,
    url: "/action/cart/info",
    success: function (data) {
        // console.log("Данные обновлены");
        update(data["cart"]);
    },
    error: function () {
        console.log("Ошибка");
    },
});
$(document).ready(function () {
    $(".add-to-cart ~ .add-to-cart").click(function () {
        var formData = new FormData();
        var productID = $(this)[0].id;
        formData.append("p_id", productID);
        $.ajax({
            type: "POST",
            cache: false,
            processData: false,
            contentType: false,
            data: formData,
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
