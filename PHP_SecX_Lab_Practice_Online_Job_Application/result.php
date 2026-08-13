<?php

$name = $_GET["name"] ?? "";
$applicant_id = $_GET["id"] ?? "";
$email = $_GET["email"] ?? "";
$phone = $_GET["phone"] ?? "";
$gender = $_GET["gender"] ?? "";
$job = $_GET["job"] ?? "";
$qualification = $_GET["qualification"] ?? "";
$address = $_GET["address"] ?? "";
$file = $_GET["file"] ?? "";

$request_name = $_REQUEST["name"] ?? "";
$request_id = $_REQUEST["id"] ?? "";

?>
<p>
    <strong>APPLICATION SUCCESSFULL</strong>
</p>

<p>
    <strong>Applicant ID:</strong>
    <?php echo htmlspecialchars($applicant_id); ?>
</p>

<p>
    <strong>Name:</strong>
    <?php echo htmlspecialchars($name); ?>
</p>

<p>
    <strong>Email:</strong>
    <?php echo htmlspecialchars($email); ?>
</p>

<p>
    <strong>Phone:</strong>
    <?php echo htmlspecialchars($phone); ?>
</p>

<p>
    <strong>Gender:</strong>
    <?php echo htmlspecialchars($gender); ?>
</p>

<p>
    <strong>Job Position:</strong>
    <?php echo htmlspecialchars($job); ?>
</p>

<p>
    <strong>Qualification:</strong>
    <?php echo htmlspecialchars($qualification); ?>
</p>

<p>
    <strong>Address:</strong>
    <?php echo htmlspecialchars($address); ?>
</p>

<p>
    <strong>Uploaded CV:</strong>
    <?php echo htmlspecialchars($file); ?>
</p>

<p>
    <strong>Application Submitted Successfully</strong>
    
</p>

