# Description
  simple authentication pages with slimphp
______

# Pics
![Screenshot 2023-08-29 at 12-09-16 Document](https://github.com/alshkre9/auth-slimphp/assets/129284063/73c91109-0bfc-42cc-bea8-33bcf88b9144)
![Screenshot 2023-08-29 at 12-10-01 Document](https://github.com/alshkre9/auth-slimphp/assets/129284063/decc331e-cc1a-4cca-84c8-2b881523d82d)
______

# Usage
```console
cd src/
composer install
composer dump-autoload
mv .env.example .env

### note: add db the dbname is main by default you can change it through data/schema.sql file

cd ../
docker compose up --build -d 
docker ps

### note: copy the id of the container

docker exec -it {id} bash
php bin/cli-app.php o:s:c
```
[localhost:80/](http://localhost:80/)
