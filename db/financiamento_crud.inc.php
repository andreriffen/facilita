<?php
// financiamento_crud.php
require_once 'db_connect.inc.php';

class FinanciamentoCRUD {
    
    //CRIAR
    public static function create(Financiamento $financiamento) {
        global $conn;
        // Ajustamos a consulta para não precisar do id_financiamento, pois será gerado automaticamente
        $sql = "INSERT INTO financiamentos (id_veiculo, valor_total, parcelas_totais, parcelas_restantes, valor_parcela, status, data_inicio) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $financiamento->getIdVeiculo(), 
            $financiamento->getValorTotal(), 
            $financiamento->getParcelasTotais(),
            $financiamento->getParcelasRestantes(), 
            $financiamento->getValorParcela(), 
            $financiamento->getStatus(), 
            $financiamento->getDataInicio()->format('Y-m-d H:i:s')
        ]);
        
        // Retornamos o UUID gerado pelo banco para o financiamento
        return $conn->lastInsertId(); // Aqui ainda vai retornar o UUID gerado
    }

    //LER TODOS
    public static function readAll() {
        global $conn;
        $sql = "SELECT * FROM financiamentos";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //ALTERAR
    public static function update(Financiamento $financiamento) {
        global $conn;
        // Não alteramos o campo id_financiamento pois ele já é gerado automaticamente e não deve ser atualizado
        $sql = "UPDATE financiamentos SET valor_total = ?, parcelas_totais = ?, parcelas_restantes = ?, valor_parcela = ?, status = ? 
                WHERE id_financiamento = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $financiamento->getValorTotal(), 
            $financiamento->getParcelasTotais(), 
            $financiamento->getParcelasRestantes(), 
            $financiamento->getValorParcela(),
            $financiamento->getStatus(), 
            $financiamento->getIdFinanciamento() // ID ainda é utilizado para identificar qual financiamento será atualizado
        ]);
    }

    //DELETAR
    public static function delete($id_financiamento) {
        global $conn;
        $sql = "DELETE FROM financiamentos WHERE id_financiamento = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id_financiamento]);
    }
    
    //PESQUISAR - ID
    public static function searchById($id) {
        global $conn;
        $sql = "SELECT * FROM financiamentos WHERE id_financiamento = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
