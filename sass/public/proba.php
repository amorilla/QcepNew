<?php
$newUser = new Usuari($email, $username, $isAdmin);
$userModel = new UsuariModel;
$creado = $userModel->create($user);
