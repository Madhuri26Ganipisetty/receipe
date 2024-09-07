<style>
    .recipe-card {
        width: 300px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .recipe-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .recipe-category {
        color: #888;
        font-style: italic;
        margin-bottom: 10px;
    }

    .recipe-ingredients {
        margin-bottom: 10px;
    }

    .recipe-process {
        font-size: 14px;
        line-height: 1.5;
    }
</style>
<html><body>
    

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maady";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT title, category, ingredients, process FROM recipes where category = 'main-dishes'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="recipe-card">';
        echo '<div class="recipe-title">' . $row["title"] . '</div>';
        echo '<div class="recipe-category">' . $row["category"] . '</div>';
        echo '<div class="recipe-ingredients"><strong>Ingredients:</strong> ' . $row["ingredients"] . '</div>';
        echo '<div class="recipe-process"><strong>Process:</strong> ' . $row["process"] . '</div>';
        echo '</div>';
    }
    echo '<a herf="category.html">GO BACK</a>';
} else {
    echo "No recipes found.";
}
$conn->close();
?>
</body></html>