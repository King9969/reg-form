<?php
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$grad_year = $_POST['grad_year'];
$mobile = $_POST['mobile'];
$whatsapp = $_POST['whatsapp'];
$skills = isset($_POST['skills']) ? implode(',', $_POST['skills']) : '';
$other_skills = $_POST['other_skills'];
$introduction = $_POST['introduction'];

// Database connection details
$host = 'your_mysql_host';
$username = 'your_mysql_username';
$password = 'your_mysql_password';
$dbname = 'your_mysql_database';

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Prepare and execute the SQL query
try {
    $stmt = $pdo->prepare("INSERT INTO registrations (name, email, grad_year, mobile, whatsapp, skills, other_skills, introduction) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $email, $grad_year, $mobile, $whatsapp, $skills, $other_skills, $introduction]);
    $rowCount = $stmt->rowCount();
    if ($rowCount > 0) {
        echo "Registration submitted successfully!";
        header("Location: success.html");
    } else {
        echo "Failed to submit registration.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$pdo = null;
?>
