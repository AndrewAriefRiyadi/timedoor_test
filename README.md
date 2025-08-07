# 📘 Laravel Book Rating - Test Project

Ini adalah proyek Laravel sederhana untuk memberikan rating pada buku berdasarkan author dan judul buku.

---

## 📋 Requirements

Pastikan Anda telah menginstal:

- PHP >= 8.1
- Composer
- MySQL / MariaDB
- Node.js & NPM (opsional, jika menggunakan Vite/Mix)
- Laravel 11
- Git

---

## 🛠️ Installation Steps

### 1. Clone Repository

```bash
git clone https://github.com/AndrewAriefRiyadi/timedoor_test.git
cd project-name
```

### 2. Install Backend Dependencies
```bash
composer install
```

### 3. Copy .env dan Setup Environment
```bash
cp .env.example .env
```
Edit file .env dan atur konfigurasi database anda
```ini
DB_DATABASE=your_db_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Jalankan Migrasi dan Seeder
```bash
php artisan migrate --seed
```

### 6. Install dan Jalakankan Frontend
```bash
npm install
npm run dev
```
### 7. Jalankan Server
```bash
php artisan serve
```
Akses via http://localhost:8000

## Notes
- Jika terjadi error saat migration, pastikan database sudah dibuat di MySQL
- Anda dapat mereset database dengan:
```bash
php artisan migrate:fresh --seed
```

## Developer
- Nama: Andrew Arief Riyadi
- GitHub: @AndrewAriefRiyadi
- Email: andrewariefr@gmail.com