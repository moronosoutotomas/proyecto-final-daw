- Instalación:
	1. Clonar "https://github.com/dockersamples/laravel-docker-examples" dentro de la carpeta del proyecto
	2. docker compose up -d
	3. composer install && composer update && npm install
	4. php artisan key:generate
	5. php artisan migrate:fresh --seed
	


- El nombre de la aplicación debe coincidir con el nombre de la carpeta de la misma (mostrará fallo de key en la traza)

- Ojear que el SGBD usado es el marcado en el .env, que el driver que Laravel use por defecto sea sqlite es indiferente mientras el .env esté correctamente configurado.

- Los estilos tienen que compilarse para funcionar, se puede lanzar "npm run build" para hacer 1 compilación manteniendo los archivos con la cantidad mínima o se puede lanzar "npm run dev" para dejar abierto el server de Vite escuchando los nuevos cambios si los hubiera.

- El problema con no ver el contenido de la DB en PHPStorm era "Database introspection is currently disabled".

Conexion a contenedor Postgres:
1. docker exec -it <contenedor> bash
2. psql -U tomasmorono -d bookbag
3. \dt 
