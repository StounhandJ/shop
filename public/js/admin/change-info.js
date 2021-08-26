$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$(document).ready(function () {
    $(".save-btn").hide();
    $(".add-img-btn").hide();
    $(".change-btn").click(function () {
        $(this).hide();
        $(".change-input").show();
        $(".save-btn").show();
        $(".add-img-btn").show();
    });
    $(".save-btn").click(function () {
        $(this).hide();
        $(".change-input").hide();
        $(".change-btn").show();
        $(".add-img-btn").hide();
    });

    $(".save-btn").click(function () {
        var fd = new FormData();
        fd.append('name', $(this).siblings('.change-input')[0].value);
        fd.append("_method", "PUT");
        span = $(this).siblings('h4').children()[0];
        $.ajax({
            type: "POST",
            cache: false,
            processData: false,
            contentType: false,
            data: fd,
            url: "/43hgf36jfg/maker/" + $(this)[0].id,
            success: function (data) {
                span.innerHTML = data.response.name;
            },
            error: function (data) {
                if (data.status == 422) {
                    alert("Неверные данные")
                } else if (data.status == 404) {
                    alert("Производитель не найден")
                } else if (data.status == 500) {
                    alert("Написать Роме")
                }
            },
        });
    });
});
