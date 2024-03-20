include .env

# docker
up:
	docker compose up -d
ps:
	docker compose ps
stop:
	docker compose stop
down:
	docker compose down
logs:
	docker compose logs -f


# 環境
db:
	docker compose exec -it db mysql -u ${MYSQL_USER} -p${MYSQL_PASSWORD} -D ${MYSQL_DATABASE}
cp-env:
	cp .env.example .env