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
    // submit btn
    const submitBtn = document.querySelector(".submit-btn");

    addItem.addEventListener("click", () => {
        // set parent action attribute
        form.setAttribute("action", "addItem");

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
        const itemPrice = element.getAttribute("data-price");
        const itemStock = element.getAttribute("data-stock");
        const itemCategory = element.getAttribute("data-category");

        element.addEventListener("click", () => {
            // set parent action atribute
            form.setAttribute("action", "editItem");

            // set temporary value
            id.setAttribute("value", itemId);
            name.setAttribute("value", itemName);
            price.setAttribute("value", itemPrice);
            stock.setAttribute("value", itemStock);
            category.setAttribute("value", itemCategory);

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

    const filterBtn = document.querySelectorAll(".filter-btn");
    const comodityValue = document.querySelectorAll(".item");

    filterBtn.forEach((btn) => {
        const btnValue = btn.getAttribute("data-value");

        const test = comodityValue.filter((a)=> {
            return a == 'food'
        })

        console.log(test)

        
    });











    // const filterBtn = document.querySelectorAll(".filter-btn");
    // const comodity = document.querySelectorAll(".item");

    // filterBtn.forEach((btn) => {
    //     const btnValue = btn.getAttribute("data-value");

    //     btn.addEventListener("click", () => {
    //         console.log(btnValue)
    //         comodity.forEach((item) => {
    //             const comodityValue = item.getAttribute("data-category");
    //             console.log(comodityValue)

    //         });
    //         comodity.forEach((item) => {
    //             item.style.display = "none";
    //             console.log('success')
    //         });
            
    //         comodity.forEach((item) => {
    //             const comodityValue = item.getAttribute("data-category");
    //             if (comodityValue == btnValue) {
    //                 item.style.display = "block";
    //             }
    //         });
    //     });
    // });
});
