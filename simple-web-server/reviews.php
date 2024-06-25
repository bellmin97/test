<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>다른 사람 후기</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .header a {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .header a:hover {
            background-color: #45a049;
        }
        .review {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #fafafa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }
        .review-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .review-header .review-date {
            font-weight: bold;
            color: #555;
        }
        .review-header .review-author {
            font-weight: bold;
            color: #888;
        }
        .review-body {
            margin-bottom: 10px;
        }
        .review-body .review-item-box {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #fff;
        }
        .review-body .review-item-box p {
            margin: 0;
        }
        .review-rating {
            text-align: right;
            color: #f39c12;
            font-size: 1.2em;
        }
        .pagination {
            text-align: center;
            margin-top: 20px;
        }
        .pagination a {
            margin: 0 5px;
            text-decoration: none;
            color: #4CAF50;
        }
        .pagination a:hover {
            text-decoration: underline;
        }
        .nav-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .nav-buttons a {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            flex: 1;
            margin: 0 5px;
        }
        .nav-buttons a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="home.html">홈</a>
            <a href="reviews.php">새로 고침</a>
        </div>
        <h2>다른 사람 후기</h2>
        <div id="reviews">
            <?php include 'load_reviews.php'; ?>
        </div>
        <div class="nav-buttons">
            <a href="index.html">만족도 조사하기</a>
        </div>
    </div>
</body>
</html>

