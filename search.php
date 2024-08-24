<?php
// search_suggestions.php

header('Content-Type: application/json');

// Get the query from the URL parameter
$query = $_GET['q'] ?? '';

// Connect to the database
include '1koneksidb.php';

// Prepare and execute the query
$stmt = $conn->prepare("SELECT nama_univ FROM campus_info WHERE nama_univ LIKE ? LIMIT 10");
$searchTerm = "%{$query}%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

// Fetch suggestions
$suggestions = [];
while ($row = $result->fetch_assoc()) {
    $suggestions[] = $row['nama_univ'];
}

// Close the connection
$stmt->close();
$conn->close();

// Return suggestions as JSON
echo json_encode($suggestions);
?>
