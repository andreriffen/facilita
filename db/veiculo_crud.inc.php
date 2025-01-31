<?php
// veiculo_crud.php
require 'db_connect.inc.php';

class VeiculoCRUD {
    
    //CRIAR
    public static function create(Veiculo $veiculo) {
        global $conn;
        $sql = "INSERT INTO veiculos (id_cliente, marca, modelo, ano, placa) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$veiculo->getIdCliente(), $veiculo->getMarca(), $veiculo->getModelo(), $veiculo->getAno(), $veiculo->getPlaca()]);
        return $conn->lastInsertId();
    }

    //LER TODOS
    public static function readAll() {
        global $conn;
        $sql = "SELECT * FROM veiculos";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //ALTERAR
    public static function update(Veiculo $veiculo) {
        global $conn;
        $sql = "UPDATE veiculos SET marca = ?, modelo = ?, ano = ?, placa = ? WHERE id_veiculo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$veiculo->getMarca(), $veiculo->getModelo(), $veiculo->getAno(), $veiculo->getPlaca(), $veiculo->getIdVeiculo()]);
    }
    
    //DELETAR
    public static function delete($id_veiculo) {
        global $conn;
        $sql = "DELETE FROM veiculos WHERE id_veiculo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id_veiculo]);
    }
    
    //PESQUISAR - PLACA
    public static function searchByPlaca($placa) {
        global $conn;
        $sql = "SELECT * FROM veiculos WHERE placa = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$placa]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>
