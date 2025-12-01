<?php
require_once 'MidiaModel.php';

class SerieModel extends MidiaModel {
    private ?int $episodio;

    public function __construct(
        string $nome,
        Genero $genero,
        int $anoLanc,
        string $sinopse,
        Clas $clasInd,
        Tipo $tipo,
        ?int $episodio = null // aceita null
    ) {
        parent::__construct($nome, $genero, $anoLanc, $sinopse, $clasInd, $tipo);
        $this->episodio = $episodio;
    }

     // Getters
    public function getNome() { return $this->nome; }
    public function getGenero() { return $this->genero; }
    public function getAnoLanc() { return $this->anoLanc; }
    public function getSinopse() { return $this->sinopse; }
    public function getClasInd() { return $this->clasInd; }
    public function getTipo() { return $this->tipo; }

    // Getter
    public function getEpisodio(): ?int {
        return $this->episodio;
    }

    // Setter
    public function setEpisodio(?int $episodio): void {
        $this->episodio = $episodio;
    }
}
