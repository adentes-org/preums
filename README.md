#PREUMS

##To install and use
```
git clone https://github.com/adentes-org/preums.git && cd preums
### AND ###
docker run --name preums -p 8080:80 -v "$(pwd)/www:/var/www" -d php:7-cli php -S 0.0.0.0:80 -t /var/www/
```
## Configurer un DPS
Modifier les positions géographiques dans /www/ui/js/gast.js pour y placer les coordonnées du centre de votre zone couverte
Modifier les positions géographiques présentes dans /www/ui/js/gast.res.js pour y faire apparaitre respectivement les coordonnées de votre base principale, votre lieu d'évacuation, votre base principale
