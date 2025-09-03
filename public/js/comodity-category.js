document.addEventListener('DOMContentLoaded', ()=> {
    // action
    const addItem = document.querySelector(".add");
    const editItem = document.querySelectorAll(".edit");
    const deleteItem = document.querySelectorAll(".delete");

    // input parent
    const form = document.getElementById("crud-form");
    // input field
    const id = document.getElementById("item_id");
    const name = document.getElementById("name");
    // submit btn
    const submitBtn = document.querySelector(".submit-btn");
    // alert info
    const alertInfo = document.querySelector(".alert-info");

    addItem.addEventListener("click", () => {
        // set parent action attribute
        form.setAttribute("action", "add-comodity-category");

        // set required attribute
        name.required = true;

        // unset disabled attribute
        name.removeAttribute("disabled");

        // clear temporary values
        id.value = "";
        name.value = "";

        // set action info
        alertInfo.classList.add("d-none");
        submitBtn.classList.remove("d-none");
        submitBtn.innerHTML = "Add Category";
    });

    editItem.forEach((element) => {
        console.log('success');
        const itemId = element.getAttribute("data-id");
        const itemName = element.getAttribute("data-name");

        element.addEventListener("click", () => {
            // set parent action attribute
            form.setAttribute("action", "edit-comodity-category");

            // enable input fields
            name.removeAttribute("disabled");

            // remove required attribute
            name.removeAttribute("required");

            // set form values
            id.value = itemId;
            name.value = itemName;

            // set action info
            alertInfo.classList.add("d-none");
            submitBtn.classList.remove("d-none");
            submitBtn.innerHTML = "Edit Commodities";
        });
    });

    deleteItem.forEach((element) => {
        const itemId = element.getAttribute("data-id");
        const itemName = element.getAttribute("data-name");

        element.addEventListener("click", () => {
            // set parent action attribute
            form.setAttribute("action", "delete-comodity-category");

            // set fields disabled
            name.disabled = true;

            // remove required
            name.removeAttribute("required");

            // set form values
            id.value = itemId;
            name.value = itemName;

            // set action info
            alertInfo.classList.add("d-none");
            submitBtn.classList.remove("d-none");
            submitBtn.innerHTML = "Delete Commodities";
        });
    });
})