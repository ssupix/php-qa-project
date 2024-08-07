<?php
include_once 'crud.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="card.css">
    <title>Public View</title>
</head>
<body>

        <?php
            $res = $userdb->query("SELECT * FROM employees");
            while ($row = $res->fetch_assoc()) {
        ?>

    <div class="card">
        <div class="img-wrap">
        <img src="<?php echo $row['photo']; ?>" alt="Photo" width="100">
        </div>
        <div class="info-wrap">
            <div class="title">
                <h4>company <span> <?php echo $row['id']; ?></span></h4>
                <h1><?php echo $row['fn']; ?><span> <?php echo $row['ln']; ?></span></h1>
                <h2><?php echo $row['job']; ?></h2>
            </div>
            <div class="details">
                <div class="pair">
                    <h3>Dislikes</h3>
                    <p><?php echo $row['dislikes']; ?></p>
                </div>
                <div class="pair">
                    <h3>Hobbies</h3>
                    <p><?php echo $row['skills']; ?></p>
                </div>
                <q><?php echo $row['quote']; ?></q>
            </div>
            <a href="./edit.php?edit=<?php echo $row['id']?>">edit profile</a>
        </div>
    </div>

    <?php } ?>
    
</body>
</html>