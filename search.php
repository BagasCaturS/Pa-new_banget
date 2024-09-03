<?php
include '1koneksidb.php';

if (isset($_GET['query'])) {
    $searchTerm = $_GET['query'];

    // Prepare and execute the SQL query to fetch suggestions
    $stmt = $conn->prepare("SELECT DISTINCT nama_univ FROM overall WHERE nama_univ LIKE ? LIMIT 4");
    $searchTerm = "%$searchTerm%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch results and store them in an array
    $suggestions = [];
    while ($row = $result->fetch_assoc()) {
        $suggestions[] = $row['nama_univ'];
    }

    // Return the array as JSON
    echo json_encode($suggestions);
}

$conn->close();
?>