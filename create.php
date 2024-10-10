<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    // Check if email already exists
    $check_email = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $result = $check_email->get_result();

    if ($result->num_rows > 0) {
        $error = "Email already exists. Something went wrong try again.";
    } else {
        if ($_POST['password'] !== $_POST['confirmpassword']) {
            $error = "Passwords don't match. Try again.";
        } else {
            // Prepare the SQL query
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $password);

            // Execute the query
            if (!$stmt->execute()) {
                $error = "Error: " . $stmt->error;
            } else {
                header("Location: index.php");
                exit;
            }

            $stmt->close();
        }
    }

    $check_email->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./scss/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Shadows+Into+Light&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pinyon+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">

    <title>log in screen</title>
</head>
<body class="hundred">
    <nav>
        <div class="logo">
            <a href="./index.php">
            <img src="./assets/black-logo.svg" alt="Logo">
            </a>
        </div>
        <ul class="links">
            <li><a href="./cards.php">Preview All</a></li>
        </ul>
    </nav>
    <main class="create-screen grid">
        <div class="col-12 form-container">
            <div class="form-wrap">
                <div class="intro">
                    <h2>Create a New Account</h2>
                    <p>Figma ipsum component variant main layer. Fill union image project text strikethrough asset link slice editor. Create plugin overflow variant flatten pen invite effect pen undo. Pen bold comment asset align flatten. Slice layer follower plugin rotate bullet distribute thumbnail strikethrough.</p>
                </div>
                <form class="login-form" action="" method="post">
                    <input type="text" id="name" name="name" placeholder="name" required>
                    <input type="email" id="email" name="email" placeholder="email" required>
                    <input type="password" id="password" name="password" placeholder="password" required>
                    <input type="password" id="confirmpassword" name="confirmpassword" placeholder="confirm password" required>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-login">Sign Up</button>
                    </div>
                    <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
                </form>
            </div>
        </div>

        <div class="scrolling-text-box">
            <div class="scrolling-text-wrap">
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
                    <p>Sign Up</p>
            </div>
        </div>
        
    </main>
    
</body>
</html>

