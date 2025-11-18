ROOT_DIR := $(abspath $(dir $(lastword $(MAKEFILE_LIST))))
COMPOSE_FILE := $(ROOT_DIR)/aplicacion/compose.dev.yaml

# Containers
NGINX := aplicacion_tomasmorono-nginx
PHP := aplicacion_tomasmorono-php
PHP_FPM := aplicacion-php-fpm-1
PGSQL := aplicacion_tomasmorono-pgsql
WORKSPACE := aplicacion_tomasmorono-workspace

# Volumes
VOL_PROD_DATA := aplicacion_tomasmorono-data-production
VOL_PUBLIC := aplicacion_tomasmorono-public-assets
VOL_STORAGE := aplicacion_tomasmorono-storage-production
VOL_DEV_DATA := aplicacion_tomasmorono-data-development
VOL_DEV_DATA_BACKUP := aplicacion_tomasmorono-data-development-backup

# Lanzamos compose
.PHONY: launch
launch:
	docker compose -f $(COMPOSE_FILE) up -d
	@echo "[ SUCCESS ] Contenedores levantados"

# Paramos compose
.PHONY: stop
stop:
	docker compose -f $(COMPOSE_FILE) down
	@echo "[ SUCCESS ] Contenedores tirados"

# Accedemos al contenedor workspace
.PHONY: workspace
workspace:
	sudo docker exec -it $(WORKSPACE) bash

# Configuramos la aplicación (instalación de deps, compilación de assets
# generación de keys y migración de la db)
.PHONY: setup
setup:
	make launch
	sudo docker exec -it --user www $(WORKSPACE) composer install
	sudo docker exec -it --user www $(WORKSPACE) npm install
	sudo docker exec -it --user www $(WORKSPACE) npm run build
	sudo docker exec -it --user www $(WORKSPACE) php artisan key:generate
	sudo docker exec -it --user www $(WORKSPACE) php artisan migrate:fresh --seed
	@echo "[ SUCCESS ] Instalación completada"

# Limpiamos el entorno
.PHONY: cleanup
cleanup:
	make stop
	docker container prune -f
	docker image prune -af
	# Con el guión delante no interrumpe el resto de la ejecución si saca nonzero exit
	-docker volume rm $(VOL_PROD_DATA) $(VOL_PUBLIC) $(VOL_STORAGE) $(VOL_DEV_DATA)
	docker volume prune -f
	docker builder prune -af
	docker system prune -af
	@echo "[ SUCCESS ] Limpieza completada"

# Sistema simple de backup (de momento para dev)
POSTGRES_DB := bookbag
POSTGRES_USER := tomasmorono
HOST_BACKUP_DIR := ./backups/bookbag
DUMP_FILENAME := $(shell date +%Y%m%d-%H%M%S).dump

.PHONY: backup
backup:
	mkdir -p $(HOST_BACKUP_DIR)
	docker exec $(PGSQL) bash -c "pg_dump -U '$(POSTGRES_USER)' -d '$(POSTGRES_DB)' -F c -f '/var/lib/postgresql/data_backup/$(DUMP_FILENAME)'"
	docker run --rm \
		-v $(VOL_DEV_DATA_BACKUP):/from \
		-v $(HOST_BACKUP_DIR):/to \
		alpine \
		sh -c "cp /from/$(DUMP_FILENAME) /to/"
	@echo "[ SUCCESS ] Backup completado en: $(HOST_BACKUP_DIR)/$(DUMP_FILENAME)"
