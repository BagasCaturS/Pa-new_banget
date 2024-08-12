<?php
header('Content-Type: application/json');

$host = "localhost";
$user = "root";
$password = "";
$database = "the_pa";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die(json_encode(['error' => 'Failed to connect to the database']));
}

$searchTerm = isset($_GET['q']) ? $_GET['q'] : '';

$query = $conn->prepare("SELECT id_ova, nama_univ FROM overall WHERE nama_univ LIKE ?");
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
