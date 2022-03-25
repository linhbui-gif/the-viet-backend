Các bước setup source code lên hosting của a hùng

1, up all source code lên hosting
2, config database
3, chạy storage : domain.com/linkstorage
4, đổi tên folder public ->public_html
5, vào cmd hosting chạy lệnh php artisan route:clear 
php artisan config:clear

php artisan vendor:publish --tag=lfm_public : lệnh này để cấu hình lại ckfinder và laravel manager