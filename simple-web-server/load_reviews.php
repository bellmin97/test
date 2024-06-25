<?php
// load_reviews.php
date_default_timezone_set('Asia/Seoul');

$file = 'survey_results.txt';
$reviews = [];

if (file_exists($file)) {
    $content = file_get_contents($file);
    // 다양한 줄바꿈 문자를 처리
    $content = str_replace(array("\r\n", "\r"), "\n", $content);
    $lines = explode("\n", $content);
    $review = [];
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === "-----------------------------") {
            if (!empty($review)) {
                $reviews[] = $review;
            }
            $review = [];
        } elseif (strpos($line, ": ") !== false) {
            list($key, $value) = explode(": ", $line, 2);
            $key = strtolower(trim($key));
            $value = trim($value);
            if (isset($review[$key])) {
                $review[$key] .= "\n" . $value; // 기존 값에 새로운 값 추가
            } else {
                $review[$key] = $value;
            }
        }
    }
    if (!empty($review)) {
        $reviews[] = $review;
    }

    // 최신 리뷰가 먼저 나오도록 역순으로 정렬
    $reviews = array_reverse($reviews);

    $totalReviews = count($reviews);
    $reviewsPerPage = 3;
    $totalPages = ceil($totalReviews / $reviewsPerPage);
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $currentPage = max(1, min($totalPages, $currentPage));
    $start = ($currentPage - 1) * $reviewsPerPage;

    $pagedReviews = array_slice($reviews, $start, $reviewsPerPage);

    if ($totalReviews > 0) {
        foreach ($pagedReviews as $review) {
            echo '<div class="review">';
            echo '<div class="review-header">';
            echo '<span class="review-date">' . htmlspecialchars($review['날짜']) . '</span>';
            echo '<span class="review-author">' . htmlspecialchars($review['작성자']) . '</span>';
            echo '</div>';
            echo '<div class="review-body">';
            foreach ($review as $key => $value) {
                if ($key !== '날짜' && $key !== '작성자' && $key !== '별점') {
                    echo '<div class="review-item-box">';
                    echo '<strong>' . htmlspecialchars($key) . ':</strong><p>' . nl2br(htmlspecialchars($value)) . '</p>';
                    echo '</div>';
                }
            }
            echo '</div>';
            echo '<div class="review-rating">' . str_repeat('★', intval($review['별점'])) . str_repeat('☆', 5 - intval($review['별점'])) . '</div>';
            echo '</div>';
        }

        // 페이지 네이션
        echo '<div class="pagination">';
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $currentPage) {
                echo "<strong>$i</strong> ";
            } else {
                echo "<a href=\"?page=$i\">$i</a> ";
            }
        }
        echo '</div>';
    } else {
        echo '<p>아직 제출된 후기가 없습니다.</p>';
    }
} else {
    echo '<p>아직 제출된 후기가 없습니다.</p>';
}
?>

