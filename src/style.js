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


/* REVIEW VALIDATION FUNCTION */
function validateReview() {

    let comment = document.getElementById('comment');
    let resId = document.getElementById('table_number');
    let msgBox = document.getElementById('js-message');

    if (!comment || !resId) return true;

    if (resId.value <= 0) {
        msgBox.innerHTML = "<p class='alert alert-warning'>Please enter a valid Reservation ID.</p>";
        return false;
    }

    if (comment.value.length < 10) {
        msgBox.innerHTML = "<p class='alert alert-warning'>Comment must be at least 10 characters long.</p>";
        return false;
    }

    return true;
}
