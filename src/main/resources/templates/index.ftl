<!-- src/main/resources/templates/index.ftl -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <h1>Task Manager</h1>
        <nav>
            <a href="/tasks/new">New Task</a>
        </nav>
    </header>
    <main>
        <h2>All Tasks</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <#list tasks as task>
                <tr>
                    <td>${task.id}</td>
                    <td>${task.title}</td>
                    <td>${task.description}</td>
                    <td>
                        <a href="/tasks/edit/${task.id}">Edit</a>
                        <a href="/tasks/delete/${task.id}">Delete</a>
                    </td>
                </tr>
                </#list>
            </tbody>
        </table>
    </main>
</body>
</html>
