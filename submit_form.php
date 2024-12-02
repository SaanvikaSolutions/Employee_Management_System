<?php
include('./backend/includes/dbconnect.php');


// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Retrieve JSON payload
$data = json_decode(file_get_contents("php://input"), true);
file_put_contents('debug.log', "Received Data: " . print_r($data, true), FILE_APPEND);

// Validate data
if (!$data || !isset($data['client']) || !isset($data['roomDetails'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid data received']);
    exit;
}
$conn->begin_transaction();
try{
    // Insert into clients table
    $client = $data['client'];
    $stmt = $conn->prepare("INSERT INTO clients (`company_name`, `company_address`, `email`, `contact_person`, `phone_number`, `alternate_name`, `alternate_phone`, `property_type`, `project_type`, `apartment_type`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "ssssssssss",
        $client['company_name'],
        $client['company_address'],
        $client['email'],
        $client['contact_person'],
        $client['phone_number'],
        $client['alternate_name'],
        $client['alternate_phone'],
        $client['property_type'],
        $client['project_type'],
        $client['apartment_type']
    );

    if (!$stmt->execute()) {
        echo json_encode(['success' => false, 'message' => 'Failed to insert client data']);
        exit;
    }

    // Get the inserted client_id
    $client_id = $stmt->insert_id;
    $stmt->close();

    // Insert into room_details table
    $roomDetails = $data['roomDetails'];
    $stmt = $conn->prepare("INSERT INTO room_details (`client_id`, `room_name`, `furniture`, `width`, `height`, `quality_type`) VALUES (?, ?, ?, ?, ?, ?)");
    foreach ($roomDetails as $room) {
        // Debug log for each room
        file_put_contents('debug.log', "Room Data: " . print_r($room, true), FILE_APPEND);
        
        $stmt->bind_param(
            "issdds",
            $client_id,
            $room['room_name'],
            $room['furniture'],
            $room['width'],
            $room['height'],
            $room['quality_type']
        );
        

        if (!$stmt->execute()) {
            throw new Exception("Failed to insert room details: " . $stmt->error);
        }
    }

    $stmt->close();
    $conn->close();

    // Respond with success
    echo json_encode(['success' => true, 'message' => 'Data inserted successfully']);
} catch (Exception $e) {
    $conn->rollback();
    file_put_contents('debug.log', "Error: " . $e->getMessage(), FILE_APPEND);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
function logSelections(){
    
}
logSelections();
$roomName = $_POST['room_name'] ?? null;
if (!$roomName) {
    error_log("Room name is missing");
}
?>

