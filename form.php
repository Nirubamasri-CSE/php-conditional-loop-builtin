<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- Collect and sanitize inputs ---
    $name    = ucfirst(strtolower(trim($_POST["name"])));
    $email   = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone   = trim($_POST["phone"]);
    $age     = trim($_POST["age"]);
    $dob     = $_POST["dob"] ?? '';
    $website = filter_var(trim($_POST["website"]), FILTER_SANITIZE_URL);
    $comment = htmlspecialchars(stripslashes(trim($_POST["comment"])));
    $gender  = $_POST["gender"] ?? '';
    $hobbies = $_POST["hobbies"] ?? [];

    // --- Validation ---
    $errors = [];

    // Name
    if (empty($name)) $errors[] = "Name is required.";
    elseif (!ctype_alpha(str_replace(' ', '', $name))) $errors[] = "Name must contain letters only.";

    // Email
    if (empty($email)) $errors[] = "Email is required.";
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format.";

    // Phone
    if (empty($phone)) $errors[] = "Phone is required.";
    elseif (!ctype_digit($phone) || strlen($phone) != 10) $errors[] = "Phone must be exactly 10 digits.";

    // Age
    if (empty($age)) $errors[] = "Age is required.";
    elseif (!ctype_digit($age) || (int)$age < 18 || (int)$age > 100) $errors[] = "Age must be between 18 and 100.";

    // DOB
    if (!empty($dob)) {
        $parts = explode('-', $dob);
        if (!checkdate((int)$parts[1], (int)$parts[2], (int)$parts[0])) $errors[] = "Invalid date of birth.";
    }

    // Website
    if (!empty($website) && !filter_var($website, FILTER_VALIDATE_URL)) $errors[] = "Invalid website URL.";

    // Gender
    if (empty($gender)) $errors[] = "Gender is required.";

    // Hobbies
    if (empty($hobbies)) $errors[] = "Select at least one hobby.";

    // --- Display errors or success ---
    if ($errors) {
        echo "<ul style='color:red;'>";
        foreach ($errors as $err) echo "<li>$err</li>";
        echo "</ul>";
    } else {
        $hobbies_str = implode(", ", $hobbies);
        $masked_phone = str_repeat("*", 6) . substr($phone, 6); // show only last 4 digits

        echo "<p style='color:green;'>✔ Success!<br>
              Name: $name<br>
              Email: $email<br>
              Phone: $masked_phone<br>
              Age: $age<br>
              DOB: $dob<br>
              Website: $website<br>
              Gender: $gender<br>
              Hobbies: $hobbies_str<br>
              Comment: $comment</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mega Form Submission</title>
</head>
<body>
<h2>Mega Form Submission Example (No File Handling)</h2>
<form method="post" action="">
    <label>Name:</label>
    <input type="text" name="name" required><br><br>

    <label>Email:</label>
    <input type="text" name="email" required><br><br>

    <label>Phone:</label>
    <input type="text" name="phone" required><br><br>

    <label>Age:</label>
    <input type="text" name="age" required><br><br>

    <label>Date of Birth:</label>
    <input type="date" name="dob"><br><br>

    <label>Website:</label>
    <input type="text" name="website"><br><br>

    <label>Gender:</label>
    <select name="gender" required>
        <option value="">Select</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
    </select><br><br>

    <label>Hobbies:</label><br>
    <input type="checkbox" name="hobbies[]" value="Reading"> Reading
    <input type="checkbox" name="hobbies[]" value="Sports"> Sports
    <input type="checkbox" name="hobbies[]" value="Music"> Music<br><br>

    <label>Comment:</label><br>
    <textarea name="comment" rows="4" cols="50"></textarea><br><br>

    <button type="submit">Submit</button>
</form>
</body>
</html>
