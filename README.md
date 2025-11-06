
## 📝 Implementation Notes

### Perubahan yang Dilakukan:

#### 1. **Menambahkan Daftar Produk di Order Detail**
- **File yang diubah:** `resources/views/user/order/show.blade.php`
- **Deskripsi:** Menambahkan section baru yang menampilkan daftar lengkap produk dalam sebuah order, termasuk gambar, nama, quantity, harga, dan total.
- **Alasan:** Agar user dapat melihat detail produk yang mereka pesan secara jelas dan terstruktur.

#### 2. **Product Snapshot System**
- **File yang diubah:**
  - `database/migrations/2020_07_15_102626_create_carts_table.php`
  - `app/Models/Cart.php`
  - `app/Http/Controllers/OrderController.php`
- **Deskripsi:** Implementasi sistem snapshot produk yang menyimpan detail produk (title, photo, summary, size) pada saat checkout.
- **Alasan:** Memastikan data order tetap konsisten meskipun admin mengupdate atau menghapus produk. Data order akan menggunakan snapshot yang tersimpan, bukan data real-time dari tabel products.
- **Cara kerja:**
  - Saat checkout, sistem menyimpan snapshot detail produk ke kolom `product_title`, `product_photo`, `product_summary`, dan `product_size` di tabel `carts`.
  - Foreign key `product_id` diubah menjadi nullable dengan `onDelete('SET NULL')` sehingga data order tetap aman saat produk dihapus.
  - Model Cart memiliki helper methods (`getProductTitle()`, `getProductPhoto()`, dll) yang mengambil data dari snapshot terlebih dahulu, baru fallback ke relasi jika snapshot tidak ada.

#### 3. **Database Migration Update**
- **File yang diubah:** `database/migrations/2020_07_15_102626_create_carts_table.php`
- **Deskripsi:** Menambahkan kolom untuk menyimpan snapshot produk dan mengubah constraint foreign key.
- **Catatan:** Jalankan `php artisan migrate:fresh --seed` untuk menerapkan perubahan pada database.

---

## 💡 Suggestions / Saran Pengembangan

### 1. **Tambah Search Box di Halaman Produk**
- Tambahkan form pencarian sederhana di halaman product list agar user bisa cari produk berdasarkan nama.
- Cukup tambahkan input search dan filter query di controller.
- Implementasi sangat mudah, hanya perlu modifikasi view dan controller ProductController.

### 2. **Tambah Fitur Print Invoice**
- Tambahkan tombol print di halaman order detail untuk cetak invoice.
- Bisa menggunakan `window.print()` JavaScript atau CSS `@media print`.
- Styling khusus untuk tampilan cetak agar invoice terlihat profesional.

### 3. **Low Stock Alert di Dashboard Admin**
- Tampilkan notifikasi atau badge di dashboard admin untuk produk yang stoknya menipis (misal < 5).
- Cukup query produk dengan `stock < 5` dan tampilkan di widget dashboard.
- Membantu admin untuk segera restock produk yang hampir habis.

---

## 📜 License
🔹 This project is **MIT Licensed** – Feel free to use & modify!

⭐ **If you find this project helpful, don't forget to star it!** ⭐

