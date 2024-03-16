<?php

abstract class Telefone{
    public string $ddd;
    public string $numero;

    public function __construct(string $ddd, string $numero){
        $this->ddd = $ddd;
        $this->numero = $numero;
    }

    abstract public function calcularCusto(int $tempo): float;
}

abstract class Celular extends Telefone{
    public string $operadora;
    public float $custoMinut;

    public function __construct(string $ddd, string $numero, float $custoMinuto, string $operadora){
        parent::__construct($ddd, $numero);
        $this->custoMinuto = $custoMinuto;
        $this->operadora = $operadora;
    }
}

class Fixo extends Telefone{
    private float $custoMinuto;

    public function __construct(string $ddd, string $numero, float $custoMinuto){
        parent::__construct($ddd, $numero);
        $this->custoMinuto = $custoMinuto;
    }

    public function calcularCusto(int $tempo): float{
        return $tempo * $this->custoMinuto;
    }
}

class PrePago extends Celular{
    public function calcularCusto(int $tempo): float{
        return $tempo * ($this->custoMinuto * 1.4);
    }
}

class PosPago extends Celular{
    public function calcularCusto(int $tempo): float{
        return $tempo * ($this->custoMinuto * 0.9);
    }
}


$fixo = new Fixo("DDD", "30303030", 0.3);
$prePago = new PrePago("11", "400289228", 0.2, "Claro");
$posPago = new PosPago("11", "898989899", 0.4, "Vivo");

$tempo = 15;

echo "Custo da Ligaçao Fixa: " . $fixo->calcularCusto($tempo) . " reais <br>";
echo "Custo da Ligaçao Pré-paga: " . $prePago->calcularCusto($tempo) . " reais <br>";
echo "Custo da Ligaçao Pós-paga: " . $posPago->calcularCusto($tempo) . " reais <br>";

?>
