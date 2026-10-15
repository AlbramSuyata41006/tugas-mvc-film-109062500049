<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Rekomendasi Film Top Sepanjang Masa</title>
</head>
<body>
    <h2>Daftar Rekomendasi Film Top Sepanjang Masa</h2>

    <?php if (!empty($status)): ?>
        <?php if ($status === 'success_add'): ?>
            <div style="padding:10px; margin-bottom:12px; background:#d4edda; color:#155724; border:1px solid #c3e6cb;">
                <strong>Berhasil!</strong> Data film baru berhasil ditambahkan ke dalam daftar.
            </div>
        <?php elseif ($status === 'success_edit'): ?>
            <div style="padding:10px; margin-bottom:12px; background:#d4edda; color:#155724; border:1px solid #c3e6cb;">
                <strong>Berhasil!</strong> Data film berhasil diperbarui.
            </div>
        <?php elseif ($status === 'success_delete'): ?>
            <div style="padding:10px; margin-bottom:12px; background:#d4edda; color:#155724; border:1px solid #c3e6cb;">
                <strong>Berhasil!</strong> Data film telah dihapus dari daftar.
            </div>
        <?php elseif ($status === 'error_duplicate'): ?>
            <div style="padding:10px; margin-bottom:12px; background:#f8d7da; color:#721c24; border:1px solid #f5c6cb;">
                <strong>Gagal!</strong> Kode film sudah terdaftar. Gunakan kode film yang berbeda.
            </div>
        <?php elseif ($status === 'error_notfound'): ?>
            <div style="padding:10px; margin-bottom:12px; background:#f8d7da; color:#721c24; border:1px solid #f5c6cb;">
                <strong>Gagal!</strong> Data film yang dicari tidak ditemukan.
            </div>
        <?php else: ?>
            <div style="padding:10px; margin-bottom:12px; background:#f8d7da; color:#721c24; border:1px solid #f5c6cb;">
                <strong>Gagal!</strong> Terjadi kesalahan saat memproses operasi data.
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <p><a href="index.php?page=film&action=create">Tambah Data Film</a></p>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Kode Film</th>
            <th>Judul Film</th>
            <th>Sutradara</th>
            <th>Genre</th>
            <th>Tahun Rilis</th>
            <th>Durasi (Menit)</th>
            <th>Rating IMDb</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($film as $f): ?>
        <tr>
            <td><?= htmlspecialchars($f['kode_film']) ?></td>
            <td><?= htmlspecialchars($f['judul']) ?></td>
            <td><?= htmlspecialchars($f['sutradara']) ?></td>
            <td><?= htmlspecialchars($f['genre']) ?></td>
            <td><?= htmlspecialchars((string) $f['tahun_rilis']) ?></td>
            <td><?= htmlspecialchars((string) $f['durasi']) ?> Menit</td>
            <td><?= htmlspecialchars((string) $f['rating']) ?></td>
            <td>
                <a href="index.php?page=film&action=edit&id=<?= $f['id'] ?>">Edit</a>
                <form method="post"
                      action="index.php?page=film&action=delete"
                      style="display:inline"
                      onsubmit="return confirm('Hapus data film ini?')">
                    <input type="hidden" name="id" value="<?= $f['id'] ?>">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>