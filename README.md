# Penjualan Motor 🏍️

Aplikasi penjualan motor berbasis **Laravel 7** dengan sistem multi-role (Admin & Cashier). Aplikasi ini digunakan untuk mengelola data penjualan, pembelian, dan transaksi sepeda motor.

---

## 📋 Fitur

- 🔐 **Autentikasi Multi-Role** (Admin & Cashier)
- 🏍️ **Manajemen Data Motor**
- 👥 **Manajemen Data Pelanggan**
- 💰 **Transaksi Penjualan**
- 📊 **Laporan Penjualan**
- 📦 **Manajemen Stok**

---

## 🛠️ Persyaratan Sistem

Pastikan environment Anda sudah terinstall:

- **PHP** >= 7.2.5
- **Composer** >= 2.x
- **Node.js** >= 12.x & **NPM**
- **MySQL** / **MariaDB**
- **Git**

---

## 🚀 Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/GusGalih1007/penjualan-motor.git
cd penjualan-motor
```

### 2. Install Dependencies
Install dependency PHP (Composer):
```bash
composer install
```

Install dependency Node.js (NPM):
```bash
npm install
```

### 3. Konfigurasi Environment
Copy file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```

Generate application key:
```bash
php artisan key:generate
```

### 4. Konfigurasi Database
Buka file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=penjualan_motor
DB_USERNAME=root
DB_PASSWORD=
```

Buat database baru di MySQL:
```sql
CREATE DATABASE penjualan_motor;
```

### 5. Migrasi Database & Seeder
Jalankan migrasi beserta seeder default user:
```bash
php artisan migrate --seed
```

Atau jika ingin *fresh install*:
```bash
php artisan migrate:fresh --seed
```

### 6. Compile Asset
Development mode:
```bash
npm run dev
```

Production mode:
```bash
npm run production
```

### 7. Jalankan Aplikasi
```bash
php artisan serve
```

Akses aplikasi di browser: **[http127.0.0.1:8000](http://127.0.0.1:8000)**

---

## 👤 Default User

Setelah menjalankan seeder, gunakan akun berikut untuk login:

| Role | Email | Password | Phone |
| :--- | :--- | :--- | :--- |
| **Admin** | `admin@gmail.com` | `12345678` | `123456789` |
| **Cashier** | `cashier@gmail.com` | `12345678` | `123456789` |

> ⚠️ **Penting:** Segera ubah password default setelah login pertama kali untuk alasan keamanan.

---

## 📁 Struktur Project

```text
penjualan-motor/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   └── Models/
├── database/
│   ├── migrations/
│   └── seeds/
├── public/
├── resources/
│   ├── views/
│   ├── js/
│   └── css/
├── routes/
│   └── web.php
├── storage/
├── .env.example
├── composer.json
└── package.json
```

---

## 🔧 Perintah Artisan Berguna

```bash
# Bersihkan cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Refresh database
php artisan migrate:fresh --seed

# List route
php artisan route:list
```

---

## 🐛 Troubleshooting

### Error: `Class 'Users' not found`
Pastikan model `Users.php` berada di `app/` atau `app/Models/`, dan namespace-nya sudah benar.

### Error: `npm run dev` gagal
Hapus folder `node_modules` lalu install ulang:
```bash
rm -rf node_modules package-lock.json
npm install
npm run dev
```

### Error: Storage link
Buat symbolic link untuk storage:
```bash
php artisan storage:link
```

### Error: Permission denied (Linux/Mac)
```bash
chmod -R 775 storage bootstrap/cache
```

---

## 📝 Lisensi

Project ini menggunakan lisensi [MIT](https://opensource.org/licenses/MIT).

---

## 👨‍💻 Author

**Gusti Muhammad Galih Fahreza**
- GitHub: [@GusGalih1007](https://github.com/GusGalih1007)

---

## 🤝 Kontribusi

Kontribusi selalu diterima! Silakan fork repository ini dan buat pull request.

1. Fork Project
2. Buat Branch Fitur (`git checkout -b feature/FiturBaru`)
3. Commit Perubahan (`git commit -m 'Menambahkan Fitur Baru'`)
4. Push ke Branch (`git push origin feature/FiturBaru`)
5. Buat Pull Request

---

⭐ Jangan lupa beri **star** jika project ini bermanfaat!
