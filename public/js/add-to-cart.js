$(document).ready(function () {
    $(".add-to-cart ~ .add-to-cart").click(function () {
        var formData = new FormData();
        var productID = $(this)[0].id;
        formData.append("p_id", productID);
        formData.append("_token", $("#csrf-token")[0].value);
        $.ajax({
            type: "POST",
            cache: false,
            processData: false,
            contentType: false,
            data: formData,
            url: "/cart/add",
            success: function (data) {
                console.log("Добавлено в корзину");
                $(".count-products-in-cart")[0].innerHTML = data['cart'].length;
                $(`#${productID}>.fa-shopping-cart`).addClass("fa-check-circle").removeClass("fa-shopping-cart");
            },
            error: function () {
                console.log("Ошибка");
            },
        });
        return false;
    });
});
