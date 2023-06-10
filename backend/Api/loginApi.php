<?php

header('Content-Type: application/json');
require_once('../Modelo/userModel.php');

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $usuario = new Usuario($data['email'], $data['password']);
        $request = $usuario->userLogin($data['email'], $data['password']);
        if ($request) {
            http_response_code(201);
            echo json_encode(['mensaje' => 'Se inicio sesion.']);
            exit;
        } else {
            http_response_code(401);
            echo json_encode(['error' => 'Credenciales inválidas.']);
            exit;
        }
        break;
}
