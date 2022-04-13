$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
function update() {
    $(".save-btn").hide();
    $(".delete-btn").hide();
    $(".change-input").hide();
    $(".change-input-price").hide();
    $(".change-input-ename").hide();
    $(".change-list-department").hide();
    $(".change-list-category").hide();
    $(".change-list-maker").hide();
    $(".add-img-btn").hide();
    $(".product-dcp").hide();
    $(".change-btn").show();
    $(".change-btn").click(function () {
        $(this).hide();
        $(this).parent().siblings(".admin-product-img").hide();
        $(this).siblings(".delete-btn").show();
        $(this).siblings(".change-input").show();
        $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-list-department")
            .show();
        $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-list-category")
            .show();
        $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-list-maker")
            .show();
        $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-input-ename")
            .show();
        $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-input-price")
            .show();
        $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".product-dcp")
            .show();
        $(this).siblings(".save-btn").show();
        $(this).siblings(".add-img-btn").show();

        // dropdown list for change depart in category
        var department_list = $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-list-department");
        var fd = new FormData();
        fd.append("_method", "GET");
        $.ajax({
            type: "POST",
            cache: false,
            processData: false,
            contentType: false,
            data: fd,
            url: "/action/department",
            success: function (data) {
                if (department_list[0] != undefined) {
                    department_list[0].innerHTML = "";

                    Object.values(data.response).forEach((item) => {
                        department_list.append(new Option(item.name, item.id));
                    });
                    department_list.val(department_list[0].id).change();
                }
            },
        });
        // dropdown list for change depart in category

        // dropdown list for change categories in products
        var category_list = $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-list-category");
        var fd = new FormData();
        fd.append("_method", "GET");
        $.ajax({
            type: "POST",
            cache: false,
            processData: false,
            contentType: false,
            data: fd,
            url: "/action/category",
            success: function (data) {
                if (category_list[0] != undefined) {
                    category_list[0].innerHTML = "";
                    console.log(data);
                    Object.values(data.response).forEach((item) => {
                        let option_name = `${item.name} (${item.department_name})`;
                        category_list.append(new Option(option_name, item.id));
                    });
                    category_list.val(category_list[0].id).change();
                }
            },
        });
        // dropdown list for change categories in products

        // dropdown list for change makers in products
        var maker_list = $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-list-maker");
        var fd = new FormData();
        fd.append("_method", "GET");
        $.ajax({
            type: "POST",
            cache: false,
            processData: false,
            contentType: false,
            data: fd,
            url: "/action/maker",
            success: function (data) {
                if (maker_list[0] != undefined) {
                    maker_list[0].innerHTML = "";

                    data.response.forEach((item) => {
                        maker_list.append(new Option(item.name, item.id));
                    });
                    maker_list.val(maker_list[0].id).change();
                }
            },
        });
        // dropdown list for change makers in products

        return false;
    });
    // update maker
    $(".save-btn-makers").click(function () {
        var fd = new FormData();
        fd.append("name", $(this).siblings(".change-input")[0].value);
        maker_name = $(this).siblings("h4").children()[0];
        btn = $(this)[0];
        if ($(this)[0].id !== "") {
            fd.append("_method", "PUT");
            $.ajax({
                type: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: fd,
                url: "/action/maker/" + $(this)[0].id,
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
                url: "/action/maker",
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
        $(this).hide();
        $(this).siblings(".delete-btn").hide();
        $(this).siblings(".change-input").hide();
        $(this).siblings(".change-btn").show();
    });
    // udpate maker

    // update department
    $(".save-btn-departments").click(function () {
        var fd = new FormData();
        fd.append("name", $(this).siblings(".change-input")[0].value);
        fd.append(
            "e_name",
            $(this)
                .siblings(".app-doc-meta")
                .children(".mb-0")
                .children(".change-input-ename")[0].value
        );

        uri = $(this).siblings(".app-doc-meta").children(".mb-0").children()[0];
        department_name = $(this).siblings("h4").children()[0];
        btn = $(this)[0];

        if ($(this)[0].id !== "") {
            fd.append("_method", "PUT");
            $.ajax({
                type: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: fd,
                url: "/action/department/" + $(this)[0].id,
                success: function (data) {
                    department_name.innerHTML = data.response.name;
                    uri.innerHTML =
                        '<span class="text-muted">uri: </span>' +
                        data.response.e_name;
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
                url: "/action/department",
                success: function (data) {
                    department_name.innerHTML = data.response.name;
                    uri.innerHTML =
                        '<span class="text-muted">E_name: </span>' +
                        data.response.e_name;
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
        $(this).hide();
        $(this).siblings(".delete-btn").hide();
        $(this).siblings(".change-input").hide();
        $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-input-ename")
            .hide();
        $(this).siblings(".change-btn").show();
        return false;
    });
    // udpate department

    // update category
    $(".save-btn-categories").click(function () {
        var fd = new FormData();
        fd.append("name", $(this).siblings(".change-input")[0].value);
        fd.append(
            "e_name",
            $(this)
                .siblings(".app-doc-meta")
                .children(".mb-0")
                .children(".change-input-ename")[0].value
        );
        fd.append(
            "department_id",
            $(this)
                .siblings(".app-doc-meta")
                .children(".mb-0")
                .children(".change-list-department")[0].value
        );
        uri = $(this).siblings(".app-doc-meta").children(".mb-0").children()[1];
        department_name = $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children()[3];
        category_name = $(this).siblings("h4").children()[0];
        btn = $(this)[0];
        department_list = $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-list-department")[0];
        if ($(this)[0].id !== "") {
            fd.append("_method", "PUT");
            $.ajax({
                type: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: fd,
                url: "/action/category/" + $(this)[0].id,
                success: function (data) {
                    category_name.innerHTML = data.response.name;
                    department_list.id = data.response.department_id;

                    department_name.innerHTML =
                        '<span class="text-muted department-name">Отдел: </span>' +
                        data.response.department_name;

                    uri.innerHTML =
                        '<span class="text-muted">uri: </span>' +
                        data.response.e_name;
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
            // add category
            fd.append("_method", "POST");
            $.ajax({
                type: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: fd,
                url: "/action/category",
                success: function (data) {
                    category_name.innerHTML = data.response.name;
                    department_list.id = data.response.department_id;

                    department_name.innerHTML =
                        '<span class="text-muted department-name">Отдел: </span>' +
                        data.response.department_name;

                    uri.innerHTML =
                        '<span class="text-muted">uri: </span>' +
                        data.response.e_name;
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
            // add category
        }
        $(this).hide();
        $(this).siblings(".delete-btn").hide();
        $(this).siblings(".change-input").hide();
        $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-input-ename")
            .hide();
        $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-list-department")
            .hide()
            .children()
            .remove();
        $(this).siblings(".change-btn").show();
    });
    // update category

    // update product
    $(".save-btn-products").click(function () {
        var fd = new FormData();
        fd.append("title", $(this).siblings(".change-input")[0].value);
        fd.append(
            "description",
            $(this)
                .siblings(".app-doc-meta")
                .children(".mb-0")
                .children(".product-dcp")[0].value
        );
        fd.append(
            "category_id",
            $(this)
                .siblings(".app-doc-meta")
                .children(".mb-0")
                .children(".change-list-category")[0].value
        );
        fd.append(
            "maker_id",
            $(this)
                .siblings(".app-doc-meta")
                .children(".mb-0")
                .children(".change-list-maker")[0].value
        );
        fd.append(
            "price",
            $(this)
                .siblings(".app-doc-meta")
                .children(".mb-0")
                .children(".change-input-price")[0].value
        );

        if ($(this).siblings(".add-img-btn")[0].files[0] != undefined) {
            fd.append("photo", $(this).siblings(".add-img-btn")[0].files[0]);
        }

        var product_img_update = $(this).parent().siblings(".admin-product-img")[0];

        var product_title = $(this).siblings("h4")[0];
        var product_dcp = $(this).siblings(".app-doc-meta").children(".mb-0").children(".product-dcp-text")[0];

        var product_category_list = $(this).siblings(".app-doc-meta").children(".mb-0").children(".change-list-category")[0];
        var product_category_text = $(this).siblings(".app-doc-meta").children(".mb-0").children(".category-text")[0];

        var product_maker_list = $(this).siblings(".app-doc-meta").children(".mb-0").children(".change-list-maker")[0];
        var product_maker_text = $(this).siblings(".app-doc-meta").children(".mb-0").children(".maker-text")[0];

        var product_price = $(this).siblings(".app-doc-meta").children(".mb-0").children(".product-price")[0];
        var id_text = $(this).siblings(".app-doc-meta").children(".mb-0").children(".id-text")[0];

        var btn = $(this)[0];

        if ($(this)[0].id !== "") {
            fd.append("_method", "PUT");
            $.ajax({
                type: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: fd,
                url: "/action/product/" + $(this)[0].id,
                success: function (data) {
                    product_img_update.src = data.response.img_url;
                    product_title.innerHTML =  `<span>${data.response.title}</span>`;

                    product_dcp.innerHTML = `<span class="text-muted">Описание: </span>${data.response.description}`;

                    product_category_list.id = data.response.category_id;
                    product_category_text.innerHTML = `<span class="text-muted">Категория: </span>${data.response.category_name}`
                    
                    product_maker_list.id = data.response.maker_id;
                    product_maker_text.innerHTML = `<span class="text-muted">Производитель: </span>${data.response.maker_name}`
                    
                    product_price.innerHTML = `<span class="text-muted">Цена: </span>${data.response.price} руб.`;
                    id_text.innerHTML = `<span class="text-muted">Id:</span> ${data.response.id}`;
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
            // add product
            fd.append("_method", "POST");
            $.ajax({
                type: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: fd,
                url: "/action/product",
                success: function (data) {
                    product_img_update.src = data.response.img_url;
                    product_title.innerHTML =  `<span>${data.response.title}</span>`;

                    product_dcp.innerHTML = `<span class="text-muted">Описание: </span>${data.response.description}`;

                    product_category_list.id = data.response.category_id;
                    product_category_text.innerHTML = `<span class="text-muted">Категория: </span>${data.response.category_name}`
                    
                    product_maker_list.id = data.response.maker_id;
                    product_maker_text.innerHTML = `<span class="text-muted">Производитель: </span>${data.response.maker_name}`
                    
                    product_price.innerHTML = `<span class="text-muted">Цена: </span>${data.response.price} руб.`;
                    btn.id = data.response.id;
                    id_text.innerHTML = `<span class="text-muted">Id:</span> ${data.response.id}`;
                },
                error: function (data) {
                    if (data.status == 422) {
                        alert("Неверные данные");
                    } else if (data.status == 500) {
                        alert("Написать Роме");
                    }
                },
            });
            // add product
        }
        $(this).hide();
        $(this).siblings(".delete-btn").hide();
        $(this).siblings(".change-input").hide();
        $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".product-dcp")
            .hide();
        $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-list-category")
            .hide();
        $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-list-maker")
            .hide();
        $(this)
            .siblings(".app-doc-meta")
            .children(".mb-0")
            .children(".change-input-price")
            .hide();
        $(this).siblings(".add-img-btn").hide();
        $(this).parent().siblings(".admin-product-img").show();
        $(this).siblings(".change-btn").show();
    });
    // update product

    // delete someone
    $(".delete-btn").click(function () {
        var closet = $(this).closest(".col-6");
        $.ajax({
            type: "POST",
            data: { _method: "DELETE" },
            url:
                "/action/" +
                $(this)[0].attributes.getNamedItem("path").value +
                "/" +
                $(this).siblings(".save-btn")[0].id,
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
    // delete someone
}

$(document).ready(function () {
    update();
    // add maker
    $(".add-btn-makers").click(function () {
        $(".all-cards").prepend(
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
                '<button class="delete-btn btn btn-primary" path="maker"><i class="far fa-trash-alt" style="color: white;"></i></button>' +
                "</div>" +
                "</div>" +
                "</div>"
        );
        update();
    });
    // add maker

    // add department
    $(".add-btn-departments").click(function () {
        $(".all-cards").prepend(
            '<div class="col-6 col-md-4 col-xl-3 col-xxl-3">' +
                '<div class="app-card app-card-doc shadow-sm h-100">' +
                '<div class="app-card-body p-3">' +
                '<h4 class="app-doc-title truncate mb-0"><span></span></h4>' +
                '<input type="text" name="name" class="change-input" placeholder="Название отдела">' +
                '<div class="app-doc-meta">' +
                '<ul class="list-unstyled mb-0">' +
                '<li><span class="text-muted">uri:</span></li>' +
                '<input type="text" name="e_name" class="change-input-ename" placeholder="Новый uri"></input>' +
                '<li><span class="text-muted">Id:</span></li>' +
                '<li><span class="text-muted">Категорий:</span></li>' +
                "</ul>" +
                "</div>" +
                '<button class="change-btn change-btn-departments btn btn-primary">Изменить</button>' +
                '<button class="save-btn save-btn-departments btn btn-primary">Сохранить</button>' +
                '<button class="delete-btn btn btn-primary" path="department"><i class="far fa-trash-alt" style="color: white;"></i></button>' +
                "</div>" +
                "</div>" +
                "</div>"
        );
        update();
    });
    // add department

    // add category
    $(".add-btn-categories").click(function () {
        $(".all-cards").prepend(
            '<div class="col-6 col-md-4 col-xl-3 col-xxl-3">' +
                '<div class="app-card app-card-doc shadow-sm h-100">' +
                '<div class="app-card-body p-3">' +
                '<h4 class="app-doc-title truncate mb-0"><span></span></h4>' +
                '<input type="text" class="change-input" placeholder="Название отдела">' +
                '<div class="app-doc-meta">' +
                '<ul class="list-unstyled mb-0">' +
                '<li><span class="text-muted">Id:</span></li>' +
                '<li><span class="text-muted">uri:</span></li>' +
                '<input type="text" class="change-input-ename" placeholder="Новый uri">' +
                '<li><span class="text-muted">Отдел:</span></li>' +
                '<select class="change-list-department">' +
                "</select>" +
                '<li><span class="text-muted">Товаров: </span></li>' +
                "</ul>" +
                "</div>" +
                '<button class="change-btn change-btn-categories btn btn-primary">Изменить</button>' +
                '<button class="save-btn save-btn-categories btn btn-primary">Сохранить</button>' +
                '<button class="delete-btn btn btn-primary" path="category"><i class="far fa-trash-alt" style="color: white;"></i></button>' +
                "</div>" +
                "</div>" +
                "</div>"
        );
        update();
    });
    // add category

    // add product
    $(".add-btn-products").click(function () {
        $(".all-cards").prepend(
            `<div class="col-6 col-md-4 col-xl-3 col-xxl-3">
            <div class="app-card app-card-doc shadow-sm h-100">
                <img class="admin-product-img">
                <div class="app-card-body p-3">
                    <input type="file" class="add-img-btn">
                    <h4 class="app-doc-title truncate mb-0"><span></span></h4>
                    <input type="text" name="name" class="change-input" placeholder="Название товара">
                    <div class="app-doc-meta">
                        <ul class="list-unstyled mb-0">
                            <li class="id-text"><span class="text-muted">Id:</span></li>
                            <li><span class="text-muted department-name">Отдел:</span></li>
                            <li class="category-text"><span class="text-muted">Категория: </span></li>
                            <select class="change-list-category"></select>
                            <li class="maker-text"><span class="text-muted">Производитель:</span></li>
                            <select class="change-list-maker"></select>
                            <li class="product-price"><span class="text-muted">Цена: руб.</li>
                            <input type="text" name="price" class="change-input-price" placeholder="Цена товара">
                            <li class="product-dcp-text"><span class="text-muted">Описание:</span></li>
                            <textarea name="product-dcp" class="product-dcp"></textarea>
                        </ul>
                    </div>
                    <button class="change-btn change-btn-products btn btn-primary">Изменить</button>
                    <button class="save-btn save-btn-products btn btn-primary">Сохранить</button>
                    <button class="delete-btn btn btn-primary" path="product"><i class="far fa-trash-alt" style="color: white;"></i></button>
                </div>
            </div>
        </div>`
        );
        update();
    });
    // add product
});
