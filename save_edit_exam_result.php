<?php
require("connect_db.php"); // เชื่อมต่อฐานข้อมูล

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $student_code = $_POST['student_code'] ?? '';
    $course_code  = $_POST['course_code'] ?? '';
    $score        = $_POST['score'] ?? '';

    // ตรวจสอบค่าว่าง
    if (empty($id) || empty($student_code) || empty($course_code) || $score === '') {
        die("Please fill all fields.");
    }

    // แปลง score เป็นจำนวนเต็ม
    $score = (int)$score;

    // อัปเดตข้อมูลลงฐานข้อมูล
    $sql = "UPDATE exam_result_new 
            SET student_code = ?, course_code = ?, point = ? 
            WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $student_code, $course_code, $score, $id);

    if ($stmt->execute()) {
        // ถ้าแก้ไขสำเร็จ กลับไปหน้า list
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
