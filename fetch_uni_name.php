<?php 
include '1koneksidb.php';

$searchTerm = isset($_GET['q']) ? $_GET['q'] : '';

if (!empty($searchTerm)) {
    // Prepare the SQL statement to search for universities based on the search term
    $query = $conn->prepare("SELECT * FROM overall WHERE nama_univ LIKE ?");
    $searchTermLike = "%" . $searchTerm . "%";
    $query->bind_param('s', $searchTermLike);

    // Execute the query
    $query->execute();
    $result = $query->get_result();

    // Fetch the results as an associative array
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Return the data as JSON
    echo json_encode($data);
} else {
    // If no search term is provided, return an empty array
    echo json_encode([]);
}

// Close the database connection
$conn->close();
?>
