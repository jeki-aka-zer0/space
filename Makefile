up: docker-up

init: docker-clear docker-up frontend-env frontend-install frontend-build

docker-clear:
	docker-compose down --remove-orphans
	sudo rm -rf api/var/docker

docker-up:
	docker-compose up --build -d

api-permissions:
	sudo chown 777 api/var

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