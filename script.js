document.getElementById("orderForm").addEventListener("submit", function (e) {

    e.preventDefault();

    
    document.getElementById("nameError").innerHTML = "";
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("phoneError").innerHTML = "";
    document.getElementById("studentError").innerHTML = "";
    document.getElementById("genderError").innerHTML = "";
    document.getElementById("departmentError").innerHTML = "";
    document.getElementById("foodError").innerHTML = "";
    document.getElementById("quantityError").innerHTML = "";

    let valid = true;

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let studentId = document.getElementById("studentId").value.trim();
    let department = document.getElementById("department").value;
    let quantity = parseInt(document.getElementById("quantity").value);
    let instructions = document.getElementById("instructions").value.trim();

    let gender = document.querySelector('input[name="gender"]:checked');

    let namePattern = /^[A-Za-z ]+$/;
    let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    let phonePattern = /^[0-9]{11}$/;

    
    if (name == "") {
        document.getElementById("nameError").innerHTML = "Name cannot be empty";
        valid = false;
    }
    else if (!namePattern.test(name)) {
        document.getElementById("nameError").innerHTML = "Invalid name";
        valid = false;
    }

    
    if (email == "") {
        document.getElementById("emailError").innerHTML = "Email cannot be empty";
        valid = false;
    }
    else if (!emailPattern.test(email)) {
        document.getElementById("emailError").innerHTML = "Invalid email format";
        valid = false;
    }

    
    if (phone == "") {
        document.getElementById("phoneError").innerHTML = "Phone number cannot be empty";
        valid = false;
    }
    else if (!phonePattern.test(phone)) {
        document.getElementById("phoneError").innerHTML = "Invalid phone number";
        valid = false;
    }

    
    if (studentId == "") {
        document.getElementById("studentError").innerHTML = "Student ID cannot be empty";
        valid = false;
    }

    
    if (gender == null) {
        document.getElementById("genderError").innerHTML = "Please select gender";
        valid = false;
    }

    
    if (department == "") {
        document.getElementById("departmentError").innerHTML = "Please select department";
        valid = false;
    }

    
    let foods = document.getElementsByClassName("food");
    let foodSelected = false;

    for (let i = 0; i < foods.length; i++) {
        if (foods[i].checked) {
            foodSelected = true;
            break;
        }
    }

    if (!foodSelected) {
        document.getElementById("foodError").innerHTML = "Select at least one food item";
        valid = false;
    }

    
    if (isNaN(quantity) || quantity <= 0) {
        document.getElementById("quantityError").innerHTML = "Quantity must be greater than 0";
        valid = false;
    }

    if (valid) {

        let selectedItems = "";
        let totalPrice = 0;

        for (let i = 0; i < foods.length; i++) {

            if (foods[i].checked) {

                let item = foods[i].value;
                let price = 0;

                if (item == "Burger")
                    price = 5;
                else if (item == "Pizza")
                    price = 8;
                else if (item == "Sandwich")
                    price = 4;
                else if (item == "French Fries")
                    price = 3;
                else if (item == "Coffee")
                    price = 2;
                else if (item == "Cold Drink")
                    price = 2;

                selectedItems += item + " - $" + price + "<br>";
                totalPrice += price;
            }
        }

        let total = totalPrice * quantity;

        if (instructions == "") {
            instructions = "None";
        }

        let result = document.getElementById("result");
        result.style.display = "block";

        result.innerHTML =
            "<h3>Order placed successfully!</h3>" +
            "<p>Customer Name: " + name + "</p>" +
            "<p>Student ID: " + studentId + "</p>" +
            "<p>Department: " + department + "</p>" +
            "<p>Selected Items:<br>" + selectedItems + "</p>" +
            "<p>Quantity: " + quantity + "</p>" +
            "<p>Special Instructions: " + instructions + "</p>" +
            "<h2>Total Bill: $" + total + "</h2>";
    }

});