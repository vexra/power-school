<?php
    include '../../includes/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>School Announcements</title>
    <style>
        .announcement { border: 1px solid #ccc; padding: 15px; margin: 15px 0; }
        .title { font-weight: bold; }
        .date, .author { font-size: 0.9em; color: #555; }
    </style>
</head>
<body>

<h1>Add New Announcement</h1>
<form action="create.php" method="post">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title"><br><br>
    <label for="content">Content:</label><br>
    <textarea id="content" name="content" rows="4" cols="50"></textarea><br><br>
    <label for="author">Author:</label>
    <input type="text" id="author" name="author"><br><br>
    <label for="date">Date:</label>
    <input type="date" id="date" name="date"><br><br>
    <input type="submit" value="Add Announcement">
</form>

<h1>Announcements</h1>
<div id="announcements">
    <!-- Announcements will be displayed here -->
    <?php
    include 'read.php';
    ?>
</div>

</body>
</html>
