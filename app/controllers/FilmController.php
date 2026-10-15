<?php
class FilmController
{
    public function __construct(private Film $model) {}

    public function index(): void
    {
        $film = $this->model->getAll();
        $status = $_GET['status'] ?? '';
        require __DIR__ . '/../views/film/index.php';
    }

    public function create(): void
    {
        $error = $_GET['error'] ?? '';
        require __DIR__ . '/../views/film/create.php';
    }

    public function store(): void
    {
        $data = $this->validateInput($_POST, 'create');
        try {
            $berhasil = $this->model->insert($data);
            if ($berhasil) {
                header('Location: index.php?page=film&status=success_add');
            } else {
                header('Location: index.php?page=film&status=error_db');
            }
        } catch (PDOException $e) {
            header('Location: index.php?page=film&status=error_duplicate');
        }
        exit;
    }

    public function edit(): void
    {
        $id = (int) ($_GET['id'] ?? 0);
        $film = $this->model->findById($id);
        if (!$film) {
            header('Location: index.php?page=film&status=error_notfound');
            exit;
        }
        $error = $_GET['error'] ?? '';
        require __DIR__ . '/../views/film/edit.php';
    }

    public function update(): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        $data = $this->validateInput($_POST, 'edit', $id);
        try {
            $berhasil = $this->model->update($id, $data);
            if ($berhasil) {
                header('Location: index.php?page=film&status=success_edit');
            } else {
                header('Location: index.php?page=film&status=error_db');
            }
        } catch (PDOException $e) {
            header('Location: index.php?page=film&status=error_duplicate');
        }
        exit;
    }

    public function delete(): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        try {
            $berhasil = $this->model->delete($id);
            if ($berhasil) {
                header('Location: index.php?page=film&status=success_delete');
            } else {
                header('Location: index.php?page=film&status=error_db');
            }
        } catch (PDOException $e) {
            header('Location: index.php?page=film&status=error_db');
        }
        exit;
    }

    private function validateInput(array $input, string $source = 'create', int $id = 0): array
    {
        $data = [
            'kode_film'   => trim($input['kode_film'] ?? ''),
            'judul'       => trim($input['judul'] ?? ''),
            'sutradara'   => trim($input['sutradara'] ?? ''),
            'genre'       => trim($input['genre'] ?? ''),
            'tahun_rilis' => (int) ($input['tahun_rilis'] ?? 0),
            'durasi'      => (int) ($input['durasi'] ?? 0),
            'rating'      => (float) ($input['rating'] ?? -1)
        ];

        if (
            $data['kode_film'] === '' ||
            $data['judul'] === '' ||
            $data['sutradara'] === '' ||
            $data['genre'] === '' ||
            $data['tahun_rilis'] < 1888 ||
            $data['durasi'] <= 0 ||
            $data['rating'] < 0 || $data['rating'] > 10
        ) {
            if ($source === 'edit' && $id > 0) {
                header("Location: index.php?page=film&action=edit&id={$id}&error=invalid");
            } else {
                header('Location: index.php?page=film&action=create&error=invalid');
            }
            exit;
        }

        return $data;
    }
}
?>