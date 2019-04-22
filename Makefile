up: docker-up

init: docker-clear docker-up

docker-clear:
	docker-compose down --remove-orphans
	sudo rm -rf api/var/docker

docker-up:
	docker-compose up --build -d

bash-node:
	docker exec -it `docker ps | grep space-bc-frontend-nodejs | awk {'print $1'}` /bin/bash