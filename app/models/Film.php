<?php
class Film
{
    public function __construct(private PDO $db) {}

    public function getAll(): array
    {
        $stmt = $this->db->query(
            'SELECT id, kode_film, judul, sutradara, genre, tahun_rilis, durasi, rating 
             FROM film 
             ORDER BY rating DESC, tahun_rilis ASC'
        );
        return $stmt->fetchAll();
    }

    public function findById(int $id): array|false
    {
        $stmt = $this->db->prepare(
            'SELECT id, kode_film, judul, sutradara, genre, tahun_rilis, durasi, rating 
             FROM film 
             WHERE id = :id'
        );
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function insert(array $data): bool
    {
        $sql = 'INSERT INTO film (kode_film, judul, sutradara, genre, tahun_rilis, durasi, rating)
                VALUES (:kode_film, :judul, :sutradara, :genre, :tahun_rilis, :durasi, :rating)';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':kode_film'   => $data['kode_film'],
            ':judul'       => $data['judul'],
            ':sutradara'   => $data['sutradara'],
            ':genre'       => $data['genre'],
            ':tahun_rilis' => $data['tahun_rilis'],
            ':durasi'      => $data['durasi'],
            ':rating'      => $data['rating']
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $sql = 'UPDATE film
                SET kode_film = :kode_film,
                    judul = :judul,
                    sutradara = :sutradara,
                    genre = :genre,
                    tahun_rilis = :tahun_rilis,
                    durasi = :durasi,
                    rating = :rating
                WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id'          => $id,
            ':kode_film'   => $data['kode_film'],
            ':judul'       => $data['judul'],
            ':sutradara'   => $data['sutradara'],
            ':genre'       => $data['genre'],
            ':tahun_rilis' => $data['tahun_rilis'],
            ':durasi'      => $data['durasi'],
            ':rating'      => $data['rating']
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare(
            'DELETE FROM film WHERE id = :id'
        );
        return $stmt->execute([':id' => $id]);
    }
}
?>