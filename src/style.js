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
    function validatingForm(){
        let table_number = document.forms["form"]["table_number"].value;
        let quantity = document.forms["form"]["quantity"].value;

        if(table_number == ""){
            alert("Table Number must be filled out");
            return false;
        }
            if(quantity == ""){
            alert("Quantity must be filled out");
            return false;
        }
    }

