<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "maady";
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function escape_input($data) {
    global $conn;
    return $conn->real_escape_string($data);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = escape_input($_POST["email"]);
    $password = escape_input($_POST["password"]);
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password,$row["password"])) {
                header("Location: home.html");
            }
        else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
}
$conn->close();
?>