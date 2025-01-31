<?php

//db/funcionario_crud.inc.php

require_once 'db_connect.inc.php';

class FuncionarioCRUD {

    // Cadastrar novo funcionário
    public static function cadastrarFuncionario($nome, $email, $senha, $admin = 0) {
        global $conn;
    
        // Criptografar senha
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    
        $sql = "INSERT INTO funcionarios (nome, email, senha, admin, data_cadastro) VALUES (?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
    
        try {
            $stmt->execute([$nome, $email, $senha_hash, $admin]);
            return ["success" => true, "message" => "Funcionário cadastrado com sucesso."];
        } catch (PDOException $e) {
            if ($e->errorInfo[1] === 1062) { // Erro de duplicidade (email)
                return ["success" => false, "message" => "E-mail já cadastrado."];
            }
            return ["success" => false, "message" => "Erro ao cadastrar: " . $e->getMessage()];
        }
    }


    // Buscar funcionário por e-mail
    public static function buscarPorEmail($email) {
        global $conn;

        $sql = "SELECT * FROM funcionarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Autenticar funcionário no login
    public static function autenticarFuncionario($email, $senha) {
        $funcionario = self::buscarPorEmail($email);

        if ($funcionario && password_verify($senha, $funcionario['senha'])) {
            return ["success" => true, "funcionario" => $funcionario];
        }

        return ["success" => false, "message" => "E-mail ou senha incorretos."];
    }

    // Atualizar informações do funcionário
    public static function atualizarFuncionario($id_funcionario, $nome, $email, $nova_senha = null) {
        global $conn;

        $sql = "UPDATE funcionarios SET nome = ?, email = ?";
        $params = [$nome, $email];

        // Atualizar senha se fornecida
        if (!empty($nova_senha)) {
            $sql .= ", senha = ?";
            $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
            $params[] = $nova_senha_hash;
        }

        $sql .= " WHERE id_funcionario = ?";
        $params[] = $id_funcionario;

        $stmt = $conn->prepare($sql);

        try {
            $stmt->execute($params);
            return ["success" => true, "message" => "Funcionário atualizado com sucesso."];
        } catch (PDOException $e) {
            return ["success" => false, "message" => "Erro ao atualizar: " . $e->getMessage()];
        }
    }

    // Excluir funcionário
    public static function excluirFuncionario($id_funcionario) {
        global $conn;

        $sql = "DELETE FROM funcionarios WHERE id_funcionario = ?";
        $stmt = $conn->prepare($sql);

        try {
            $stmt->execute([$id_funcionario]);
            return ["success" => true, "message" => "Funcionário excluído com sucesso."];
        } catch (PDOException $e) {
            return ["success" => false, "message" => "Erro ao excluir: " . $e->getMessage()];
        }
    }
}