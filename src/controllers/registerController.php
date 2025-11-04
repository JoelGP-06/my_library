<?php
view("register");

$db = connectSqlite('db.sqlite');

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

if ($email && $password) {
    // Verificamos si ya existe el usuario
    if (userExists($db, $email)) {
        echo "<p style='color:red;text-align:center;'>❌ El usuario ya está registrado.</p>";
    } else {
        // Encriptar contraseña
        $pass_enc = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

        $user = [
            'email' => $email,
            'password' => $pass_enc,
            'created_at' => date('Y-m-d')
        ];

        if (insert($db, 'users', $user)) {
            echo "<p style='color:lightgreen;text-align:center;'>Te has registrado correctamente</p>";
            header("Location: /login");
                } else {
            echo "<p style='color:red;text-align:center;'>Error al registrar el usuario</p>";
        }
    }
}
