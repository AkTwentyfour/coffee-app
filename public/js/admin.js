document.addEventListener("DOMContentLoaded", () => {
    // action
    const addItem = document.querySelector(".add");
    const editItem = document.querySelectorAll(".edit");
    const deleteItem = document.querySelectorAll(".delete");

    // input parent
    const form = document.getElementById("crud-form");
    // container input
    const containerInput = document.querySelector(".container-input");
    // input field
    const id = document.getElementById("item_id");
    const name = document.getElementById("name");
    const price = document.getElementById("price");
    const stock = document.getElementById("stock");
    const category = document.getElementById("category");
    const defaultCategory = document.getElementById("defaultCategory");
    const images = document.getElementById("images");
    // submit btn
    const submitBtn = document.querySelector(".submit-btn");
    // alert info
    const alertInfo = document.querySelector(".alert-info");

    addItem.addEventListener("click", () => {
        // set parent action attribute
        form.setAttribute("action", "addItem");

        // set required attribute
        name.required = true;
        price.required = true;
        stock.required = true;
        category.required = true;
        images.required = true;

        // unset disabled attribute
        name.removeAttribute("disabled");
        price.removeAttribute("disabled");
        stock.removeAttribute("disabled");
        category.removeAttribute("disabled");
        images.removeAttribute("disabled");

        // clear temporary values
        id.value = "";
        name.value = "";
        price.value = "";
        stock.value = "";
        category.value = "";
        images.value = "";

        console.log("Form ready for new item");

        // set action info
        alertInfo.classList.add("d-none");
        submitBtn.classList.remove("d-none");
        submitBtn.innerHTML = "Add Commodities";
    });

    editItem.forEach((element) => {
        const itemId = element.getAttribute("data-id");
        const itemName = element.getAttribute("data-name");
        const itemPrice = parseInt(element.getAttribute("data-price"));
        const itemStock = element.getAttribute("data-stock");
        const itemCategory = element.getAttribute("data-category");

        element.addEventListener("click", () => {
            console.log(itemId);

            // set parent action attribute
            form.setAttribute("action", "editItem");

            // enable input fields
            name.removeAttribute("disabled");
            price.removeAttribute("disabled");
            stock.removeAttribute("disabled");
            category.removeAttribute("disabled");
            images.removeAttribute("disabled");

            // remove required attribute
            name.removeAttribute("required");
            price.removeAttribute("required");
            stock.removeAttribute("required");
            category.removeAttribute("required");
            images.removeAttribute("required");

            // set form values
            id.value = itemId;
            name.value = itemName;
            price.value = itemPrice;
            stock.value = itemStock;

            // jika category berupa <select>
            if (category.tagName === "SELECT") {
                category.value = itemCategory;
            } else {
                category.value = itemCategory;
            }

            // kalau ada defaultCategory display (misalnya span)
            defaultCategory.innerHTML = itemCategory;

            // set action info
            alertInfo.classList.add("d-none");
            submitBtn.classList.remove("d-none");
            submitBtn.innerHTML = "Edit Commodities";
        });
    });

    deleteItem.forEach((element) => {
        const itemId = element.getAttribute("data-id");
        const itemName = element.getAttribute("data-name");
        const itemPrice = element.getAttribute("data-price");
        const itemStock = element.getAttribute("data-stock");
        const itemCategory = element.getAttribute("data-category");

        element.addEventListener("click", () => {
            // set parent action attribute
            form.setAttribute("action", "deleteItem");

            // set fields disabled
            name.disabled = true;
            price.disabled = true;
            stock.disabled = true;
            category.disabled = true;
            images.disabled = true;

            // remove required
            name.removeAttribute("required");
            price.removeAttribute("required");
            stock.removeAttribute("required");
            category.removeAttribute("required");
            images.removeAttribute("required");

            // set form values
            id.value = itemId;
            name.value = itemName;
            price.value = itemPrice;
            stock.value = itemStock;
            category.value = itemCategory;

            // set action info
            alertInfo.classList.add("d-none");
            submitBtn.classList.remove("d-none");
            submitBtn.innerHTML = "Delete Commodities";
        });
    });

    const filterBtns = document.querySelectorAll(".filter-btn");
    const items = document.querySelectorAll(".item-col");

    filterBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            const category = btn.dataset.value; // lebih clean pakai dataset

            // ganti tombol aktif
            document
                .querySelector(".filter-btn-active")
                ?.classList.remove("filter-btn-active");
            btn.classList.add("filter-btn-active");

            // filter items
            items.forEach((item) => {
                const itemCategory = item.dataset.category;
                if (category === "all" || itemCategory === category) {
                    item.classList.remove("hide");
                } else {
                    item.classList.add("hide");
                }
            });
        });
    });
});
