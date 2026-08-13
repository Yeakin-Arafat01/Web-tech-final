<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    

    $applicant_id = $_POST["applicant_id"] ?? "";
    $name = $_POST["name"] ?? "";
    $email = $_POST["email"] ?? "";
    $phone = $_POST["phone"] ?? "";
    $password = $_POST["password"] ?? "";
    $gender = $_POST["gender"] ?? "";
    $job_position = $_POST["job_position"] ?? "";
    $qualification = $_POST["qualification"] ?? "";
    $address = $_POST["address"] ?? "";


    

    $errors = array();


    

    if ($applicant_id == "") {
        $errors[] = "Applicant ID is required.";
    }


   

    if ($name == "") {
        $errors[] = "Name is required.";
    }


    

    if ($email == "") {

        $errors[] = "Email is required.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $errors[] = "Invalid email address.";
    }


    

    if ($phone == "") {

        $errors[] = "Phone number is required.";

    } elseif (!preg_match("/^[0-9]{11}$/", $phone)) {

        $errors[] = "Phone number must contain exactly 11 digits.";
    }


    

    if ($password == "") {

        $errors[] = "Password is required.";

    } elseif (strlen($password) < 6) {

        $errors[] = "Password must contain at least 6 characters.";
    }


    

    if ($gender == "") {
        $errors[] = "Please select your gender.";
    }


    

    if ($job_position == "") {
        $errors[] = "Please select a job position.";
    }


    

    if ($qualification == "") {
        $errors[] = "Qualification is required.";
    }


    

    if ($address == "") {
        $errors[] = "Address is required.";
    }


    // ============================
    // CV Upload Validation
    // ============================

    if (!isset($_FILES["cv"]) || $_FILES["cv"]["error"] != 0) {

        $errors[] = "Please upload your CV.";

    } else {

        // Get CV information using $_FILES

        $file_name = $_FILES["cv"]["name"];
        $file_size = $_FILES["cv"]["size"];
        $file_tmp = $_FILES["cv"]["tmp_name"];


        // Get file extension

        $file_extension =
            strtolower(pathinfo($file_name, PATHINFO_EXTENSION));


        // Allowed extensions

        $allowed_extensions = array(
            "pdf",
            "doc",
            "docx"
        );


        // Check file type

        if (!in_array($file_extension, $allowed_extensions)) {

            $errors[] =
                "Only PDF, DOC, and DOCX files are allowed.";
        }


        // Check file size

        if ($file_size > 2 * 1024 * 1024) {

            $errors[] =
                "CV file size must not exceed 2 MB.";
        }
    }


    

    if (count($errors) > 0) {

        echo "<h2>Application Failed!</h2>";

        foreach ($errors as $error) {

            echo $error . "<br>";
        }

        echo "<br>";

        echo "<a href='index.php'>Go Back</a>";

    }


   

    else {

    $upload_folder = "uploads/";

    $upload_path = $upload_folder . $file_name;

    move_uploaded_file($file_tmp, $upload_path);


    header(
        "Location: result.php?"
        . "id=" . urlencode($applicant_id)
        . "&name=" . urlencode($name)
        . "&email=" . urlencode($email)
        . "&phone=" . urlencode($phone)
        . "&gender=" . urlencode($gender)
        . "&job=" . urlencode($job_position)
        . "&qualification=" . urlencode($qualification)
        . "&address=" . urlencode($address)
        . "&file=" . urlencode($file_name)
    );

    exit();
}

} else {

    echo "Invalid Request.";

}

?>