
// total price
function totalPrice(promocode) {
    price = 0;
    $("tbody span.price").each((id, item_price) => {
        price += parseInt(item_price.innerHTML);
    });
    if ($(".final-price .int span").length > 0) {
        $(".final-price .int span")[0].innerHTML = price;
        if (promocode) {
            $(".final-price .int span")[0].innerHTML = `${price} - ${promocode}% = ${price-(price/100*promocode)}`;
        }
    }
} 
// total price
$(document).ready(function () {
    totalPrice();

    $("#promocode-btn").click(function () {
        var promoCode = $(this).siblings("#promocode")[0];
        var fd = new FormData();
        fd.append("_method", "POST");
        fd.append("name", promoCode.value);
        $.ajax({
            type: "POST",
            cache: false,
            processData: false,
            contentType: false,
            data: fd,
            url: "/action/searchPromoCode",
            success: function (data) {
                totalPrice(data);
            },
            error: function (data) {
                alert("Промокод недействителен")
                totalPrice();
            },
        });
    });

    $(".cart_quantity_delete").click(function () {
        var parent = $(this).parent().parent();
        $.ajax({
            data: { p_id: $(this)[0].id },
            type: "POST",
            url: "/action/cart/del",
            success: function (data) {
                parent.remove();
                totalPrice();
                $(".count-products-in-cart")[0].innerHTML = data["cart"].length;
            },
            error: function (data) {
                if (data.status == 404) {
                    alert("Ошибка");
                } else if (data.status == 500) {
                    alert("Написать Роме");
                }
            },
        });
        return false;
    });
    $("form").submit(function () {
        var data = {};
        $(this)
            .serializeArray()
            .forEach((item) => {
                data[item.name] = item.value;
            });
        data["delivery"] = $("input[name=delivery]:checked")[0].id;
        $.ajax({
            type: "POST",
            data: data,
            url: "/action/cart/send",
            success: function () {
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
        });
        return false;
    });
});
