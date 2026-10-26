# Website Portofolio — Muhammad Arkaan Andrean

Landing page portofolio pribadi yang responsif, dibuat dengan **Laravel** dan **Tailwind CSS**. Proyek ini dikerjakan sebagai Latihan Individu mata kuliah Pemrograman Web 2 (UI Slicing & Komponen Responsif dengan Tailwind CSS).

<!-- Ganti dengan screenshot tampilan websitemu:
     1. Simpan gambar di folder docs/ (mis. docs/preview.png)
     2. Hapus tanda komentar pada baris di bawah -->
<!-- ![Tampilan Portofolio](docs/preview.png) -->

## Fitur

- **Navbar** dengan tautan navigasi, menu hamburger di layar kecil, dan tombol **dark mode** (pilihan tersimpan di browser)
- **Hero** berisi foto profil, headline, bio singkat, tombol Download CV dan Kontak Saya, serta ikon media sosial
- **Tentang & Skill** dalam tiga kategori (Frontend, Backend & Database, Tools) lengkap dengan ikon SVG dan progress bar
- **Proyek** berbentuk kartu 16:9 dengan **filter kategori** (Semua, Web, Mobile, Design), badge teknologi, serta tombol Demo dan Repository
- **Timeline** Pendidikan dan Pengalaman
- **Sertifikat & Penghargaan**
- **Form Kontak** dengan validasi Laravel dan perlindungan CSRF
- **Animasi** muncul saat scroll, foto hero melayang, dan progress bar yang terisi bertahap
- **Responsif** untuk mobile, tablet, dan desktop

## Teknologi

| Bagian | Teknologi |
|---|---|
| Framework | Laravel |
| Styling | Tailwind CSS (utility-first) |
| Build tool | Vite |
| Ikon | Font Awesome dan Devicon (via CDN) |
| Font | Poppins (Google Fonts) |
| Lokal | Laragon (PHP, Composer, Node.js) |

## Cara Menjalankan

### Kebutuhan

- PHP 8.3 atau lebih baru
- Composer
- Node.js 22 (LTS) dan npm

### Langkah

1. Clone repository:
   ```bash
   git clone https://github.com/muhammadarkaanandrean/Portofolio.git
   cd Portofolio
   ```
2. Install dependensi:
   ```bash
   composer install
   npm install
   ```
3. Siapkan file environment:
   ```bash
   copy .env.example .env
   php artisan key:generate
   ```
   (di macOS/Linux gunakan `cp .env.example .env`)
4. Buka `.env`, lalu pastikan baris berikut agar tidak membutuhkan database:
   ```env
   SESSION_DRIVER=file
   CACHE_STORE=file
   QUEUE_CONNECTION=sync
   ```
5. Jalankan di **dua terminal** yang berbeda:
   ```bash
   npm run dev
   ```
   ```bash
   php artisan serve
   ```
6. Buka `http://localhost:8000` di browser.

Untuk versi produksi, jalankan `npm run build` terlebih dahulu.

## Struktur Utama

```
├── app/Http/Controllers/ContactController.php   # validasi form kontak
├── public/
│   ├── images/profile.JPG                        # foto profil
│   └── cv/CV-Arkaan.pdf                          # file untuk tombol Download CV
├── resources/
│   ├── css/app.css                               # konfigurasi Tailwind & dark mode
│   ├── js/app.js                                 # dark mode, menu, filter, animasi
│   └── views/
│       ├── layouts/app.blade.php                 # kerangka halaman
│       └── home.blade.php                        # seluruh bagian halaman
└── routes/web.php
```

## Catatan

- Data (skill, proyek, pendidikan, sertifikat) saat ini **statis** dan ditulis langsung di `resources/views/home.blade.php`.
- Pesan dari form kontak untuk sementara dicatat di `storage/logs/laravel.log`.
- Ikon dan font dimuat dari CDN, sehingga membutuhkan koneksi internet.

## Rencana Pengembangan

- [ ] Mengambil data dari RESTful API Laravel dan MySQL
- [ ] Menyimpan pesan kontak ke database atau mengirimnya lewat email
- [ ] Halaman admin untuk mengelola proyek

## Penulis

**Muhammad Arkaan Andrean**
Mahasiswa Informatika, Universitas Teknokrat Indonesia
Bandar Lampung, Indonesia
