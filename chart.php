<?php 
include '1koneksidb.php';

$selectedUniversities = isset($_POST['selectedUniversities']) ? $_POST['selectedUniversities'] : [];

// Prepare an SQL query with placeholders
$placeholders = implode(',', array_fill(0, count($selectedUniversities), '?'));
$query = $conn->prepare("SELECT nama_univ, teaching, research, int_outlook, citation, income FROM overall WHERE nama_univ IN ($placeholders)");

// Bind the parameters dynamically
$query->bind_param(str_repeat('s', count($selectedUniversities)), ...$selectedUniversities);

$query->execute();
$result = $query->get_result();

// Initialize arrays to store the data
$chartData = [
    'nama_univ' => [],
    'teaching' => [],
    'research' => [],
    'int_outlook' => [],
    'citation' => [],
    'income' => []
];

// Fetch the data from the database
while ($row = $result->fetch_assoc()) {
    $chartData['nama_univ'][] = $row['nama_univ'];
    $chartData['teaching'][] = $row['teaching'];
    $chartData['research'][] = $row['research'];
    $chartData['int_outlook'][] = $row['int_outlook'];
    $chartData['citation'][] = $row['citation'];
    $chartData['income'][] = $row['income'];
}

// Return the data in JSON format
echo json_encode($chartData);

// Close the connection
$conn->close();
?>