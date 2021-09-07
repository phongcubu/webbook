Các bước sau khi lấy project laravel trên github về :

- chạy lệnh 
 + composer update
- tạo 1 file  .env
  => copy tất cả file .env.example sang file .env vừa mới tạo
 => đổi tên database

-chay tiếp 2 lênh này 
+php artisan key:generate
+php artisan migrate
