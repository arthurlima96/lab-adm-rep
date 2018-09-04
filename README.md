# lab-adm-rep

1 -Primeirva vez tem que rodar 
  composer install
  
2- Renomeia o arquivo ".env.example" para ".env"

3 - Cria um database para armazenar os dados no MySQL

4 - Altera os parametros abixo para o teu server MySQL no arquivo ".env"
   
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=homestead
    DB_USERNAME=homestead
    DB_PASSWORD=secret
    
5 - Depois roda o comando  

    php artisan migrate:refresh --seed
    
6 - Depois acessa a URL /home e faz o login 
    email -> admin@admin.com
    password -> secret

7 - GGWP
