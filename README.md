#PREUMS

```
git clone
 AND 
docker run --name preums -p 8080:80 -v "$(pwd)/www:/var/www" -d php:7-cli php -S 0.0.0.0:80 -t /var/www/
```
