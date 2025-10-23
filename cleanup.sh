#!/binbash

# Parámo-los contenedores
docker stop <containers>

# Eliminámolos
docker rm <containers>

# Eliminámo-las imaxes
docker rmi <images>

# Eliminám-lo volumen
docker volume rm <volume>

### COIDADO, ELIMINA EN MASA ###
# Executámo-la limpeza xeral do proxecto
docker system prune

