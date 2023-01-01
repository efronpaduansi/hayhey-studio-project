<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About HayHey Studio Project
Aplikasi HayHay Studio merupakan aplikasi pendataan dan pemesan jasa photography. Aplikasi dibangun dengan Laravel framework versi 8. Berikut ini adalah fitur-fitur yang terdapat dalam aplikasi HayHey Studio :

- Sistem Login untuk Administrator ataupun Staf
- Sistem pemesanan jasa photography
- Dashboard pendataan orders, payments link, packages, items dan gallery

## Installation

Untuk menjalankan aplikasi ini, anda harus mendownloadnya terlebih dahulu atau mengkloning aplikasi dari repository ini. Berikut ini adalah langkah-langkahnya :

- Unduh dan simpan aplikasi pada komputer anda
- Jalankan perintah `composer install ; npm install ; npm run dev` untuk menginstall dependencies
- Jalankan perintah `cp .env.example .env` untuk membuat file .env
- Ubah pengaturan database dan base URL pada file .env , sesuaikan dengan Username dan Password database anda
- Jalankan perintah `php artisan migrate` untuk migrasi database
- Jalankan perintah `php artisan storage:link` untuk membuat folder storage
- Jalankan aplikasi dengan mengakses ke `http://localhost:8000` 

## Butuh bantuan ?
Silahkan kontak developer ke `efronius@programmer.net`

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
