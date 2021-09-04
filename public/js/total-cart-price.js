$(document).ready(function () {
    price = 0;
    $("tbody span.price").each((id, item_price) => {
        price += parseInt(item_price.innerHTML);
        console.log(price);
    });
    $(".final-price .int span")[0].innerHTML = price;
});