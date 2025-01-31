<?php
// cliente_crud.php
require_once 'db_connect.inc.php';

class ClienteCRUD {
    
    // CRIAR
    public static function create(Cliente $cliente) {
        global $conn;
        $sql = "INSERT INTO clientes (nome, email, telefone) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$cliente->getNome(), $cliente->getEmail(), $cliente->getTelefone()]);
        return $conn->lastInsertId();
    }
    
    //LER TODOS
    public static function readAll() {
        global $conn;
        $sql = "SELECT * FROM clientes";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    //ALTERAR
    public static function update(Cliente $cliente) {
        global $conn;
        $sql = "UPDATE clientes SET nome = ?, email = ?, telefone = ? WHERE id_cliente = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$cliente->getNome(), $cliente->getEmail(), $cliente->getTelefone(), $cliente->getIdCliente()]);
    }
    
    //DELETAR
    public static function delete($id_cliente) {
        global $conn;
        $sql = "DELETE FROM clientes WHERE id_cliente = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id_cliente]);
    }
    
    //PESQUISAR - NOME/TELEFONE/E-MAIL
    public static function search($criterio, $tipo_criterio) {
    global $conn;

    // Evitar pesquisas muito curtas, como 1 ou 2 caracteres
    if (strlen($criterio) < 3) {
        return [];  // Retorna um array vazio se o critério for muito curto
    }

    // Ajuste da consulta SQL baseada no tipo de critério escolhido
    switch ($tipo_criterio) {
        case 'nome':
            // Para o nome, utilizamos o LIKE de forma mais restritiva
            $sql = "SELECT * FROM clientes WHERE nome LIKE ?";
            break;
        case 'telefone':
            // Para o telefone, podemos buscar por números específicos (não aceitar caracteres como "." ou "-")
            if (!preg_match('/^\d{10,15}$/', $criterio)) {
                return [];  // Retorna vazio se o telefone não tiver o formato correto
            }
            $sql = "SELECT * FROM clientes WHERE telefone LIKE ?";
            break;
        case 'email':
            // Para o e-mail, validar o formato básico de um e-mail
            if (!filter_var($criterio, FILTER_VALIDATE_EMAIL)) {
                return [];  // Retorna vazio se o e-mail não tiver o formato correto
            }
            // Para e-mail, fazer a busca de forma mais exata
            $sql = "SELECT * FROM clientes WHERE email = ?";
            break;
        default:
            return [];
    }

    // Executar a consulta com o termo exato ou LIKE
    $stmt = $conn->prepare($sql);
    $stmt->execute([$criterio]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
?>
