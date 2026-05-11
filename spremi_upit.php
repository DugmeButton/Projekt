<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "kontakt";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    $saved = false;
} else {
    $ime = trim($_POST["ime"] ?? "");
    $prezime = trim($_POST["prezime"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $upit = trim($_POST["upit"] ?? "");

    if ($ime !== "" && $prezime !== "" && $email !== "" && $upit !== "") {
        $stmt = $conn->prepare("INSERT INTO upiti (ime, prezime, email, upit) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $ime, $prezime, $email, $upit);
        $saved = $stmt->execute();
        $stmt->close();
    } else {
        $saved = false;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upit</title>
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<main class="success-page">
    <section class="success-box">
        <?php if ($saved): ?>
            <h1>Upit je poslan</h1>
            <p>Hvala na poruci. Odgovorit ćemo u najkraćem roku.</p>
            <div class="hero-actions">
                <a href="kontakt.html" class="btn">Novi upit</a>
                <a href="index.html" class="btn btn-light">Početna</a>
            </div>
        <?php else: ?>
            <h1>Upit nije poslan</h1>
            <p>Provjeri podatke i pokušaj ponovno.</p>
            <div class="hero-actions">
                <a href="kontakt.html" class="btn">Pokušaj ponovno</a>
                <a href="index.html" class="btn btn-light">Početna</a>
            </div>
        <?php endif; ?>
    </section>
</main>

</body>
</html>
