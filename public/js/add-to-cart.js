$(document).ready(function () {
    $('#material [class="btn btn-default add-to-cart"]').click(function (event) {
        var formData = new FormData();
        _GET = getUrlVar();
        formData.append("productID", _GET["productID"]);
        formData.append("facade", _GET["facade"]);
        formData.append("materialID", $(this)[0].id);
        $.ajax({
            type: "POST",
            cache: false,
            processData: false,
            contentType: false,
            data: formData,
            url: `/api/productAddmaterial`,
            success: function () {
                $(location).attr("href", "/cart");
            },
        });
        return false;
    });

    $('#product [class="btn btn-default add-to-cart"]').click(function (event) {
        var formData = new FormData();
        id = $(this)[0].id;
        formData.append("productID", id);
        $.ajax({
            type: "POST",
            cache: false,
            processData: false,
            contentType: false,
            data: formData,
            url: `/api/productAdd`,
        });
        $(`#product a[id="${id}"]`).text("Добавлено!");
        return false;
    });
});
