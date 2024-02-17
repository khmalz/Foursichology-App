# Foursichology App

Sebuah website untuk
memberikan solusi terhadap permasalahan bullying
yang mungkin terjadi di lingkungan SMKN 46. Website
ini dikhususkan sebagai sarana pelaporan yang aman,
nyaman, dan rahasia bagi siswa untuk melaporkan
insiden bullying yang mereka alami.

## Fitur

-   Buat laporan
-   Memberi dan membalas komen di laporan secara private
-   Beri reminder untuk laporan
-   Notifikasi Admin dan Siswa

## Jalankan Secara Lokal

-   Pastikan sudah terinstall php 8.2+ untuk menjalankan laravel 10

**Clone**

```shell
git clone https://github.com/khmalz/Foursichology-App.git
```

**Go to Directory**

```shell
cd Foursichology-App
```

**Install Dependencies**

```shell
composer install
```

```shell
npm install
```

**Config Environment**

```shell
cp .env.example .env
```

**Generate Key**

```shell
php artisan key:generate
```

**Setting Database Config in Env**

```
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

**Build Assets**

```shell
npm run build
```

**Migrate Database**

```shell
php artisan migrate --seed
```

**Link Storage**

```shell
php artisan storage:link
```

**Run Local Server**

```shell
php artisan serve
```

## Environment Variables

Untuk memastikan gambar yang terupload akan muncul, Anda perlu mengkonfigurasi pada file .env. Sesuaikan dengan url dan host yang dijalankan di browser anda saat menjalankan project ini.

contoh: `http://127.0.0.1:8000`

```
APP_URL
```

## Developer

-   [@khmalz](https://github.com/khmalz)
