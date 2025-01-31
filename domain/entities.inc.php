<?php
// Classe Cliente
class Cliente {
    private int $idCliente;
    private string $nome;
    private string $email;
    private string $telefone;
    private DateTime $dataCadastro;
    private array $financiamentos = []; // Lista de financiamentos

    public function __construct(int $idCliente, string $nome, string $email, string $telefone, DateTime $dataCadastro) {
        $this->idCliente = $idCliente;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->dataCadastro = $dataCadastro;
    }

    // Getters e Setters
    public function getIdCliente(): int { return $this->idCliente; }
    public function getNome(): string { return $this->nome; }
    public function getEmail(): string { return $this->email; }
    public function getTelefone(): string { return $this->telefone; }
    public function getDataCadastro(): DateTime { return $this->dataCadastro; }

    public function setNome(string $nome): void { $this->nome = $nome; }
    public function setEmail(string $email): void { $this->email = $email; }
    public function setTelefone(string $telefone): void { $this->telefone = $telefone; }

    // Adiciona financiamento à lista do cliente
    public function addFinanciamento(Financiamento $financiamento): void {
        $this->financiamentos[] = $financiamento;
    }

    // Retorna a lista de financiamentos do cliente
    public function getFinanciamentos(): array {
        return $this->financiamentos;
    }
}



// ------------------------------------------------------------------------------------


// Classe Veiculo
class Veiculo {
    private int $idVeiculo;
    private int $idFinanciamento;  // Relacionamento com o financiamento
    private string $marca;
    private string $modelo;
    private int $ano;
    private ?string $placa;

    public function __construct(int $idVeiculo, int $idFinanciamento, string $marca, string $modelo, int $ano, ?string $placa = null) {
        $this->idVeiculo = $idVeiculo;
        $this->idFinanciamento = $idFinanciamento;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->placa = $placa;
    }

    // Getters e Setters
    public function getIdVeiculo(): int { return $this->idVeiculo; }
    public function getIdFinanciamento(): int { return $this->idFinanciamento; }
    public function getMarca(): string { return $this->marca; }
    public function getModelo(): string { return $this->modelo; }
    public function getAno(): int { return $this->ano; }
    public function getPlaca(): ?string { return $this->placa; }

    public function setMarca(string $marca): void { $this->marca = $marca; }
    public function setModelo(string $modelo): void { $this->modelo = $modelo; }
    public function setAno(int $ano): void { $this->ano = $ano; }
    public function setPlaca(?string $placa): void { $this->placa = $placa; }
}


// ------------------------------------------------------------------------------------

// Classe Financiamento
class Financiamento {
    private string $idFinanciamento;  // Alteração para UUID
    private int $idCliente;           // Relacionamento com o Cliente
    private int $idVeiculo;           // Relacionamento com o Veículo
    private float $valorTotal;
    private int $parcelasTotais;
    private int $parcelasRestantes;
    private float $valorParcela;
    private string $status;
    private DateTime $dataInicio;

    public function __construct(string $idFinanciamento, int $idCliente, int $idVeiculo, float $valorTotal, int $parcelasTotais, int $parcelasRestantes, float $valorParcela, string $status, DateTime $dataInicio) {
        $this->idFinanciamento = $idFinanciamento;
        $this->idCliente = $idCliente;
        $this->idVeiculo = $idVeiculo;
        $this->valorTotal = $valorTotal;
        $this->parcelasTotais = $parcelasTotais;
        $this->parcelasRestantes = $parcelasRestantes;
        $this->valorParcela = $valorParcela;
        $this->status = $status;
        $this->dataInicio = $dataInicio;
    }

    // Getters e Setters
    public function getIdFinanciamento(): string { return $this->idFinanciamento; }
    public function getIdCliente(): int { return $this->idCliente; }
    public function getIdVeiculo(): int { return $this->idVeiculo; }
    public function getValorTotal(): float { return $this->valorTotal; }
    public function getParcelasTotais(): int { return $this->parcelasTotais; }
    public function getParcelasRestantes(): int { return $this->parcelasRestantes; }
    public function getValorParcela(): float { return $this->valorParcela; }
    public function getStatus(): string { return $this->status; }
    public function getDataInicio(): DateTime { return $this->dataInicio; }

    public function setValorTotal(float $valorTotal): void { $this->valorTotal = $valorTotal; }
    public function setParcelasTotais(int $parcelasTotais): void { $this->parcelasTotais = $parcelasTotais; }
    public function setParcelasRestantes(int $parcelasRestantes): void { $this->parcelasRestantes = $parcelasRestantes; }
    public function setValorParcela(float $valorParcela): void { $this->valorParcela = $valorParcela; }
    public function setStatus(string $status): void { $this->status = $status; }
}

?>
