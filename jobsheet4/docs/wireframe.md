# Wireframe & User Flow — SIMPUS-Mini

Dokumen rancangan UI/UX untuk fitur yang belum dikoding (Login, Dashboard Petugas, Peminjaman, Pengembalian, Riwayat). Halaman HTML/CSS tetap sama dengan Jobsheet 3.

Konvensi simbol:
- `+ - |` = batas halaman / panel
- `[______]` = kotak input
- `[ Teks ]` = tombol
- teks biasa = label / keterangan statis

---

## 1. Aktor

| Aktor | Hak akses |
|-------|-----------|
| **Tamu** | Hanya melihat katalog buku (Beranda, Daftar Buku) tanpa login. |
| **Petugas** | Login untuk mengakses seluruh fitur CRUD dan transaksi peminjaman/pengembalian. |

---

## 2. Wireframe

### 2.1 Halaman Login (Petugas)

```
+--------------------------------------+
| SIMPUS-Mini                          |
|--------------------------------------|
|                                      |
|        [ Login Petugas ]             |
|                                      |
|   Username : [______________]        |
|   Password : [______________]        |
|                                      |
|           [ Login ]                  |
|                                      |
|   Belum punya akun? Daftar di sini   |
+--------------------------------------+
```

### 2.2 Dashboard Petugas

```
+--------------------------------------------------------------------------+
| SIMPUS-Mini  Beranda | Buku | Anggota | Peminjaman | (Nama Petugas) Logout|
|--------------------------------------------------------------------------|
| [Total Buku]    [Total Anggota]    [Sedang Dipinjam]                     |
|                                                                          |
| Aksi Cepat:                                                              |
| [ + Peminjaman Baru ]   [ + Pengembalian ]                               |
|                                                                          |
| Transaksi Terbaru                                                        |
| ------------------------------------------------------------------------ |
| Anggota        | Buku              | Tgl Pinjam   | Status               |
| ------------------------------------------------------------------------ |
| Budi Santoso   | Pemrograman Web   | 12 Okt 2026  | Dipinjam             |
| Siti Aminah    | Basis Data        | 10 Okt 2026  | Dikembalikan         |
+--------------------------------------------------------------------------+
```

### 2.3 Form Peminjaman Baru

```
+----------------------------------------------------------------------+
| SIMPUS-Mini  Beranda | Buku | Anggota | Peminjaman | (Nama) Logout    |
|----------------------------------------------------------------------|
|                                                                      |
| [ Peminjaman Baru ]                                                  |
|                                                                      |
| Anggota     : [ Pilih anggota          v ]                           |
| Buku        : [ Pilih buku (stok > 0)  v ]                           |
| Tgl Pinjam  : [ 19-10-2026 ]                                         |
| Jatuh Tempo : [ 26-10-2026 ]                                         |
|                                                                      |
| [ Simpan ]   [ Batal ]                                               |
+----------------------------------------------------------------------+
```

Catatan: satu buku per transaksi. Buku dengan stok 0 tidak muncul di pilihan.

### 2.4 Form Pengembalian

```
+----------------------------------------------------------------------+
| SIMPUS-Mini  Beranda | Buku | Anggota | Peminjaman | (Nama) Logout    |
|----------------------------------------------------------------------|
|                                                                      |
| [ Pengembalian Buku ]                                                |
|                                                                      |
| Cari transaksi aktif : [______________]  [ Cari ]                    |
|                                                                      |
| Anggota         | Buku             | Jatuh Tempo | Aksi              |
| ------------------------------------------------------------------   |
| Budi Santoso    | Pemrograman Web  | 19 Okt 2026 | [ Dikembalikan ]  |
| Rina Wulandari  | Algoritma        | 14 Okt 2026 | [ Dikembalikan ]  |
+----------------------------------------------------------------------+
```

### 2.5 Riwayat Transaksi

