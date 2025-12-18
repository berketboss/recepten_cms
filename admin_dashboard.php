<?php
session_start();
// Beveiliging: als je niet bent ingelogd, word je teruggestuurd naar login.php
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
include '../src/includes/header.php';
?>
<div class="container" style="padding: 50px 20px;">
    <h1 style="font-family: 'Playfair Display', serif;">Chef Dashboard</h1>
    <p>Welkom terug, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>.</p>
    
    <div style="background: white; padding: 30px; border-radius: 10px; margin-top: 30px; border-left: 5px solid #8b7355; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
        <h3>Beheer uw collectie</h3>
        <p>U bent nu in de beveiligde beheeromgeving van GastroArchief.</p>
        <ul style="line-height: 2;">
            <li><strong style="color: #8b7355;">+</strong> Nieuw Recept Toevoegen</li>
            <li><strong style="color: #8b7355;">✎</strong> Bestaande Recepten Bewerken</li>
            <li><a href="logout.php" style="color: #d9534f; text-decoration: none; font-weight: bold;">[ Uitloggen ]</a></li>
        </ul>
    </div>
</div>
<?php include '../src/includes/footer.php'; ?>