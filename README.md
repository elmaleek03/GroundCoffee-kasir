# Aplikasi Kasir Penjualan Dengan Framework CodeIgniter 3 & Template SB Admin 2

### Hello UwU~

Aplikasi kasir penjualan simpel, dibuat untuk keperluan penggunaan toko kedai milik teman saya xD

Saya gunakan sebagai **portofolio** juga btw hihi

### Fiturnya apa saja ngab?
fiturnya sederhana banget, contohnya sebagai berikut
1. **Modul Authentikasi**
   
   Di modul ini saya membuat fitur untuk login dan logout.
   
2. **Modul Data Produk**
   
   Di modul ini saya membuat fitur untuk melihat, menambah, mengubah, menghapus dan meng-ekspor data produk.
   
3. **Modul Data Bahan Baku**
   
   Di modul ini saya membuat fitur untuk melihat, menambah, mengubah, menghapus dan meng-ekspor data bahan baku.
    
3. **Modul Transaksi Penjualan**

   Di modul ini saya membuat fitur untuk melihat, menambah, menghapus dan meng-ekspor transaksi penjualan.

4. **Modul Transaksi Pembelian**

   Di modul ini saya membuat fitur untuk melihat, menambah, mengubah, menghapus dan meng-ekspor data transaksi pembelian.
   
5. **Modul Data Kasir**

   Di modul ini saya membuat fitur untuk melihat, menambah, mengubah, menghapus dan meng-ekspor data kasir.

6. **Modul Manajemen Akun**

   Di modul ini saya hanya membuat fitur untuk melihat dan menghapus akun.
	 
### Role
Terdapat Dua Role yaitu `admin` & `kasir`

### Instalasi & Konfigurasi

How to :

1. Clone repo
2. Masuk ke folder project ini
3. Lalu buka terminal dan jalankan `composer install`
4. Selanjutnya kalian bisa buka file `application/config/config.php` 
5. Ubah isi dari variable `$config['base_url']` dengan `http://localhost/namafolder/`
6. Untuk `namafolder` silahkan kalian ganti sesuai nama folder dari aplikasi ini di komputer atau laptop kalian
7. Import `db/db_penjualan.sql` ke database milik kalian
8. Untuk login `admin` kalian bisa menggunakan username = `admin` dan password `admin`
9. Untuk login `kasir` kalian bisa menggunakan username = `kasir` dan password `ksir`