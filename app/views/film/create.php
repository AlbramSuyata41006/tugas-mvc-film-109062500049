<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Film Rekomendasi</title>
</head>
<body>
    <h2>Tambah Film Rekomendasi</h2>

    <?php if (!empty($error) && $error === 'invalid'): ?>
        <div style="padding:10px; margin-bottom:12px; background:#f8d7da; color:#721c24; border:1px solid #f5c6cb;">
            <strong>Validasi Gagal!</strong> Seluruh kolom wajib diisi dengan benar (Tahun minimal 1888, Durasi > 0, dan Rating antara 0.0 - 10.0).
        </div>
    <?php endif; ?>

    <form method="post" action="index.php?page=film&action=store">
        <label>Kode Film</label><br>
        <input type="text" name="kode_film" placeholder="Contoh: FLM-006" required><br><br>

        <label>Judul Film</label><br>
        <input type="text" name="judul" required><br><br>

        <label>Sutradara</label><br>
        <input type="text" name="sutradara" required><br><br>

        <label>Genre</label><br>
        <input type="text" name="genre" placeholder="Contoh: Drama, Sci-Fi" required><br><br>

        <label>Tahun Rilis</label><br>
        <input type="number" name="tahun_rilis" min="1888" max="2030" required><br><br>

        <label>Durasi (Menit)</label><br>
        <input type="number" name="durasi" min="1" required><br><br>

        <label>Rating IMDb (0.0 - 10.0)</label><br>
        <input type="number" step="0.1" name="rating" min="0" max="10" required><br><br>

        <button type="submit">Simpan</button>
        <a href="index.php?page=film">Kembali</a>
    </form>
</body>
</html>