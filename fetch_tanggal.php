<?php
include '1koneksidb.php'; // Include your database connection file

// Check if the 'year' parameter is set in the URL
if (isset($_GET['year']) && !empty($_GET['year'])) {
    $year = $_GET['year'];

    // Prepare and execute your SQL queries to fetch the data for the given year
    $query = "SELECT * FROM overall WHERE tanggal = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $year);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];

    // Fetch the results and store them in an associative array
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Structure the data as needed for your JavaScript
            $data[] = [
                'nama_univ' => $row['nama_univ'],
                'lokasi' => $row['lokasi'],
                'wrld_rank' => $row['wrld_rank'],
                'teaching' => $row['teaching'],
                'research' => $row['research'],
                'citation' => $row['citation'],
                'int_outlook' => $row['int_outlook'],
                'income' => $row['income'],
                'rank_inc' => $row['rank_inc'],
                'rank_ctn' => $row['rank_ctn'],
                'rank_rsc' => $row['rank_rsc'],
                'rank_int_outlook' => $row['rank_int_outlook'],
                'rank_teaching' => $row['rank_teaching'],
                'tanggal' => $row['tanggal'],
            ];
        }
    } else {
        // Return an empty array if no results are found
        echo json_encode([]);
        exit;
    }

    // Return the data as JSON
    echo json_encode($data);
} else {
    // If the 'year' parameter is not set or is empty, return an empty array
    echo json_encode([]);
}

// Close the database connection
$conn->close();
?>
