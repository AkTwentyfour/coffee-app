document.addEventListener("DOMContentLoaded", function () {
    const filterBtns = document.querySelectorAll(".filter-btn");
    const colItems = document.querySelectorAll(".item-col");

    filterBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            const category = btn.getAttribute("data-value");
            const active = document.querySelector('.filter-btn-active')
            if (active) {
                active.classList.remove('filter-btn-active')
            }
            btn.classList.add('filter-btn-active')

            colItems.forEach((item) => {
                if (category === "all" || item.getAttribute("data-category") === category) {
                    item.classList.remove("hide");
                } else {
                    item.classList.add("hide");
                }
            });
        });
    });
    
    const items = document.querySelectorAll(".item");
    let temporaryTotal = 0;

    items.forEach((element) => {
        let click = parseInt(element.getAttribute("data-count")); //click count
        const name = element.getAttribute("name"); //item name (ex: ice tea)
        const price = parseInt(element.getAttribute("data-price")); //item price
        let quantity = parseInt(element.getAttribute("data-quantity")); //item quantity
        const itemId = element.getAttribute("data-id"); //item id
        const itemDetail = document.getElementById("item-detail"); //table for displaying an item
        const amountDisplay = element.querySelector("#amount"); //displaying quantity
        let totalDisplay = document.getElementById("total");
        let totalPrice = 0;

        const input = document.getElementById("input");

        element.addEventListener("click", (event) => {
            if (click == 0) {
                click++;
                element.setAttribute("data-count", click);

                // add border to selected item
                element.style.border = '4px solid lightgreen'

                // table row
                const itemRow = document.createElement("tr");
                itemRow.setAttribute("data-id", itemId);
                itemDetail.appendChild(itemRow);

                // commodity name
                const itemName = document.createElement("td");
                const textItemName = document.createTextNode(name);
                itemName.appendChild(textItemName);
                itemRow.appendChild(itemName);

                // quantity
                const itemQuantity = document.createElement("td");
                itemQuantity.classList.add("quantity");
                itemQuantity.setAttribute("data-id", itemId);
                quantity += 1;
                element.setAttribute("data-quantity", quantity);
                const textQuantity = document.createTextNode(quantity);
                itemQuantity.appendChild(textQuantity);
                itemRow.appendChild(itemQuantity);

                // price
                const itemPrice = document.createElement("td");
                const textItemPrice = document.createTextNode(price.toLocaleString('id-ID'));
                itemPrice.appendChild(textItemPrice);
                itemRow.appendChild(itemPrice);

                // amount display
                amountDisplay.innerHTML = quantity;

                // total display
                temporaryTotal = temporaryTotal + price;
                totalDisplay.innerHTML = temporaryTotal.toLocaleString('id-ID');

                // insert into controller
                const inputId = document.createElement("input");
                inputId.setAttribute("comodity", itemId);
                inputId.setAttribute("type", "hidden");
                inputId.setAttribute("name", "comodity_id[]");
                inputId.setAttribute("value", itemId);

                const inputQuantity = document.createElement("input");
                inputQuantity.setAttribute("quantity", itemId);
                inputQuantity.setAttribute("type", "hidden");
                inputQuantity.setAttribute("name", "quantity[]");
                inputQuantity.setAttribute("value", quantity);

                const inputPrice = document.createElement("input");
                inputPrice.setAttribute("price", itemId);
                inputPrice.setAttribute("type", "hidden");
                inputPrice.setAttribute("name", "price[]");
                inputPrice.setAttribute("value", price);

                const inputTotal = document.createElement("input");
                inputTotal.setAttribute("subtotal", itemId);
                inputTotal.setAttribute("type", "hidden");
                inputTotal.setAttribute("name", "subtotal[]");
                inputTotal.setAttribute("value", temporaryTotal);

                input.appendChild(inputId);
                input.appendChild(inputQuantity);
                input.appendChild(inputPrice);
                input.appendChild(inputTotal);
            } else {
                quantity += 1;
                click += 1;
                element.setAttribute("data-quantity", quantity);
                amountDisplay.innerHTML = quantity;

                // update input quantity
                const update = document.querySelector(
                    `input[quantity="${itemId}"]`
                );
                update.setAttribute("value", quantity);

                // update item quantity (item detail)
                const itemQuantity = document.querySelector(
                    `.quantity[data-id="${itemId}"]`
                );
                itemQuantity.innerHTML = quantity;

                // total display
                totalPrice = price + temporaryTotal;
                temporaryTotal = totalPrice;
                totalDisplay.innerHTML = totalPrice.toLocaleString('id-ID');
            }
        });

        const minus = element.querySelector("#minus");
        minus.addEventListener("click", (e) => {
            e.stopPropagation();
            if (quantity > 0) {
                quantity -= 1;
                click -= 1;
                element.setAttribute("data-quantity", quantity);
                amountDisplay.innerHTML = quantity;

                // update input quantity
                const update = document.querySelector(
                    `input[quantity="${itemId}"]`
                );
                update.setAttribute("value", quantity);

                // update item quantity (item detail)
                const itemQuantity = document.querySelector(
                    `.quantity[data-id="${itemId}"]`
                );
                itemQuantity.innerHTML = quantity;

                // total display
                totalPrice = temporaryTotal - price;
                temporaryTotal = totalPrice;
                totalDisplay.innerHTML = totalPrice.toLocaleString('id-ID');
            } else if (quantity == 0) {

                // remove selected border
                element.style.border = 'none'

                const itemRow = document.querySelector(
                    `tr[data-id="${itemId}"]`
                );
                itemDetail.removeChild(itemRow);

                const updateInputComodity = document.querySelector(
                    `input[comodity="${itemId}"]`
                );
                const updateInputQuantity = document.querySelector(
                    `input[quantity="${itemId}"]`
                );
                const updateInputPrice = document.querySelector(
                    `input[price="${itemId}"]`
                );
                const updateInputSubtotal = document.querySelector(
                    `input[subtotal="${itemId}"]`
                );
                input.removeChild(updateInputComodity);
                input.removeChild(updateInputPrice);
                input.removeChild(updateInputQuantity);
                input.removeChild(updateInputSubtotal);
                click = 0;
            }
        });
    });
    const countBtn = document.querySelector(".count-btn");
    countBtn.addEventListener("click", (event) => {
        event.preventDefault();
        event.stopPropagation();

        const cashInput = parseInt(document.querySelector(".cash-input").value);
        const cashOutput = document.querySelector(".cash-output");
        const cashback = document.querySelector(".cashback");

        if (cashInput) {
            cashOutput.innerHTML = cashInput.toLocaleString('id-ID');
            cashback.innerHTML = (cashInput - temporaryTotal).toLocaleString('id-ID');
        }
    });
});
