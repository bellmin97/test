<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>다른 사람 후기</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #333;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .container {
            max-width: 800px;
            width: 100%;
            padding: 20px;
            margin: 70px auto 0;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .review {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fafafa;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .review .author {
            font-weight: bold;
        }
        .review .rating {
            color: #f39c12;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a {
            margin: 0 5px;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .pagination a:hover {
            background-color: #555;
        }
        /* 반응형 디자인 */
        @media (max-width: 600px) {
            .container {
                margin: 70px 10px 0;
                padding: 15px;
            }
            .pagination a {
                padding: 8px 15px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="home.html">홈</a>
        <a href="reviews.php">다른 사람 후기</a>
        <a href="contact.html">문의하기</a>
        <a href="about.html">소개</a>
    </div>
    <div class="container">
        <h2>다른 사람 후기</h2>
        
        <?php
        // DB 연결
        $servername = "localhost";
        $username = "reviewuser"; // MySQL 사용자 이름
        $password = "password"; // MySQL 비밀번호
        $dbname = "reviewdb"; // 데이터베이스 이름

        $conn = new mysqli($servername, $username, $password, $dbname);

        // 연결 확인
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // 페이지네이션 설정
        $limit = 4; // 한 페이지에 표시할 후기 수
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        // 후기 가져오기
        $sql = "SELECT * FROM reviews ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // 작성자의 이름 뒤에 * 처리
                $author = mb_substr($row['author'], 0, -1) . '*';

                // 별점 평균 계산
                $averageRating = round(($row['service_rating'] + $row['cleanliness_rating'] + $row['friendliness_rating'] + $row['value_rating'] + $row['revisit_rating']) / 5, 1);

                echo "<div class='review'>";
                echo "<div class='author'>$author</div>";
                echo "<div class='rating'>평균 별점: " . str_repeat('★', floor($averageRating)) . "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>후기가 없습니다.</p>";
        }

        // 총 후기 수 가져오기
        $sqlTotal = "SELECT COUNT(*) FROM reviews";
        $resultTotal = $conn->query($sqlTotal);
        $totalReviews = $resultTotal->fetch_row()[0];
        $totalPages = ceil($totalReviews / $limit);

        $conn->close();
        ?>

        <div class="pagination">
            <?php
            for ($i = 1; $i <= $totalPages; $i++) {
                echo "<a href='reviews.php?page=$i'>$i</a>";
            }
            ?>
        </div>
    </div>
</body>
</html>
