phpstan:
	vendor/bin/phpstan analyse --configuration=config/phpstan.neon --memory-limit=1152M
.PHONY: phpstan

phpecs:
	vendor/bin/ecs check --config=config/phpecs.php
.PHONY: phpecs

phpecs-fix:
	vendor/bin/ecs --fix --config=config/phpecs.php
.PHONY: phpecs-fix

phpunit:
	vendor/bin/phpunit --configuration=config/phpunit.xml
.PHONY: phpunit

ci: phpstan phpecs phpunit
.PHONY: ci

install:
	rm -rf vendor
	composer install
.PHONY: install

build:
	rm -rf vendor
	composer install --no-dev
	box compile --config=boxconfig.json
.PHONY: build
