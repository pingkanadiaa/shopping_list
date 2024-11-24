<?php
include('database.php');
include('config/database.php');

header('Content-Type: application/json');
$input = json_decode(file_get_contents('php://input'), true);

if (!empty($input['items'])) {
    $items = implode(", ", $input['items']);
    $query = "INSERT INTO shopping_lists (items) VALUES ('$items')";

    if ($conn->query($query) === TRUE) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $conn->error]);
    }
} else {
    echo json_encode(["success" => false, "error" => "No items provided"]);
}
?>
