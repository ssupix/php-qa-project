<?php
include_once 'crud.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile</title>
    <link rel="stylesheet" href="./scss/style.css">
</head>
<body class="edit">
    <main class="grid">
        <header class="col-12">
            <h1>Company Profile</h1>
            <a href="cards.php">view all</a>
        </header>
        <div class="form col-12">
            <form method="post">
                <input type="text" name="fn" placeholder="First Name" value="<?php if (isset($editData)) echo $editData['fn']; ?>" required />
                <input type="text" name="ln" placeholder="Last Name" value="<?php if (isset($editData)) echo $editData['ln']; ?>" required />
                <input type="text" name="photo" placeholder="Photo URL" value="<?php if (isset($editData)) echo $editData['photo']; ?>" required />
                <input type="text" name="job" placeholder="Job Title" value="<?php if (isset($editData)) echo $editData['job']; ?>" required />
                <input type="text" name="quote" placeholder="Personal Quote" value="<?php if (isset($editData)) echo $editData['quote']; ?>" required />
                <input type="text" name="skills" placeholder="Skills/Hobbies" value="<?php if (isset($editData)) echo $editData['skills']; ?>" required />
                <input type="text" name="dislikes" placeholder="Dislikes" value="<?php if (isset($editData)) echo $editData['dislikes']; ?>" required />

                <?php if (isset($editData)) { ?>
                    <button type="submit" name="update">Update</button>
                <?php } else { ?>
                    <button type="submit" name="save">Save</button>
                <?php } ?>
            </form>

            <div class="banner col-12"></div>

            <h2 class="col-12">Entries</h2>
            <table class="db-entries col-12">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Photo</th>
                    <th>Job Title</th>
                    <th>Personal Quote</th>
                    <th>Skills/Hobbies</th>
                    <th>Pet Peeves</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                $res = $userdb->query("SELECT * FROM employees");
                while ($row = $res->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fn']; ?></td>
                        <td><?php echo $row['ln']; ?></td>
                        <td><img src="<?php echo $row['photo']; ?>" alt="Photo" width="100"></td>
                        <td><?php echo $row['job']; ?></td>
                        <td><?php echo $row['quote']; ?></td>
                        <td><?php echo $row['skills']; ?></td>
                        <td><?php echo $row['dislikes']; ?></td>
                        <td><a href="?edit=<?php echo $row['id']; ?>" onclick="return confirm('Do you want to edit this entry?');">Edit</a></td>
                        <td><a href="?del=<?php echo $row['id']; ?>" onclick="return confirm('Do you want to delete this entry?');">Delete</a></td>
                        <td><a href="./preview.php?preview=<?php echo $row['id']?>">see profile</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </main>
</body>
</html>
