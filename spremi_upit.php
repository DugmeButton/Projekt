<?php
$conn = new mysqli("localhost", "root", "", "kontakt");

if ($conn->connect_error) {
    die("Greška pri spajanju s bazom.");
}

$ime = $_POST['ime'] ?? '';
$prezime = $_POST['prezime'] ?? '';
$email = $_POST['email'] ?? '';
$upit = $_POST['upit'] ?? '';

$stmt = $conn->prepare("INSERT INTO upiti (ime, prezime, email, upit) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $ime, $prezime, $email, $upit);

$uspjeh = $stmt->execute();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poruka poslana</title>
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="styles.css?v=20">
</head>
<body>

<header class="success-header">
    <div class="success-box">
        <?php if ($uspjeh): ?>
            <h1>Upit je uspješno poslan!</h1>
            <p>Hvala vam na poruci. Javit ćemo vam se u najkraćem roku.</p>
            <a href="kontakt.html" class="btn">Pošalji novi upit</a>
            <a href="index.html" class="btn secondary">Povratak na početnu</a>
        <?php else: ?>
            <h1>Došlo je do greške</h1>
            <p>Upit nije spremljen. Pokušajte ponovno.</p>
            <a href="kontakt.html" class="btn">Pokušaj ponovno</a>
        <?php endif; ?>
    </div>
</header>

</body>
</html>