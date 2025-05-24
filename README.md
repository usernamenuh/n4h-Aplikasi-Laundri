# Laundri - Sistem Manajemen Laundry

Laundri adalah aplikasi web untuk manajemen layanan laundry yang dibangun menggunakan Laravel 12. Aplikasi ini membantu pemilik laundry dalam mengelola pesanan, pelanggan, dan operasional bisnis mereka.

## Fitur Utama

- Dashboard
- Transaksi
- Service
- Detail Transaksi

## Persyaratan Sistem

- PHP >= 8.2
- Composer
- MySQL >= 8.0
- Node.js & NPM
- Web Server (Apache/Nginx)

## Instalasi

1. Clone repository ini
```bash
git clone https://github.com/usernamenuh/n4h-Aplikasi-Laundri.git
cd laundri
```

2. Install dependencies PHP
```bash
composer install
```

3. Install dependencies JavaScript
```bash
npm install
```

4. Salin file .env.example menjadi .env
```bash
cp .env.example .env
```

5. Generate application key
```bash
php artisan key:generate
```

6. Konfigurasi database di file .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laundri
DB_USERNAME=root
DB_PASSWORD=
```

7. Jalankan migrasi database
```bash
php artisan migrate
```

8. Jalankan seeder (opsional)
```bash
php artisan db:seed
```

9. Compile assets
```bash
npm run dev
```

10. Jalankan server development
```bash
php artisan serve
```

## Penggunaan

1. Buka browser dan akses `http://localhost:8000`
2. Login menggunakan kredensial default:
   - Email: admin@laundri.com
   - Password: password

## Kontribusi

Silakan buat pull request untuk kontribusi. Untuk perubahan besar, harap buka issue terlebih dahulu untuk mendiskusikan perubahan yang diinginkan.

## Ini Adalah Proses Belajar saya