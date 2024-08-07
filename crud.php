<?php
include_once 'db.php';

// Script for deleting rows
if (isset($_GET['del'])) {
    $sql = $userdb->query("DELETE FROM employees WHERE id=" . $_GET['del']);
    header("Location: edit.php");
}

// Script for saving new employee
if (isset($_POST['save'])) {
    $fn = $userdb->real_escape_string($_POST['fn']);
    $ln = $userdb->real_escape_string($_POST['ln']);
    $photo = $userdb->real_escape_string($_POST['photo']);
    $job = $userdb->real_escape_string($_POST['job']);
    $quote = $userdb->real_escape_string($_POST['quote']);
    $skills = $userdb->real_escape_string($_POST['skills']);
    $dislikes = $userdb->real_escape_string($_POST['dislikes']);

    $sql = $userdb->query("INSERT INTO employees(fn, ln, photo, job, quote, skills, dislikes) VALUES('$fn', '$ln', '$photo', '$job', '$quote', '$skills', '$dislikes')");
}

// Script for fetching data to update
if (isset($_GET['edit'])) {
    $sql = $userdb->query("SELECT * FROM employees WHERE id=" . $_GET['edit']);
    $editData = $sql->fetch_assoc();
}

// Script for updating rows
if (isset($_POST['update'])) {
    $fn = $userdb->real_escape_string($_POST['fn']);
    $ln = $userdb->real_escape_string($_POST['ln']);
    $photo = $userdb->real_escape_string($_POST['photo']);
    $job = $userdb->real_escape_string($_POST['job']);
    $quote = $userdb->real_escape_string($_POST['quote']);
    $skills = $userdb->real_escape_string($_POST['skills']);
    $dislikes = $userdb->real_escape_string($_POST['dislikes']);

    $sql = $userdb->query("UPDATE employees SET fn='$fn', ln='$ln', photo='$photo', job='$job', quote='$quote', skills='$skills', dislikes='$dislikes' WHERE id=" . $_GET['edit']);
    header("Location: edit.php");
}

// Preview

?>