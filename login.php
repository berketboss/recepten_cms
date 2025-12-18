<?php
session_start();

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Dit is de controle die morgen altijd werkt
    if ($user === 'admin' && $pass === 'geheim') {
        $_SESSION['user_id'] = 1;
        $_SESSION['username'] = 'admin';
        header('Location: admin_dashboard.php');
        exit;
    } else {
        $error = "Onjuiste inloggegevens!";
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Chef Login - GastroArchief</title>
</head>
<body style="background: #f8f8f8; display: flex; justify-content: center; align-items: center; height: 100vh; font-family: sans-serif;">
    <div style="background: white; padding: 40px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 350px;">
        <h2 style="text-align: center; color: #8b7355; font-family: 'Playfair Display', serif;">Chef Login</h2>
        
        <?php if(isset($error)) echo "<p style='color:red; text-align:center;'>$error</p>"; ?>
        
        <form method="post">
            <label style="font-size: 0.8em; color: #999;">Gebruikersnaam</label>
            <input type="text" name="username" value="admin" required style="width:100%; padding:12px; margin-bottom:15px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
            
            <label style="font-size: 0.8em; color: #999;">Wachtwoord</label>
            <input type="password" name="password" value="geheim" required style="width:100%; padding:12px; margin-bottom:15px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
            
            <button type="submit" name="login" class="button" style="width:100%; padding: 12px; background: #8b7355; color: white; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">INLOGGEN</button>
        </form>
        
        <p style="text-align: center; margin-top: 20px; font-size: 0.8em; color: #aaa;">Klik op inloggen om het dashboard te openen.</p>
    </div>
</body>
</html>