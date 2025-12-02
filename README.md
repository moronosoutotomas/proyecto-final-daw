<img src="./logo-readme.png" alt="Bookbag logo" width="200"/>

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

É preciso dar permisos ó proxecto en par de evitar problemas de firewall
```
sudo chmod -R 777 bookbag/
```

Entramos na carpeta onde foi clonado
```
cd bookbag
```

No .env (dentro de /aplicacion) cambiámo-lo UID e o GID polos valores do noso usuario e grupo (abaixo de todo, por defecto UID=1000 e GID=1000)
> cd /aplicacion
> nano .env

Executamos o script para levantar os contedores e configuralos.
```
make setup
```

## Listo! A ubicación da aplicación será localhost
Por defecto será [localhost](http://localhost) sin SSL

---
## Por comodidade, facilítase un Makefile cos seguintes comandos dispoñibles:
```
make launch # Lanzar o compose de contedores
make stop # Parar o compose contedores
make setup # Configurar por completo á aplicación
make workspace # Acceder ó contedor 'workspace' do compose de dev
make cleanup # Facer unha limpeza exhaustiva do compose (WARNING)
make backup # Facer un backup da información do volume de persistencia da DB
make refresh # Refrescar os contedores en modo dev de forma rápida
```

## :warning: Limpeza
> Se queremos facer unha limpeza exhaustiva de todo o que se crea para probar (ou corrixir) este proxecto, tes a man un script co proceso automatizado. Básicamente este deterá, eliminará tódo-los contenedores, imaxes, volumes e limpará finalmente cun `docker system prune` asique moito ollo xa que se tes outros despregamentos é potencialmente probable que sexan eliminados parcial ou totalmente.
```
make cleanup
```

## Problemas comúns
- Os permisos dan problemas se non se configura apropiadamente o UID e o GID no .env
- Pantallazo branco nas primeiras cargas antes de cachear
- Fallo de carga de modo en certas pantallas ó cargar, modo claro en lugar de modo oscuro
