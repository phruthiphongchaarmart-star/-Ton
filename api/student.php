<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$link = mysqli_connect("localhost", "root", "", "โปรเจคทําตาราง");
if (!$link) {
    die(json_encode(["error" => "Database connection failed: " . mysqli_connect_error()]));
}
mysqli_set_charset($link, "utf8");

$inputData = json_decode(file_get_contents("php://input"), true);
$requestMethod = $_SERVER["REQUEST_METHOD"];

// ---------------- GET ----------------
if ($requestMethod == "GET") {
    if (isset($_GET['student_code']) && !empty($_GET['student_code'])) {
        $student_code = $_GET['student_code'];
        $sql = "SELECT * FROM students WHERE student_code = '$student_code'";
    } else {
        $sql = "SELECT * FROM students";
    }

    $result = mysqli_query($link, $sql);
    $arr = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }

    echo json_encode($arr);
}

// ---------------- POST ----------------
if ($requestMethod == 'POST' && !empty($inputData)) {
    $student_code = $inputData['student_code'];
    $students_name = $inputData['students_names']; // ใช้ key จาก JSON
    $gender = $inputData['gender'];

    $sql = "INSERT INTO students (student_code, students_names, gender) VALUES
    ('$student_code', '$students_name', '$gender')";
    $insertResult = mysqli_query($link, $sql);

    if ($insertResult) {
        echo json_encode(['status' => 'ok', 'message' => 'Insert Data Complete']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'SQL Error: ' . mysqli_error($link)]);
    }
}

// ---------------- PUT ----------------
if ($requestMethod == 'PUT' && !empty($inputData)) {
    $student_code = $inputData['student_code'];
    $students_name = $inputData['students_names'];
    $gender = $inputData['gender'];

    $sql = "UPDATE students SET students_names = '$students_name', gender = '$gender'
            WHERE student_code = '$student_code'";
    $updateResult = mysqli_query($link, $sql);

    if ($updateResult) {
        echo json_encode(['status' => 'ok', 'message' => 'Update Data Complete']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'SQL Error: ' . mysqli_error($link)]);
    }
}

// ---------------- DELETE ----------------
if ($requestMethod == 'DELETE') {
    if (isset($_GET['student_code']) && !empty($_GET['student_code'])) {
        $student_code = $_GET['student_code'];

        $sql = "DELETE FROM students WHERE student_code = '$student_code'";
        $deleteResult = mysqli_query($link, $sql);

        if ($deleteResult) {
            echo json_encode(['status' => 'ok', 'message' => 'Delete Data Complete']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'SQL Error: ' . mysqli_error($link)]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No student_code provided']);
    }
}

mysqli_close($link);
