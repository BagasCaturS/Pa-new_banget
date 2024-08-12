<?php 
include '1koneksidb.php';

$searchTerm = isset($_POST['search_term']) ? $_POST['search_term'] : '';

$query = $conn->prepare("SELECT * FROM overall WHERE nama_univ LIKE ?");
$searchTermLike = "%$searchTerm%";
$query->bind_param('s', $searchTermLike);

$query->execute();
$result = $query->get_result();

$data = $result->fetch_assoc();

echo json_encode($data);

$conn->close();

?>