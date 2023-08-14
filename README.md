# Usage
______
```console
cd src/
composer update
mv .env.example .env

### note: add db the dbname is main by default you can change it through data/schema.sql file

cd ../
docker compose up --build -d 
docker ps

### note: copy the id of yourdirname-app

docker exec -it {id} bash
php bin/cli-app.php o:s:c
```
[visit](http://localhost:80/)
