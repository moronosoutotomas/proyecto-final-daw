# Bookbag: atopa e rexistra as túas lecturas

## Instalación

Clonamos o proxecto na carpeta desexada (i.e.: bookbag)
```
git clone "git@github.com:moronosoutotomas/proyecto-final-daw.git" bookbag
```

Entramos na carpeta onde foi clonado
```
cd bookbag
```

Copiámolo contenido do .env.example no .env e cubrimo-los campos ca información que nos facilitase o vendor
```
neste caso temos o .env orixinal con tódala información xa de base por comodidade aínda que nun caso real nunca sería así
```

Entramos en ./bookbag/aplicacion
```
cd ~/bookbag/aplicacion
```

Lanzamos o compose de contenedores
```
docker compose -f compose.dev.yaml up --build
```
> Este proxecto dispón de 2 compose distintos, un para desarrollo que instalará certas ferramentas como Xdebug (i.e).
> Se queremos lanza-lo de producción debemos cambiar .dev. por .prod.

Instalamo-las dependencias e compilamo-las vistas 
```
docker exec -it aplicacion_tomasmorono-php composer install && npm install && npm run build
```
> OLLO: si cambiache-lo nome da aplicacion introduce o nome do contenedor que corre PHP-FPM

Xeramo-las keys de encriptación (propias de Laravel)
```
php artisan key:generate
```

Corremo-las migracións e poblamo-las táboas con información de pega
```
php artisan migrate:fresh --seed
```

## Ubicación da app
Por defecto será [localhost](http://localhost) (sin SSL)
