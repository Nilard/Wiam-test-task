#!/bin/bash

docker compose up -d
docker compose exec app composer install --no-interaction
docker compose exec app chmod a+w /app/runtime /app/web/assets
docker compose exec app php yii migrate --interactive=0
