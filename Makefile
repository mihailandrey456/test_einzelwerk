build:
	docker compose build $(c)
	make install-dependencies
	docker compose run --rm php php artisan key:generate
	docker compose run --rm node npm run build
	make create-openapi
init-env:
	cp .env.example .env
	cp ./src/.env.example ./src/.env
up:
	docker compose up -d $(c)
down:
	docker compose down $(c)
logs:
	docker compose logs $(c)
create-openapi:
	docker compose run --rm php ./vendor/bin/openapi -o storage/openapi/openapi.json -f json app
fix-code:
	docker compose run --rm php ./vendor/bin/php-cs-fixer fix app
install-dependencies:
	docker compose run --rm php composer install
	docker compose run --rm node npm install
migrate:
	docker compose run --rm php php artisan migrate