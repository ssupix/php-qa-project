<?php
include_once 'crud.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="card.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Shadows+Into+Light&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Public View</title>
</head>
<body>

        <?php
            $res = $userdb->query("SELECT * FROM employees");
            while ($row = $res->fetch_assoc()) {
        ?>

<div class="card">
        <div class="header">
            <div></div>
            <a class="edit" href="./edit.php?edit=<?php echo $row['id']?>">EDIT</a>
        </div>
        <div class="photo">
            <img src="<?php echo $row['photo']; ?>" alt="Photo" width="100">
        </div>
        <div class="info">
            <h1 class="name"><?php echo $row['fn']; ?><span> <?php echo $row['ln']; ?></span></h1>
            <p class="title"><?php echo $row['job']; ?></p>
            <div class="details">
                <p class="q"><strong>DISLIKES:</strong></p>
                <p class="a"><?php echo $row['dislikes']; ?></p>
                <p class="q"><strong>ADDITIONAL SKILLS:</strong></p>
                <p class="a"><?php echo $row['skills']; ?></p>
            </div>
            <p class="quote"><?php echo $row['quote']; ?></p>
        </div>
        <div class="signature">
                <img src="./logo.svg" alt="logo">
        </div>
        <div class="extra">
            <p class="dates"><strong>ISSUED:</strong> 22/12/2024 <strong>EXPIRES:</strong> 22/12/2029</p>
            <p class="copyright">THIS CARD IS MADE BY FRONT-END DEVELOPER AND PRODUCT DESIGNER MASHA SUPIKHANOVA AT <a href="https://www.mashasupix.com/" target="blank_">MASHASUPIX.COM</a></p>
        </div>
    </div>

    <?php } ?>
    
</body>
</html>