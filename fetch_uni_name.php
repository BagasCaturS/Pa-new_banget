<?php 
include '1koneksidb.php';

$universityId = $_POST['id_ova'];

// Fetch the university data
$sql = "SELECT id_ova, nama_univ, lokasi, wrld_rank, score_ova, research, citation, int_outlook, teaching FROM overall WHERE id_ova = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $universityId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    echo json_encode($data);
} else {
    echo json_encode([]);
}

$stmt->close();
$conn->close();


?>