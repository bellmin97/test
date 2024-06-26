<?php
// 데이터베이스 연결 설정
$servername = "localhost";
$username = "reviewuser"; // MySQL 사용자 이름
$password = "password"; // MySQL 비밀번호
$dbname = "reviewdb"; // 데이터베이스 이름

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// POST 데이터 수신
$author = $_POST['author'];
$service_rating = $_POST['service_rating'];
$cleanliness_rating = $_POST['cleanliness_rating'];
$friendliness_rating = $_POST['friendliness_rating'];
$value_rating = $_POST['value_rating'];
$revisit_rating = $_POST['revisit_rating'];
$improve = $_POST['improve'];

// 데이터베이스에 삽입
$sql = "INSERT INTO reviews (author, service_rating, cleanliness_rating, friendliness_rating, value_rating, revisit_rating, improve)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("siiiiis", $author, $service_rating, $cleanliness_rating, $friendliness_rating, $value_rating, $revisit_rating, $improve);

if ($stmt->execute()) {
    echo "후기가 성공적으로 저장되었습니다.";
} else {
    echo "오류가 발생했습니다: " . $stmt->error;
}

$stmt->close();
$conn->close();

// 리뷰 페이지로 리디렉트
header("Location: reviews.php");
exit;
?>
