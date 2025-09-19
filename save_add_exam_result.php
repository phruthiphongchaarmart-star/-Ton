<?php
require("connect_db.php"); // เชื่อมต่อฐานข้อมูล

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_code = $_POST['student_code'] ?? '';
    $course_code  = $_POST['course_code'] ?? '';
    $point        = $_POST['point'] ?? '';

    // ตรวจสอบค่าว่าง
    if (empty($student_code) || empty($course_code) || $point === '') {
        die("Please fill all fields.");
    }

    // แปลงเป็นจำนวนเต็ม
    $point = (int)$point;

    // เพิ่มข้อมูลลงฐานข้อมูล
    $sql = "INSERT INTO exam_result_new (student_code, course_code, point) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $student_code, $course_code, $point);

    if ($stmt->execute()) {
        header("Location: exam_results_list.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
