
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

