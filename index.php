<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h1 {
            margin-top: 0;
            font-size: 24px;
        }
        .task-form {
            display: flex;
            margin-bottom: 20px;
        }
        .task-form input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }
        .task-form button {
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .task-form button:hover {
            background: #0056b3;
        }
        .task-list {
            list-style-type: none;
            padding: 0;
        }
        .task-item {
            padding: 10px;
            margin-bottom: 5px;
            background-color: #f4f4f4;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Task List</h1>
        <form method="post" class="task-form">
            <input type="text" name="task" placeholder="Enter a new task" required>
            <button type="submit">Add Task</button>
        </form>
        <ul class="task-list">
            <?php
            session_start();

            if (!isset($_SESSION['tasks'])) {
                $_SESSION['tasks'] = [];
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task'])) {
                $task = htmlspecialchars($_POST['task']);
                $_SESSION['tasks'][] = $task;
            }

            foreach ($_SESSION['tasks'] as $task) {
                echo "<li class='task-item'>" . $task . "</li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>
