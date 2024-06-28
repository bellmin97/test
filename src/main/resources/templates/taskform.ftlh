<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Task</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
        }
        h1 {
            color: #b30000;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .button {
            background-color: #b30000;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            text-align: center;
        }
        .button:hover {
            background-color: #800000;
        }
    </style>
</head>
<body>
    <h1>New Task</h1>
    <form action="/tasks" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="5" required></textarea>
        
        <button type="submit" class="button">Save</button>
    </form>
</body>
</html>
