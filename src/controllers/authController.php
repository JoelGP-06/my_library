<?php
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
//$password_enc = password_hash($password,PASSWORD_BCRYPT, ['cost' => 4]); //el cost encripta lo encriptado hasta 4 veces

if (authenticate($db, $email, $password)){
    //iniciar sesión de usuario

    //redirigirnos a books
    header('location:/books');
}else{
    //redirifir a login de nuevo
    header('location:/login');

}