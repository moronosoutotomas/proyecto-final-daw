#!/binbash

# Parámo-los contenedores
# docker stop <containers>
sudo docker stop aplicacion_tomasmorono-nginx aplicacion_tomasmorono-php aplicacion-php-fpm-1 aplicacion_tomasmorono-pgsql aplicacion_tomasmorono-workspace

# Eliminámolos
# docker rm <containers>
docker container prune -af

# Eliminámo-las imaxes
# docker rmi <images>
docker image prune -af

# Eliminám-lo volumen
# docker volume rm <volume>
docker volume rm aplicacion_tomasmorono-data-production aplicacion_tomasmorono-public-assets aplicacion_tomasmorono-storage-production aplicacion_tomasmorono-data-development
docker volume prune -af

### COIDADO, ELIMINA EN MASA ###
# Executámo-la limpeza xeral do proxecto
docker system prune -af
