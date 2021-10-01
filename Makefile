.DEFAULT_GOAL := help

help:
	@echo ""
	@echo "Available tasks:"
	@echo "    test         Run all tests and generate coverage"
	@echo "    lint         Run only linter and code style checker"
	@echo "    unit         Run unit tests and generate coverage"
	@echo "    static       Run static analysis"
	@echo "    vendor       Install dependencies"
	@echo "    clean        Remove vendor and composer.lock"
	@echo ""

vendor: $(wildcard composer.lock)
	composer install --prefer-dist

lint: vendor
	vendor/bin/phplint ./app --exclude=vendor/
	vendor/bin/phpcs -p --standard=PSR2 --extensions=php --encoding=utf-8 --ignore=*/vendor/* ./src

unit: vendor
	vendor/bin/phpunit tests/Unit

test: lint unit

clean:
	rm -rf vendor
	rm composer.lock

.PHONY: help lint unit watch test travis clean
