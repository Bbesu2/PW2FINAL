<?php
class FilmeController {
    private PDO $conn;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    // CREATE
    public function add(FilmeModel $filme) {
        $sql = "INSERT INTO midia (nome, genero, anoLanc, sinopse, clasInd, tipo)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $filme->getNome(),
            $filme->getGenero(),
            $filme->getAnoLanc(),
            $filme->getSinopse(),
            $filme->getClasInd(),
            $filme->getTipo()
        ]);
    }

    // READ ALL
    public function list() {
        $stmt = $this->conn->query("SELECT * FROM midia");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function update(FilmeModel $filme, int $codigo) {
        $sql = "UPDATE midia SET nome=?, genero=?, anoLanc=?, sinopse=?, clasInd=?, tipo=?, episodio=? WHERE codigo=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $filme->getNome(),
            $filme->getGenero(),
            $filme->getAnoLanc(),
            $filme->getSinopse(),
            $filme->getClasInd(),
            $filme->getTipo()
        ]);
    }

    // DELETE
    public function delete(int $codigo) {
        $sql = "DELETE FROM midia WHERE codigo=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$codigo]);
    }
}
