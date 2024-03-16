<?php
declare(strict_types=1);

class Funcionario{    
    /**
    * @return void
    */
    public function __construct
    (
        private int $codigo, 
        private string $nome, 
        private float $salarioBase
    ) {

    }
    /**
    * @return string
    */
    public function getNome() {
        return $this->nome;
    }

    /**
    * @return int
    */
    public function getCodigo() {
        return $this->codigo;
    }

    /**
    * @return float
    */
    public function getSalarioBase() {
        return $this->salarioBase;
    }

    /**
    * @param  float $salarioBase
    * @return self
    */
    public function setSalarioBase($salarioBase) {
        $this->salarioBase = $salarioBase;
        return $this;
    }

    /**
    * @return float
    */
    public function getSalarioLiquido() {
        $inss = $this->salarioBase * 0.1;
        $ir = 0.0;
        if ($this->salarioBase > 2000.0) {
            $ir = ($this->salarioBase - 2000.0) * 0.12;
        }
        return $this->salarioBase - $inss - $ir;
    }
    
    /**
    * @return string
    */
    public function __toString() {
        return get_class($this) . "\n Codigo: " . 
        $this->getCodigo() . "\n Nome: " . 
        $this->getNome() . "\n Salario Base: " . 
        $this->getSalarioBase() . "\n Salario liquido: " . 
        $this->getSalarioLiquido();
    }
}

class Servente extends Funcionario{    

    /**
    * @return float
    */
    public function getSalarioLiquido(){
        return parent::getSalarioLiquido() + (5/100 * $this->getSalarioBase() );       
    }
}

class Motorista extends Funcionario{
    public function __construct(
        int $codigo, 
        string $nome, 
        float $salarioBase,
        private string $cnh
    ){
        parent::__construct($codigo, $nome, $salarioBase);
    }    

    /**
    * @return string
    */
    public function getCnh(){
        return $this->cnh;
    }    

    /**
    * @param  string $cnh
    * @return self
    */

    public function setCnh(string $cnh){
        $this->cnh = $cnh;
        return $this;
    }
}
class MestreDeObras extends Servente
{    

    /**
    * @return void
    */

    public function __construct(
        int $codigo, 
        string $nome, 
        float $salarioBase,
        private int $totalteam,
    ){
        parent::__construct($codigo, $nome, $salarioBase);
    }    

    /**
    * @param  int 
    * @return self
    */

    public function setQtdTeam(int $totalteam){
        $this->totalteam = $totalteam;
        return $this;
    }    
    
    /**
    * @return int
    */

    public function getQtdTeam(){
        return $this->totalteam;
    }    
    
    /**
    * @return float
    */

    public function getSalarioLiquido(){
        if ($this->totalteam >= 10) {
            $base =  (10/100 * parent::getSalarioLiquido()) * (int) $this->totalteam /10;  
            return $base + parent::getSalarioLiquido();
            //return (int) $this->totalteam / 10 * parent::getSalarioLiquido();
        }
        return parent::getSalarioLiquido();
    }
}
function render(Funcionario $funcionario){
    echo "<br> Apresentação de Salarios <br>";
    echo "<br>";
    echo "Nome: ". $funcionario->getNome()."<br>";
    echo "Tipo: ". get_class($funcionario) ."<br>";
    echo "Salario: ". $funcionario->getSalarioLiquido()."<br>";


}

$mestre = new MestreDeObras(2, 'Maria Clara', 2200, 40);
$motorista = new Funcionario(1, 'Matheus', 1000);

render($mestre);
render($motorista);