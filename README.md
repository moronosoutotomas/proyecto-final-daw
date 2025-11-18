# Bookbag: atopa e rexistra as túas lecturas

## Requisitos
- Conexión a internet.
- Ter instalado `docker`.
- Ter instalado `docker compose`.
- Un navegador (se usas un adblocker ten coidado que non bloquee JS e/ou CSS)
xa que probablemente rompa a páxina.

## Instalación

Clonamos o proxecto na carpeta desexada (i.e.: proxecto-moronosoutotomas)
```
git clone "https://github.com/moronosoutotomas/proyecto-final-daw.git" proxecto-moronosoutotomas
```

Por algún motivo é preciso dar permisos ó proxecto en par de evitar problemas de firewall
```
sudo chmod -R 777 proxecto-moronosoutotomas/
```

Entramos na carpeta onde foi clonado
```
cd proxecto-moronosoutotomas
```

No .env (dentro de /aplicacion) cambiámo-lo UID e o GID polos valores do noso usuario e grupo (abaixo de todo, por defecto 1000 e 1000)
> cd /aplicacion
> nano .env

Executamolo script para levanta-los contedores e configuralos.
```
make setup
```

## Listo! A ubicación da aplicación será localhost
Por defecto será [localhost](http://localhost) sin SSL

---
## Por comodidade, facilítase un Makefile cos seguintes comandos dispoñibles:
```
make launch # Lanza o compose de contedores
make stop # Para o compose contedores
make setup # Configura por completo á aplicación
make workspace # Accede ó contedor 'workspace' do compose de dev
make cleanup # Fai unha limpeza exhaustiva do compose (WARNING)
make backup # Fai un backup da información do volume de persistencia da DB
```

## Limpeza
> Se queremos facer unha limpieza exhaustiva de todo o que se crea para probar (ou corrixir) este proxecto, tes a man un script co proceso automatizado. Básicamente este deterá, eliminará tódo-los contenedores, imaxes, volumes e limpará finalmente cun `docker system prune` asique moito ollo xa que se tes outros despregamentos é potencialmente probable que sexan eliminados parcial ou totalmente.
```
make cleanup
```

## Problemas comúns
- Os permisos dan problemas se non se configura apropiadamente o UID e o GID no .env
- Fallo na execución do script de setup na seccion de npm

## Deprecated
- A carpeta de /scripts está deprecated xa que hai unha implementación mais sinxela con Makefile asique será eliminada no futuro
