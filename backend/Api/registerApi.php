<?php

header('Content-Type: application/json');
//include_once("./backend/Modelo/userModel.php");
require_once('../Modelo/userModel.php');

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $usuario = new Usuario($data['email'], $data['password']);
        if ($usuario->userRegister($data['email'], $data['password'])) {
            http_response_code(201);
            echo json_encode(['mensaje' => 'El usuario se creo correctamente.']);
            exit;
        }

        break;
}
