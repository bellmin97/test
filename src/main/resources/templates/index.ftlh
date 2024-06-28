<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
        }
        h1 {
            color: #b30000;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #ffcccc;
        }
        tr:nth-child(even) {
            background-color: #ffe6e6;
        }
        a {
            text-decoration: none;
            color: #b30000;
        }
        a:hover {
            text-decoration: underline;
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
    <h1>Tasks</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
        </tr>
        <#list tasks as task>
        <tr>
            <td>${task.id}</td>
            <td>${task.name}</td>
            <td>${task.description}</td>
        </tr>
        </#list>
    </table>
    <a href="/tasks/new" class="button">Add New Task</a>
</body>
</html>
