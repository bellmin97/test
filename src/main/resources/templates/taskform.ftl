<!-- src/main/resources/templates/taskform.ftl -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Form</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <h1>Task Manager</h1>
        <nav>
            <a href="/tasks">All Tasks</a>
        </nav>
    </header>
    <main>
        <h2>${task.id == null ? "New Task" : "Edit Task"}</h2>
        <form action="${task.id == null ? "/tasks" : "/tasks/update/" + task.id}" method="post">
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="${task.title?default("")}" required>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required>${task.description?default("")}</textarea>
            </div>
            <div>
                <button type="submit">Save</button>
            </div>
        </form>
    </main>
</body>
</html>
