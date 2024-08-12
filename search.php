<?php
header('Content-Type: application/json');

// Database connection
include '1koneksidb.php';

// Get the search term from the query parameter
$searchTerm = isset($_GET['q']) ? $_GET['q'] : '';

$query = $conn->prepare("SELECT * FROM overall WHERE nama_univ LIKE ?");
$searchTermLike = "%$searchTerm%";
$query->bind_param('s', $searchTermLike);

$query->execute();
$result = $query->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);

$conn->close();
?>
