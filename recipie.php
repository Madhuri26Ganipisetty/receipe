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
    $recipeTitle = escape_input($_POST["recipe-title"]);
    $category = escape_input($_POST["category"]);
    $ingredients = escape_input($_POST["ingredients"]);
    $process = escape_input($_POST["process"]);
            $sql = "INSERT INTO recipes (title, category, ingredients, process) VALUES ('$recipeTitle', '$category', '$ingredients', '$process')";
            if ($conn->query($sql) === TRUE) {
                header("location: home.html");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }   
}
$conn->close();
?>
