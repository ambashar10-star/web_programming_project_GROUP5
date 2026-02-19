document.addEventListener("DOMContentLoaded", function () {

    const form = document.querySelector("form");

    if (form) {
        form.addEventListener("submit", function (e) {

            let table = document.querySelector("[name='table_number']");
            let qty   = document.querySelector("[name='quantity']");
            let dish  = document.querySelector("[name='dish']");

            if (table && table.value <= 0) {
                alert("Please enter a valid table number");
                e.preventDefault();
                return;
            }

            if (qty && qty.value <= 0) {
                alert("Quantity must be at least 1");
                e.preventDefault();
                return;
            }

            if (dish && dish.value === "") {
                alert("Please select a dish");
                e.preventDefault();
                return;
            }
        });
    }

    
    /* CHARACTER COUNTER */
    const commentBox = document.getElementById('comment');
    const charCount = document.getElementById('charCount');

    if (commentBox && charCount) {
        commentBox.oninput = function() {
            let length = this.value.length;
            charCount.innerHTML = length + " / 200 characters";

            this.style.color = length > 200 ? "red" : "black";
        };
    }
});

