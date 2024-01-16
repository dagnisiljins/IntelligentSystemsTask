<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task_manager";
$connectionError = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    $connectionError = "Connection failed: " . $conn->connect_error;
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task_name'])) {
        $task_name = $conn->real_escape_string($_POST['task_name']);
        $task_description = $conn->real_escape_string($_POST['task_description']);
        $sql = "INSERT INTO tasks (task_name, task_description) VALUES ('$task_name', '$task_description')";
        if ($conn->query($sql)) {
            header('Location: index.php');
            exit();
        } else {
            $connectionError = "Error: " . $conn->error;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete'])) {
        $id = $conn->real_escape_string($_GET['delete']);
        $sql = "DELETE FROM tasks WHERE id = $id";
        if (!$conn->query($sql)) {
            $connectionError = "Error: " . $conn->error;
        }
    }

    $sql = "SELECT * FROM tasks";
    $result = $conn->query($sql);
}

if ($conn) {
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            color: #333;
        }

        h1 {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
        }

        form {
            max-width: 500px;
            margin: 2rem auto;
            padding: 1rem;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background: #333;
            color: #fff;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background: #555;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background: #fff;
            margin: 1rem auto;
            padding: 0.5rem;
            max-width: 500px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        a {
            color: red;
            text-decoration: none;
            margin-left: 1rem;
        }

        a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
<h1>Task Manager</h1>

<!-- Display connection error -->
<?php if ($connectionError): ?>
    <div style="color: red;"><?= $connectionError; ?></div>
<?php endif; ?>

<!-- Form to add new tasks -->
<form action="index.php" method="post">
    <input type="text" name="task_name" placeholder="Task Name" required>
    <textarea name="task_description" placeholder="Task Description" required></textarea>
    <button type="submit">Add Task</button>
</form>

<!-- List of tasks -->
<ul>
    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <li>
                <?= htmlspecialchars($row["task_name"]) ?> - <?= htmlspecialchars($row["task_description"]) ?>
                <a href="index.php?delete=<?= $row["id"] ?>">Delete</a>
            </li>
        <?php endwhile; ?>
    <?php else: ?>
        <li>No tasks found</li>
    <?php endif; ?>
</ul>
</body>
</html>
