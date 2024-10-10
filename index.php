<?php
session_start(); // Start the session
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL query
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header("Location: cards.php");
            // Redirect to a protected page or dashboard
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No user found with that email.";
    }

    $stmt->close();
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
    <main class="login-screen grid">
        <div class="col-6 thumb">
            <div class="image"></div>
        </div>
        <div class="col-6 form-container">
            <div class="form-wrap">
                <div class="intro">
                    <h2>Student Database Login </h2>
                    <p>Figma ipsum component variant main layer. Fill union image project text strikethrough asset link slice editor. Create plugin overflow variant flatten pen invite effect pen undo. Pen bold comment asset align flatten. Slice layer follower plugin rotate bullet distribute thumbnail strikethrough.</p>
                </div>
                <form class="login-form" autocomplete="off" action="" method="post"> 
                    <input type="email" id="email" name="email" placeholder="email" required autocomplete="off">
                    <input type="password" id="password" name="password" placeholder="password" required autocomplete="off">
                    <div class="form-actions">
                        <button type="submit" class="btn btn-login">Log In</button>
                        <a type="button" class="btn btn-create-account" href="./create.php">Create Account</a>
                    </div>
                    <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
                </form>
            </div>
        </div>
        <h1 class="col-12">
            <img src="./assets/login-title.svg" alt="LOG IN">
        </h1>

        <div class="scrolling-text-box">
            <div class="scrolling-text-wrap">
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
                    <p>Login</p>
            </div>
        </div>
        
    </main>
    
</body>
</html>
