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

    addItem.addEventListener("click", () => {
        // set parent action attribute
        form.setAttribute("action", "addItem");

        // set required attribute
        name.setAttribute("required", "");
        price.setAttribute("required", "");
        stock.setAttribute("required", "");
        category.setAttribute("required", "");
        images.setAttribute("required", "");

        // delete temporary value
        id.removeAttribute("value");
        name.removeAttribute("value");
        price.removeAttribute("value");
        stock.removeAttribute("value");
        category.removeAttribute("value");

        // set button text
        submitBtn.classList.remove("d-none");
        submitBtn.innerHTML = "Add Comodities";
    });

    editItem.forEach((element) => {
        const itemId = element.getAttribute("data-id");
        const itemName = element.getAttribute("data-name");
        const itemPrice = parseInt(element.getAttribute("data-price"));
        const itemStock = element.getAttribute("data-stock");
        const itemCategory = element.getAttribute("data-category");

        element.addEventListener("click", () => {
            // set parent action atribute
            form.setAttribute("action", "editItem");

            // unset required attribute
            name.removeAttribute("required", "");
            price.removeAttribute("required", "");
            stock.removeAttribute("required", "");
            category.removeAttribute("required", "");
            images.removeAttribute("required", "");

            // set temporary value
            id.setAttribute("value", itemId);
            name.setAttribute("value", itemName);
            price.setAttribute("value", itemPrice.toLocaleString("id-ID"));
            stock.setAttribute("value", itemStock);
            defaultCategory.setAttribute("value", itemCategory);
            defaultCategory.innerHTML = itemCategory

            // set button text
            submitBtn.classList.remove("d-none");
            submitBtn.innerHTML = "Edit Comodities";
        });
    });

    deleteItem.forEach((element) => {
        const itemId = element.getAttribute("data-id");
        const itemName = element.getAttribute("data-name");
        const itemPrice = element.getAttribute("data-price");
        const itemStock = element.getAttribute("data-stock");
        const itemCategory = element.getAttribute("data-category");

        element.addEventListener("click", () => {
            // set parent action atribute
            form.setAttribute("action", "deleteItem");

            // unset required attribute
            name.removeAttribute("required", "");
            price.removeAttribute("required", "");
            stock.removeAttribute("required", "");
            category.removeAttribute("required", "");
            images.removeAttribute("required", "");

            // set temporary value
            id.setAttribute("value", itemId);
            name.setAttribute("value", itemName);
            price.setAttribute("value", itemPrice);
            stock.setAttribute("value", itemStock);
            category.setAttribute("value", itemCategory);

            // set button text
            submitBtn.classList.remove("d-none");
            submitBtn.innerHTML = "Delete Comodities";
        });
    });

    const filterBtns = document.querySelectorAll(".filter-btn");
    const items = document.querySelectorAll(".item-col");

    filterBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            const category = btn.getAttribute("data-value");
            const active = document.querySelector(".filter-btn-active");
            if (active) {
                active.classList.remove("filter-btn-active");
            }
            btn.classList.add("filter-btn-active");

            items.forEach((item) => {
                if (
                    category === "all" ||
                    item.getAttribute("data-category") === category
                ) {
                    item.classList.remove("hide");
                } else {
                    item.classList.add("hide");
                }
            });
        });
    });
});
