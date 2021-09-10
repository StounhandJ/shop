// $(document).ready(function () {
//     $(".add-to-cart ~ .add-to-cart").click(function () {
//         var fd = new FormData();
//         var productID = $(this)[0].id;
//         fd.append("p_id", productID);
//         $.ajax({
//             type: "POST",
//             cache: false,
//             processData: false,
//             contentType: false,
//             data: fd,
//             url: "/action/cart/del",
//             success: function (data) {
//                 console.log("Добавлено в корзину");
//                 update(data["cart"]);
//             },
//             error: function () {
//                 console.log("Ошибка");
//             },
//         });
//         return false;
//     });
// });