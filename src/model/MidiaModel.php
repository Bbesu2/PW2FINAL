<?php

enum Clas: string {
    case LIVRE = 'Livre';
    case DEZ = '10';
    case DOZE = '12';
    case QUATORZE = '14';
    case DEZESSEIS = '16';
    case DEZOITO = '18';
}
enum Tipo: string{
    case FILME = 'Filme';
    case SERIE = 'Serie';
}
enum Genero: string {
    case ROMANCE = 'Romance';
    case ACAO = 'Ação';
    case COMEDIA = 'Comédia';
    case ANIMACAO = 'Animação';
    case TERROR = 'Terror';
    case FICCAO = 'Ficção';
}

class MidiaModel {
    public $codigo;
    public Tipo $tipo;
    public string $nome;
    public Genero $genero;
    public int $anoLanc;
    public string $sinopse;
    public Clas $clasInd;


    // o codigo não está aqui pois eu deixei ele ser auto colocado pelo proprio mysql
    public function __construct(
        string $nome,
        Genero $genero,
        int $anoLanc,
        string $sinopse,
        Clas $clasInd,
        Tipo $tipo,) 
        {
        $this->nome     = $nome;
        $this->genero   = $genero;
        $this->anoLanc  = $anoLanc;
        $this->sinopse  = $sinopse;
        $this->clasInd  = $clasInd;
        $this->tipo     = $tipo;
    }
}
