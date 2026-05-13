<?php
$conn = new mysqli("localhost", "root", "", "kontakt");
$poruka = "Upit nije poslan.";

if (!$conn->connect_error) {
    $ime = $_POST["ime"] ?? "";
    $prezime = $_POST["prezime"] ?? "";
    $email = $_POST["email"] ?? "";
    $upit = $_POST["upit"] ?? "";

    $stmt = $conn->prepare("INSERT INTO upiti (ime, prezime, email, upit) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $ime, $prezime, $email, $upit);

    if ($stmt->execute()) {
        $poruka = "Upit je uspješno poslan.";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Upit</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1><?php echo $poruka; ?></h1>
</header>
<main>
    <a class="btn" href="kontakt.html">Natrag na kontakt</a>
    <a class="btn" href="index.html">Početna</a>
</main>
</body>
</html>
