<?php
include('services/database.php');

// Cek apakah ada parameter ID
if (isset($_GET['id_category'])) {
  $category_id = $_GET['id_category'];

  // Hapus kategori dari database berdasarkan ID
  $query = "DELETE FROM categories WHERE id_category = $category_id";
  $result = mysqli_query($conn, $query);

  if ($result) {
    // Jika penghapusan berhasil, arahkan kembali ke halaman kategori dengan notifikasi
    header('Location: data-masters-categories.php?notif=deleteberhasil');
    exit();
  } else {
    // Jika terjadi kesalahan saat menghapus, tampilkan pesan kesalahan
    echo "Error deleting category.";
  }
} else {
  // Jika tidak ada parameter ID, tampilkan pesan kesalahan
  echo "Invalid request.";
}
