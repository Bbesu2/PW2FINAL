<?php
class SerieController extends SerieModel {
    private PDO $conn;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

//adiciona serie
public function add(SerieModel $serie) {
        $sql = "INSERT INTO midia (nome, genero, anoLanc, sinopse, clasInd, tipo, episodio)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $serie->getNome(),
            $serie->getGenero(),
            $serie->getAnoLanc(),
            $serie->getSinopse(),
            $serie->getClasInd(),
            $serie->getTipo(),
            $serie->getEpisodio()
        ]);
    }

    // READ ALL
    public function list() {
        $stmt = $this->conn->query("SELECT * FROM midia");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function update(serieModel $serie, int $codigo) {
        $sql = "UPDATE midia SET nome=?, genero=?, anoLanc=?, sinopse=?, clasInd=?, tipo=?, episodio=? WHERE codigo=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $serie->getNome(),
            $serie->getGenero(),
            $serie->getAnoLanc(),
            $serie->getSinopse(),
            $serie->getClasInd(),
            $serie->getTipo(),
            $serie->getEpisodio(),
            $codigo
        ]);
    }

    // DELETE
    public function delete(int $codigo) {
        $sql = "DELETE FROM midia WHERE codigo=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$codigo]);
    }
}
