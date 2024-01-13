<?php
require_once 'koneksi.php';

// Fetch books from the database
$query = "SELECT * FROM proyek";
$query_run = mysqli_query($conn, $query);

$books = [];
if (mysqli_num_rows($query_run) > 0) {
    while ($row = mysqli_fetch_assoc($query_run)) {
        $books[] = $row;
    }
}

// Encode the array to JSON format
$json_data = json_encode($books, JSON_PRETTY_PRINT);

// Output the JSON data
header('Content-Type: application/json');
echo $json_data;
?>
