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
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM exam_result WHERE id = $id";
    } else {
        $sql = "SELECT * FROM exam_result";
    }

    $result = mysqli_query($link, $sql);
    $arr = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }
    echo json_encode($arr);
}

//---------------------POST------------------------//
if ($requestMethod == 'POST' && !empty($inputData)) {

    // ตรวจสอบว่ามี field ที่ต้องใช้ครบ
    if (isset($inputData['student_code'], $inputData['course_code'], $inputData['point'])) {

        $student_code = mysqli_real_escape_string($link, $inputData['student_code']);
        $course_code = mysqli_real_escape_string($link, $inputData['course_code']);
        $point = floatval($inputData['point']); // แปลงเป็นตัวเลขทศนิยม

        $sql = "INSERT INTO exam_result (student_code, course_code, `point`) 
        VALUES ('$student_code', '$course_code', $point)";



        $insertResult = mysqli_query($link, $sql);

        if ($insertResult) {
            echo json_encode(['status' => 'ok', 'message' => 'Insert Data Complete']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'SQL Error: ' . mysqli_error($link)]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Missing required fields for insert']);
    }
}

//--------------------PUT-------------------------//
if ($requestMethod == 'PUT' && !empty($inputData)) {
    if (isset($inputData['id'], $inputData['student_code'], $inputData['course_code'], $inputData['point'])) {

        $id = intval($inputData['id']); // แปลงเป็น int ปลอดภัย
        $student_code = mysqli_real_escape_string($link, $inputData['student_code']);
        $course_code = mysqli_real_escape_string($link, $inputData['course_code']);
        $point = floatval($inputData['point']);

        $sql = "UPDATE exam_result 
                SET student_code = '$student_code', 
                    course_code = '$course_code', 
                    `point` = $point
                WHERE id = $id";

        $updateResult = mysqli_query($link, $sql);

        if ($updateResult) {
            echo json_encode(['status' => 'ok', 'message' => 'Update Data Complete']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'SQL Error: ' . mysqli_error($link)]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Missing required fields for update']);
    }
}


// ---------------- DELETE ----------------
if ($requestMethod == 'DELETE') {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM exam_result WHERE id = $id";
        $deleteResult = mysqli_query($link, $sql);

        if ($deleteResult) {
            echo json_encode(['status' => 'ok', 'message' => 'Delete Data Complete']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'SQL Error: ' . mysqli_error($link)]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No id provided']);
    }
}

mysqli_close($link);
