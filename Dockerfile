# Menggunakan image PHP-FPM
FROM php:8.3-fpm

# Install dependensi dan ekstensi PHP yang diperlukan
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip

# Menyalin file konfigurasi Nginx ke dalam container

# Menentukan direktori kerja
WORKDIR /var/www

# Menjalankan Nginx dan PHP-FPM

