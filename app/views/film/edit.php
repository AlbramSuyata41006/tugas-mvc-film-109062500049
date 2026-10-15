<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Film Rekomendasi</title>
</head>
<body>
    <h2>Edit Film Rekomendasi</h2>

    <?php if (!empty($error) && $error === 'invalid'): ?>
        <div style="padding:10px; margin-bottom:12px; background:#f8d7da; color:#721c24; border:1px solid #f5c6cb;">
            <strong>Validasi Gagal!</strong> Pastikan seluruh field terisi dengan format yang valid.
        </div>
    <?php endif; ?>

    <form method="post" action="index.php?page=film&action=update">
        <input type="hidden" name="id" value="<?= $film['id'] ?>">

        <label>Kode Film</label><br>
        <input type="text" name="kode_film"
               value="<?= htmlspecialchars($film['kode_film']) ?>" required><br><br>

        <label>Judul Film</label><br>
        <input type="text" name="judul"
               value="<?= htmlspecialchars($film['judul']) ?>" required><br><br>

        <label>Sutradara</label><br>
        <input type="text" name="sutradara"
               value="<?= htmlspecialchars($film['sutradara']) ?>" required><br><br>

        <label>Genre</label><br>
        <input type="text" name="genre"
               value="<?= htmlspecialchars($film['genre']) ?>" required><br><br>

        <label>Tahun Rilis</label><br>
        <input type="number" name="tahun_rilis" min="1888" max="2030"
               value="<?= htmlspecialchars((string) $film['tahun_rilis']) ?>" required><br><br>

        <label>Durasi (Menit)</label><br>
        <input type="number" name="durasi" min="1"
               value="<?= htmlspecialchars((string) $film['durasi']) ?>" required><br><br>

        <label>Rating IMDb (0.0 - 10.0)</label><br>
        <input type="number" step="0.1" name="rating" min="0" max="10"
               value="<?= htmlspecialchars((string) $film['rating']) ?>" required><br><br>

        <button type="submit">Update</button>
        <a href="index.php?page=film">Kembali</a>
    </form>
</body>
</html>