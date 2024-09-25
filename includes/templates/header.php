<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real estate</title>
    <link rel="stylesheet" href="/bienesraices/build/css/app.css">
</head>

<body>
    <header class="header <?php echo isset($homePage) ? 'header--home' : ''; ?>">
        <div class="container header-container">
            <div class="bar">
                <a href="/bienesraices/index.php">
                    <img src="./build/img/logo.svg" alt="Real state logo">
                </a>

                <div class="mobile-menu">
                    <img class="burguer-icon" src="./build/img/barras.svg" alt="burguer menu">
                </div>

                <div class="right">
                    <img class="dark-mode-btn" src="./build/img/dark-mode.svg" alt="dark mode icon">

                    <?php include 'navigation.php' ?>
                </div>
            </div><!--bar-->
            <?php if ($homePage) { ?>
                <h1 class="header-title">Lujosas y exclusivas casas y apts</h1>
            <?php } ?>
        </div>
    </header>