```
+------------------------------------------------------------------------+
| SIMPUS-Mini  Beranda | Buku | Anggota | Peminjaman | (Nama) Logout      |
|------------------------------------------------------------------------|
|                                                                        |
| [ Riwayat Transaksi ]                                                  |
|                                                                        |
| Cari: [____________]   Status: [ Semua v ]   [ Filter ]                |
|                                                                        |
| Anggota        | Buku            | Tgl Pinjam  | Tgl Kembali | Status  |
| --------------------------------------------------------------------   |
| Budi Santoso   | Pemrograman Web | 12 Okt 2026 | -           | Dipinjam|
| Siti Aminah    | Basis Data      | 10 Okt 2026 | 15 Okt 2026 | Dikemb. |
|                                                                        |
| [ < Sebelumnya ]    1   2   3    [ Berikutnya > ]                      |
+------------------------------------------------------------------------+
```

---

## 3. User Flow

### 3.1 Peminjaman Buku

```
[Petugas Login] -> [Dashboard] -> [Pilih menu "Peminjaman Baru"]
-> [Pilih Anggota] -> [Pilih Buku (stok > 0)]
-> [Simpan] -> [Stok buku berkurang 1] -> [Kembali ke Dashboard]
```

### 3.2 Pengembalian Buku

```
[Dashboard] -> [Menu "Pengembalian"] -> [Cari transaksi aktif (anggota/buku)]
-> [Tandai "Dikembalikan"] -> [Stok buku bertambah 1]
-> [Kembali ke Dashboard]
```

### 3.3 Login & Akses Halaman Terlindungi

```
[Tamu buka halaman Petugas] -> [Sudah login?]
   ya    -> [Tampilkan halaman yang diminta]
   belum -> [Redirect ke Login] -> [Isi username & password] -> [Valid?]
              ya    -> [Dashboard]
              tidak -> [Pesan error] -> [Kembali ke Login]
```

---

## 4. Konsistensi dengan Desain yang Sudah Berjalan

- Warna aksen, tipografi navbar, dan gaya tabel/kartu mengikuti `assets/css/style.css` yang sudah dibangun sejak Jobsheet 2-3.
- Navbar akan ditambah menu Peminjaman dan indikator status login (nama petugas / tombol Logout) mulai implementasi di Jobsheet 10.
- Edge case yang perlu ditangani saat implementasi:
  - Buku stok habis tidak boleh dipilih di form peminjaman.
  - Anggota dengan tunggakan terlambat divalidasi di Jobsheet 12 (tugas mandiri).

---

## 5. Latihan Tambahan (Opsional)

### 5.1 Wireframe: Registrasi Anggota Baru (aktor Tamu)

```
+--------------------------------------------+
| SIMPUS-Mini                                |
|--------------------------------------------|
|                                            |
|    [ Registrasi Anggota Baru ]             |
|                                            |
|  Nama Lengkap : [______________]           |
|  Email        : [______________]           |
|  No. Telepon  : [______________]           |
|  Alamat       : [______________]           |
|                                            |
|        [ Daftar ]   [ Batal ]              |
|                                            |
|  Sudah jadi anggota? Kembali ke Beranda    |
+--------------------------------------------+
```

### 5.2 User Flow: Petugas Mencari Anggota dengan Tunggakan

```
[Petugas Login] -> [Dashboard] -> [Menu "Riwayat"]
-> [Filter Status: "Dipinjam"] -> [Urutkan berdasarkan Jatuh Tempo]
-> [Tandai jatuh tempo < hari ini = "Terlambat"]
-> [Pilih anggota terlambat] -> [Lihat detail & kontak anggota]
```

### 5.3 Edge Case Tambahan

1. Buku yang sama dipinjamkan ke anggota yang sama dua kali berturut-turut: ditolak dengan pesan "Anggota ini masih meminjam buku tersebut".
2. Stok tinggal 1 dan dua petugas menyimpan bersamaan: stok dicek ulang saat Simpan agar tidak negatif.
3. Pengembalian ditandai dua kali untuk transaksi yang sama: tombol "Dikembalikan" dinonaktifkan setelah status berubah.
4. Tamu membuka URL Dashboard langsung tanpa login: dialihkan ke halaman Login.
5. Tanggal jatuh tempo lebih awal dari tanggal pinjam: ditolak oleh validasi form.