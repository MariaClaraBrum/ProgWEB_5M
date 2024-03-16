<?php
class Ponto{
 
    private $x;
    private $y;
    public static $contador = 0;
 
    public function __construct($x, $y){
        $this->setX($x);
        $this->setY($y);
        self::$contador++;
    }
 
    function setX($x){
        $this->x = $x;
    }
 
    function getX(){
        return $this->x;
    }
 
    function setY($y){
        $this->y = $y;
    }
 
    function getY(){
        return $this->y;
    }
 
    public static function getContador(){
        return self::$contador;
    }
 
    public function calcularDistancia(Ponto $ponto){
        $deltaX = $this->x - $ponto->getX();
        $deltaY = $this->y - $ponto->getY();
        return sqrt(pow($deltaX, 2) + pow($deltaY, 2));
    }
 
    public function calcularDistanciaXY($x, $y){
        $deltaX = $this->x - $x;
        $deltaY = $this->y - $y;
        return sqrt(pow($deltaX, 2) + pow($deltaY, 2));
    }
 
    public static function calcularDistanciaEntrePontos($x1, $y1, $x2, $y2){
        $deltaX = $x2 - $x1;
        $deltaY = $y2 - $y1;
        return sqrt(pow($deltaX, 2) + pow($deltaY, 2));
    }
 
}
 

$x = new Ponto(3, 4);
$y = new Ponto(5, 6);
$z = new Ponto(4, 1);
 
echo "O número de Objetos Criados é  " . Ponto::getContador() . "<br>";
 
echo "A distância entre x  e y é: " . $x->calcularDistancia($y) . "<br>";
 
echo "A distância entre x  e um ponto definido por (1, 3) é: " . $x->calcularDistanciaXY(1, 1) . "<br>";
 
echo "A distância entre dois pontos definidos por (1, 3) e (4, 5) é: " . Ponto::calcularDistanciaEntrePontos(1, 1, 4, 5) . "<br>";
?>