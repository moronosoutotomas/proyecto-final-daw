# Bookbag: atopa e rexistra as túas lecturas

## Requisitos
- Conexión a internet.
- Ter instalado `docker`.
- Ter instalado `docker compose`.
- Un navegador (se usas un adblocker ten coidado que non bloquee JS e/ou CSS)
xa que probablemente rompa a páxina.

## Instalación

Clonamos o proxecto na carpeta desexada (i.e.: bookbag)
```
git clone "https://github.com/moronosoutotomas/proyecto-final-daw.git" bookbag
```

Por algún motivo é preciso dar permisos ó proxecto en par de evitar problemas de firewall
```
chmod -R 777 bookbag
```

Entramos na carpeta onde foi clonado
```
cd bookbag
```

Copiámolo contenido do .env.example no .env e cubrimo-los campos ca información que nos facilitase o vendor e cambiámo-lo UID e GID (abaixo de todo, por defecto 1000 e 1000)
> neste caso temos o .env orixinal con tódala información xa de base por comodidade aínda que nun caso real nunca sería así

Entramos en ./bookbag/aplicacion
```
cd bookbag/aplicacion
```

Lanzamos o compose de contenedores
> Este proxecto dispón de 2 compose distintos, un para desenvolvemento que instalará certas ferramentas como Xdebug (i.e).
> Se queremos lanza-lo de producción debemos cambiar .dev. por .prod.
```
docker compose -f compose.dev.yaml up -d
```

Accedemos ó contenedor "workspace"
> Si cambiache-lo nome da aplicacion introduce o nome do contenedor que corre "workspace"
```
docker exec -it aplicacion_tomasmorono-workspace bash # Acceso ó contenedor
```
Unha vez dentro, instalamo-las dependencias e compilamo-las vistas
```
composer install # Instalación dependencias backend
npm i # Instalación dependencias frontend
npm run build # Transpilación, construcción do /dist e minificación de código
```

Xeramo-las keys de encriptación (propias de Laravel)
```
php artisan key:generate
```

Corremo-las migracións e poblamo-las táboas con información de pega
```
php artisan migrate:fresh --seed
```

Corremos a transpilación, construcción do /dist e minificación de código e xa estaría
```
npm run build
```

## Listo! A ubicación da aplicación será localhost
Por defecto será [localhost](http://localhost) sin SSL

---
## Limpieza
> Se queremos facer unha limpieza exhaustiva de todo o que se crea para probar (ou corrixir) este proxecto, tes a man un script co proceso automatizado. Básicamente este deterá, eliminará tódo-los contenedores, imaxes, volumes e limpará finalmente cun `docker system prune` asique moito ollo xa que se tes outros despregamentos é potencialmente probable que sexan eliminados parcial ou totalmente.
```
sudo sh cleanup.sh
```
