up: docker-up api-migration api-fixtures api-jobs

init: docker-clear docker-up api-permissions api-env api-composer api-migration api-fixtures api-jobs frontend-env frontend-install frontend-build

docker-clear:
	docker-compose down --remove-orphans
	sudo rm -rf api/var/docker

docker-up:
	docker-compose up --build -d

api-permissions:
	sudo chmod -R 777 api/var

api-env:
	docker-compose exec space-bc-api-php-cli rm -f .env
	docker-compose exec space-bc-api-php-cli ln -sr .env.example .env

api-composer:
	docker-compose exec space-bc-api-php-cli composer install

api-migration-diff:
	rm -rf api/var/cache/doctrine
	docker-compose exec space-bc-api-php-cli composer app migrations:diff

api-migration:
	docker-compose exec space-bc-api-php-cli composer app migrations:migrate

api-fixtures:
	docker-compose exec space-bc-api-php-cli composer app fixtures:load

api-jobs:
	docker-compose exec space-bc-api-php-cli composer app jobs:parse

api-test:
	docker-compose exec space-bc-api-php-cli composer test

api-test-unit:
	docker-compose exec space-bc-api-php-cli composer test -- --testsuite=unit

frontend-env:
	docker-compose exec space-bc-frontend-nodejs rm -f .env.local
	docker-compose exec space-bc-frontend-nodejs ln -sr .env.local.example .env.local

frontend-install:
	docker-compose exec space-bc-frontend-nodejs npm install

frontend-build:
	docker-compose exec space-bc-frontend-nodejs npm run build

frontend-watch:
	docker-compose exec space-bc-frontend-nodejs npm run watch

bash-node:
	docker exec -it `docker ps | grep space-bc-frontend-nodejs | awk {'print $1'}` /bin/bash

backend-composer:
	docker-compose exec space-bc-backend-php-cli composer install