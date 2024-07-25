<?php
// Include the database connection
require_once("config/config.php");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $OCT_TCT_no = $_POST["OCT_TCT_no"];
    $lot_no = $_POST["lot_no"];
    $ASP_no = $_POST["ASP_no"];
    $survey_no = $_POST["survey_no"];
    $sheet_no = $_POST["sheet_no"];
    $municipality = $_POST["municipality"];
    $barangay = $_POST["barangay"];
    $land_owner = $_POST["land_owner"];
    $geodetic_engr = $_POST["geodetic_engr"];
    $area = $_POST["area"];
    $date_approved = $_POST["date_approved"];
    $uploaded_at = date('Y-m-d H:i:s');

    // Handle pdf file upload
    $pdf_map = $_FILES["pdf_map"]["name"];
    $target_dir_pdf = "uploads/pdf/";
    $target_file_pdf = $target_dir_pdf . basename($pdf_map);
    
    if (move_uploaded_file($_FILES["pdf_map"]["tmp_name"], $target_file_pdf)) {
        // PDF file upload successful
    } else {
        echo "error: Failed to upload PDF file.";
        exit;
    }

    // Handle kml file upload
    $kml_map = $_FILES["kml_map"]["name"];
    $target_dir_kml = "uploads/kml/";
    $target_file_kml = $target_dir_kml . basename($kml_map);
    
    if (move_uploaded_file($_FILES["kml_map"]["tmp_name"], $target_file_kml)) {
        // KML file upload successful
    } else {
        echo "error: Failed to upload KML file.";
        exit;
    }

    // Insert data into the 'records' table
    try {
        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO records (OCT_TCT_no, lot_no, ASP_no, survey_no, sheet_no, pdf_map, kml_map, date_approved, municipality, barangay, land_owner, geodetic_engr, area, uploaded_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind parameters and execute the statement
        $stmt->bind_param("ssssssssssssss", $OCT_TCT_no, $lot_no, $ASP_no, $survey_no, $sheet_no, $pdf_map, $kml_map, $date_approved, $municipality, $barangay, $land_owner, $geodetic_engr, $area, $uploaded_at);
        $stmt->execute();

        // Check if the row was inserted
        if ($stmt->affected_rows > 0) {
            echo "success";
        } else {
            echo "error: Failed to insert the record.";
        }

        // Close the statement
        $stmt->close();
    } catch (Exception $e) {
        // Return error response
        echo "error: " . $e->getMessage();
    }
}
?>
