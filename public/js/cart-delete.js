// total price
function totalPrice() { 
    price = 0;
    $("tbody span.price").each((id, item_price) => {
        price += parseInt(item_price.innerHTML);
    });
    $(".final-price .int span")[0].innerHTML = price;
};
// total price
$(document).ready(function () {
    totalPrice();
    $(".cart_quantity_delete").click(function () {
        var parent = $(this).parent().parent();
        $.ajax({
            data: {"p_id":$(this)[0].id},
            type: "POST",
            url: "/action/cart/del/",
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
});
