<?php
class MidiaModel {
    public $codigo;
    public $tipo;
    public string $nome;
    public $genero;
    public int $anoLanc;
    public string $sinopse;
    public $clasInd;


    // o codigo não está aqui pois eu deixei ele ser auto colocado pelo proprio mysql
    public function __construct(
        $nome, $genero, $anoLanc, $sinopse, $clasInd, $tipo,) 
        {
        $this->nome     = $nome;
        $this->genero   = $genero;
        $this->anoLanc  = $anoLanc;
        $this->sinopse  = $sinopse;
        $this->clasInd  = $clasInd;
        $this->tipo     = $tipo;
    }
}