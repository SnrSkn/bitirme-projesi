<?php
require "baglan.php";
if (!isset($_SESSION['ogrNo'])) {
    header("Location: index.php");
    exit();
}

$ogrNo = $_SESSION['ogrNo'];
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OgreNet</title>
    <link rel="icon" href="img/deu_amblem.png" type="image/png">
    <meta name="keywords" content="Python,Java,JapaScript " />
    <meta name="description" content="ogrenet" />
    <!--Font-Google-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet" />
    <!--Css-->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="css/mobile.css">
    <style>
        .yakinda {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
            background-color: #f4f4f4;
            color: #333;
        }

        .coming-soon {
            font-size: 50px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.1);
                opacity: 0.7;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>
<header>
    <?php
    $stmt = $conn->prepare($sql3);
    $stmt->bind_param("s", $ogrNo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<table style='width: 250px;'>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td><b>Kullanıcı</b></td><td><b>" . htmlspecialchars($row["Isim"]) . " " . htmlspecialchars($row["Soyisim"]) . "</b></td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Veri bulunamadı</p>";
    }
    ?>
    <?php require "header.php"; ?>
</header>

<body>
    <div class="yakinda">
        <h1 class="coming-soon">BAKIMDA</h1>
    </div>
    <script src="scripts.js"></script>
</body>

</html>