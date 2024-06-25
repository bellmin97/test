<?php
// submit.php

// 데이터가 POST 방식으로 전송되었는지 확인합니다.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 설문조사 데이터를 변수에 저장합니다.
    $author = $_POST['author'];
    $headline = $_POST['headline'];
    $good = $_POST['good'];
    $improve = $_POST['improve'];
    $revisit = $_POST['revisit'];
    $rating = $_POST['rating'];

    // 현재 날짜와 시간을 가져옵니다.
    $date = date('Y-m-d H:i:s');

    // 설문조사 데이터를 저장할 파일을 엽니다.
    $file = 'survey_results.txt';
    $current = file_get_contents($file);
    
    // 새로운 설문조사 데이터를 추가합니다.
    $current .= "날짜: " . $date . "\n";
    $current .= "작성자: " . $author . "\n";
    $current .= "한줄평: " . $headline . "\n";
    $current .= "좋았던 점: " . $good . "\n";
    $current .= "불편하거나 개선했으면 하는 점: " . $improve . "\n";
    $current .= "재방문 의사: " . $revisit . "\n";
    $current .= "별점: " . $rating . "\n";
    $current .= "-----------------------------\n";

    // 파일에 내용을 저장합니다.
    file_put_contents($file, $current);

    // 성공 메시지 페이지로 리디렉션합니다.
    header('Location: thankyou.html');
    exit;
}
?>

