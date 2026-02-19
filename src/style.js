/* Order Form Validation */
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
