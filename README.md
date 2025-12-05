
# Travel Jogja

Website wisata Yogyakarta yang dibangun dengan Laravel 11. Platform lengkap untuk mengelola paket wisata, galeri, blog, dan sistem manajemen pengguna.

## 🚀 Fitur Utama

- **Homepage Modern**: Desain responsif dengan hero section, layanan, paket wisata, galeri, dan kontak
- **Sistem Manajemen Admin**: Dashboard untuk mengelola konten website
- **Multi-level User Roles**: Admin, Sub Admin, dan User biasa
- **Paket Wisata**: Sistem manajemen paket wisata lengkap
- **Galeri Foto**: Koleksi foto destinasi wisata
- **Blog System**: Sistem artikel/blog terintegrasi
- **Responsive Design**: Kompatibel dengan semua perangkat

## 🛠️ Tech Stack

- **Framework**: Laravel 11
- **Frontend**: Bootstrap 5, Inter Font, Custom CSS
- **Database**: MySQL
- **Authentication**: Laravel Breeze
- **Icons**: Bootstrap Icons
- **Styling**: Custom CSS dengan efek modern

## 📋 Persyaratan Sistem

- PHP 8.1 atau lebih tinggi
- Composer
- Node.js & NPM
- MySQL
- Laravel 11

## 🚀 Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/Rasyidrlqr/travel-jogja.git
   cd travel-jogja
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Configuration**
   - Buat database MySQL
   - Konfigurasi `.env` file dengan database credentials

5. **Run Migrations**
   ```bash
   php artisan migrate
   ```

6. **Seed Database** (opsional)
   ```bash
   php artisan db:seed
   ```

7. **Build Assets**
   ```bash
   npm run build
   # atau untuk development
   npm run dev
   ```

8. **Start Server**
   ```bash
   php artisan serve
   ```

## 👥 User Roles

### Admin
- Akses penuh ke semua fitur
- Dapat mengelola user
- Mengelola semua konten website

### Sub Admin
- Akses ke dashboard admin
- Dapat mengelola blog, layanan, paket wisata, galeri
- Tidak dapat mengelola user

### User
- Akses ke website publik
- Dapat melihat semua konten

## 📁 Struktur Project

```
travel-jogja/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Controller admin
│   │   └── Auth/           # Controller autentikasi
│   ├── Models/             # Model Eloquent
│   └── Middleware/         # Custom middleware
├── database/
│   ├── migrations/         # Database migrations
│   └── seeders/            # Database seeders
├── public/                 # Assets publik
├── resources/
│   ├── css/               # Custom CSS
│   ├── js/                # JavaScript
│   └── views/             # Blade templates
├── routes/
│   └── web.php            # Route definitions
└── .env.example           # Environment template
```

## 🔧 Konfigurasi

### Environment Variables
```env
APP_NAME=Travel Jogja
APP_ENV=local
APP_KEY=base64_key
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=travel_jogja
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=log
```

### Ngrok Support
Aplikasi ini mendukung tunneling dengan Ngrok. Pastikan untuk mengupdate `APP_URL` di `.env` dengan URL Ngrok saat menggunakan tunneling (beta).

## 📚 API Routes

### Public Routes
- `GET /` - Homepage
- `GET /blog` - Blog listing
- `GET /services` - Services page
- `GET /tours` - Tours listing
- `GET /gallery` - Gallery page

### Admin Routes (middleware: auth, admin)
- `GET /admin/dashboard` - Admin dashboard
- `GET /admin/user` - User management
- `GET /admin/blog` - Blog management
- `GET /admin/service` - Service management
- `GET /admin/tour` - Tour management
- `GET /admin/gallery` - Gallery management

## 🎨 Customization

### Styling
- Edit `resources/css/app.css` untuk custom styles
- Gunakan Bootstrap classes untuk konsistensi

### Views
- Blade templates di `resources/views/`
- Layout utama: `layouts/app.blade.php` dan `layouts/navigation.blade.php`

### Components
- Reusable components di `resources/views/components/`

## 🧪 Testing

```bash
# Run tests
php artisan test

# Run specific test
php artisan test --filter TestName
```

## 📦 Deployment

1. **Production Environment**
   ```bash
   APP_ENV=production
   APP_DEBUG=false
   ```

2. **Optimize Laravel**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

3. **Build Assets**
   ```bash
   npm run build
   ```

## 🤝 Contributing

1. Fork the repository
2. Create feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Open Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE.txt](LICENSE.txt) file for details.

## 👨‍💻 Developer

**Rasyid Rlqr** - *Initial work* - [GitHub](https://github.com/Rasyidrlqr)

## 🙏 Acknowledgments

- Laravel Framework
- Bootstrap
- Bootstrap Icons
- Komunitas Laravel Indonesia
