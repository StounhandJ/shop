$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
function update() {
    $(".save-btn").hide();
    $(".delete-btn").hide();
    $(".change-input").hide();
    $(".change-input-ename").hide();
    $(".add-img-btn").hide();
    $(".change-btn").show();
    $(".change-btn").click(function () {
        $(this).hide();
        $(this).siblings(".delete-btn").show();
        $(this).siblings(".change-input").show();
        $(this).siblings('.app-doc-meta').children('.mb-0').children(".change-input-ename").show();
        $(this).siblings(".save-btn").show();
        $(this).siblings(".add-img-btn").show();
    });
    // update maker
    $(".save-btn-makers").click(function () {
        $(this).hide();
        $(this).siblings(".delete-btn").hide();
        $(this).siblings(".change-input").hide();
        $(this).siblings(".add-img-btn").hide();
        $(this).siblings(".change-btn").show();
        var fd = new FormData();
        fd.append("name", $(this).siblings(".change-input")[0].value);
        maker_name = $(this).siblings("h4").children()[0];
        btn = $(this)[0];
        console.log($(this)[0].id);
        if ($(this)[0].id !== "") {
            fd.append("_method", "PUT");
            $.ajax({
                type: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: fd,
                url: "/43hgf36jfg/maker/" + $(this)[0].id,
                success: function (data) {
                    maker_name.innerHTML = data.response.name;
                },
                error: function (data) {
                    if (data.status == 422) {
                        alert("Неверные данные");
                    } else if (data.status == 404) {
                        alert("Производитель не найден");
                    } else if (data.status == 500) {
                        alert("Написать Роме");
                    }
                },
            });
        } else {
            // add maker
            fd.append("_method", "POST");
            $.ajax({
                type: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: fd,
                url: "/43hgf36jfg/maker",
                success: function (data) {
                    maker_name.innerHTML = data.response.name;
                    btn.id = data.response.id;
                },
                error: function (data) {
                    if (data.status == 422) {
                        alert("Неверные данные");
                    } else if (data.status == 500) {
                        alert("Написать Роме");
                    }
                },
            });
            // add maker
        }
    });
    // udpate maker

    // delete maker
    $(".delete-btn-makers").click(function () {
        var closet = $(this).closest('.col-6');
        var fd = new FormData();
        fd.append("_method", "DELETE");
        $.ajax({
            type: "POST",
            cache: false,
            processData: false,
            contentType: false,
            data: fd,
            url: "/43hgf36jfg/maker/" + $(this).siblings(".save-btn")[0].id,
            success: function (data) {
                closet.remove();
            },
            error: function (data) {
                if (data.status == 404) {
                    alert("Производитель не найден");
                } else if (data.status == 500) {
                    alert("Написать Роме");
                }
            },
        });
    });
    // delete maker


    // update department
    $(".save-btn-departments").click(function () {
        $(this).hide();
        $(this).siblings(".delete-btn").hide();
        $(this).siblings(".change-input").hide();
        $(this).siblings(".add-img-btn").hide();
        $(this).siblings('.app-doc-meta').children('.mb-0').children(".change-input-ename").hide();
        $(this).siblings(".change-btn").show();
        var fd = new FormData();
        fd.append("name", $(this).siblings(".change-input")[0].value);
        fd.append("e_name", $(this).siblings('.app-doc-meta').children('.mb-0').children(".change-input-ename")[0].value);
        uri = $(this).siblings('.app-doc-meta').children('.mb-0').children()[0];
        department_name = $(this).siblings("h4").children()[0];
        btn = $(this)[0];
        console.log($(this)[0].id);
        if ($(this)[0].id !== "") {
            fd.append("_method", "PUT");
            $.ajax({
                type: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: fd,
                url: "/43hgf36jfg/department/" + $(this)[0].id,
                success: function (data) {
                    department_name.innerHTML = data.response.name;
                    uri.innerHTML = '<span class="text-muted">E_name: </span>' + data.response.e_name;
                },
                error: function (data) {
                    if (data.status == 422) {
                        alert("Неверные данные");
                    } else if (data.status == 404) {
                        alert("Производитель не найден");
                    } else if (data.status == 500) {
                        alert("Написать Роме");
                    }
                },
            });
        } else {
            // add department
            fd.append("_method", "POST");
            $.ajax({
                type: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: fd,
                url: "/43hgf36jfg/department",
                success: function (data) {
                    department_name.innerHTML = data.response.name;
                    uri.innerHTML = '<span class="text-muted">E_name: </span>' + data.response.e_name;
                    btn.id = data.response.id;
                },
                error: function (data) {
                    if (data.status == 422) {
                        alert("Неверные данные");
                    } else if (data.status == 500) {
                        alert("Написать Роме");
                    }
                },
            });
            // add department
        }
    });
    // udpate department

    // delete department
    $(".delete-btn-departments").click(function () {
        var closet = $(this).closest('.col-6');
        var fd = new FormData();
        fd.append("_method", "DELETE");
        $.ajax({
            type: "POST",
            cache: false,
            processData: false,
            contentType: false,
            data: fd,
            url: "/43hgf36jfg/department/" + $(this).siblings(".save-btn")[0].id,
            success: function (data) {
                closet.remove();
            },
            error: function (data) {
                if (data.status == 404) {
                    alert("Ошибка");
                } else if (data.status == 500) {
                    alert("Написать Роме");
                }
            },
        });
    });
    // delete department
}
$(document).ready(function () {
    update();
    // add maker
    $(".add-btn-makers").click(function () {
        $(".all-cards").append(
            '<div class="col-6 col-md-4 col-xl-3 col-xxl-3">' +
                '<div class="app-card app-card-doc shadow-sm h-100">' +
                '<div class="app-card-body p-3">' +
                '<h4 class="app-doc-title truncate mb-0"><span></span></h4>' +
                '<input type="text" class="change-input" placeholder="Название производителя">' +
                '<div class="app-doc-meta">' +
                '<ul class="list-unstyled mb-0">' +
                '<li><span class="text-muted">Id:</span></li>' +
                '<li><span class="text-muted">Товаров:</span></li>' +
                "</ul>" +
                "</div>" +
                '<button class="change-btn change-btn-makers btn btn-primary">Изменить</button>' +
                '<button class="save-btn btn save-btn-makers btn-primary">Сохранить</button>' +
                '<button class="delete-btn btn delete-btn-makers btn-primary"><i class="far fa-trash-alt" style="color: white;"></i></button>' +
                "</div>" +
                "</div>" +
                "</div>"
        );
        update();
    });
    // add maker

    // add department
    $(".add-btn-departments").click(function () {
        $(".all-cards").append(
            '<div class="col-6 col-md-4 col-xl-3 col-xxl-3">' +
                '<div class="app-card app-card-doc shadow-sm h-100">' +
                '<div class="app-card-body p-3">' +
                '<h4 class="app-doc-title truncate mb-0"><span></span></h4>' +
                '<input type="text" class="change-input" placeholder="Название отдела">' +
                '<div class="app-doc-meta">' +
                '<ul class="list-unstyled mb-0">' +
                '<li><span class="text-muted">uri:</span></li>' +
                '<input type="text" class="change-input-ename" placeholder="Новый uri"></input>' +
                '<li><span class="text-muted">Id:</span></li>' +
                '<li><span class="text-muted">Категорий:</span></li>' +
                "</ul>" +
                "</div>" +
                '<button class="change-btn change-btn-departments btn btn-primary">Изменить</button>' +
                '<button class="save-btn save-btn-departments btn btn-primary">Сохранить</button>' +
                '<button class="delete-btn delete-btn-departments btn btn-primary"><i class="far fa-trash-alt" style="color: white;"></i></button>' +
                "</div>" +
                "</div>" +
                "</div>"
        );
        update();
    });
    // add department
});
