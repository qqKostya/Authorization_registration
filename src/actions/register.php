<?php

require_once __DIR__ . '/../helpers.php';

// Выносим данных из $_POST в отдельные переменные


$name = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$passwordConfirmation = $_POST['password_confirmation'] ?? null;
$avatar = $_FILES['avatar'] ?? null;
$avatarPath = null;

// Выполняем валидацию полученных данных с формы

if (empty($name)) {
    setValidationError('name', 'Неверное имя');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setValidationError('email', 'Указана неправильная почта');
}

if (empty($password)) {
    setValidationError('password', 'Пароль пустой');
}

if ($password !== $passwordConfirmation) {
    setValidationError('password', 'Пароли не совпадают');
}

// Работа с файлом (картинкой)

if (!empty($avatar)) {
    $types = ['image/jpeg', 'image/png'];
    if (!in_array($avatar['type'], $types)) {
        setValidationError('avatar', 'Изображение профиля имеет не верный тип');
    }

    if (($avatar['size'] / 1000000) >= 1) {
        setValidationError('avatar', 'Изображение должно быть меньше 1 мб');
    }
}



// Если список с ошибками валидации не пустой, то производим редирект обратно на форму

if (!empty($_SESSION['validation'])) {
    setOldValue('name', $name);
    setOldValue('email', $email);
    redirect('/register.php');
}

if (!empty($avatar)) {
    $avatarPath = uploadFile($avatar, 'avatar_');
}

var_dump($avatarPath);
