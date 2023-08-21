<?php
require_once __DIR__ . '/src/helpers.php';
?>
<!DOCTYPE html>
<html lang="ru" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <title>AreaWeb - авторизация и регистрация</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="assets/app.css">
</head>

<body>

    <form class="card" action="src/actions/login.php" method="post">
        <h2>Вход</h2>

        <?php if (hasMessage('error')) : ?>
            <div class="notice error"><?php echo getMessage('error') ?></div>
        <?php endif; ?>
        <!-- <div class=" notice success">Какое-то сообщение</div> -->

        <label for="name">
            Имя
            <input type="text" id="name" name="email" placeholder="ivan@areaweb.su" aria-invalid="true" required value="<?php echo old('email') ?>" <?php echo validationErrorAttr('email'); ?>>
            <?php if (hasValidationError('email')) : ?>
                <small><?php echo validationErrorMessage('email'); ?></small>
            <?php endif; ?>
        </label>

        <label for="password">
            Пароль
            <input type="password" id="password" name="password" placeholder="******" required>
        </label>

        <button type="submit" id="submit">Продолжить</button>
    </form>

    <p>У меня еще нет <a href="/register.html">аккаунта</a></p>

    <script src="assets/app.js"></script>
    </bo