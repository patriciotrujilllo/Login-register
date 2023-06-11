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
            $resultado = array(
                "mensaje" => "Usuario autenticado",
                "token" => sha1(uniqid(rand(), true))
            );
            setcookie("token", $resultado['token'], time() + (60 * 60 * 24 * 31), "/");
            setcookie("email", $usuario->getEmail(), time() + (60 * 60 * 24 * 31), "/");
            echo json_encode($resultado);
            exit;
        } else {
            http_response_code(401);
            echo json_encode(['error' => 'Credenciales inválidas.']);
            exit;
        }
        break;
}
