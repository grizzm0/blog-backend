APP_NAME=$(shell cat composer.json | grep name | grep -Eo '[a-z0-9-]+/[a-z0-0-]+')
CURRENT_DIR := $(patsubst %/,%,$(dir $(abspath $(lastword $(MAKEFILE_LIST)))))
DIST_DIR=$(CURRENT_DIR)/dist
VERSION=$(shell cat composer.json | grep version | grep -Eo '([0-9]\.?){3}(-[a-z]+)*')

# Build
pre-build: clean
	@echo 'creating dist directory'
	@mkdir $(DIST_DIR)

	@echo 'copying files and directories'
	@cp -R config $(DIST_DIR)
	@cp -R docker $(DIST_DIR)
	@cp -R public $(DIST_DIR)
	@cp -R src $(DIST_DIR)
	@cp .dockerignore $(DIST_DIR)
	@cp Dockerfile $(DIST_DIR)
	@cp composer.* $(DIST_DIR)

	@echo 'installing composer dependencies'
	docker run --rm --tty -v $(DIST_DIR):/app composer install \
	--no-dev --no-interaction --no-progress --no-scripts --optimize-autoloader

build: pre-build
	@echo 'building application'
	docker build -t $(APP_NAME) $(DIST_DIR)

	@$(MAKE) clean

# Release - build, tag and publish
release: build publish

# Publish
publish: publish-latest publish-version

publish-latest: tag-latest
	@echo 'publish latest to $(APP_NAME)'
	docker push $(APP_NAME):latest

publish-version: tag-version
	@echo 'publish $(VERSION) to $(APP_NAME)'
	docker push $(APP_NAME):$(VERSION)

# Tagging
tag: tag-latest tag-version

tag-latest:
	@echo 'creating tag latest'
	docker tag $(APP_NAME) $(APP_NAME):latest

tag-version:
	@echo 'creating tag $(VERSION)'
	docker tag $(APP_NAME) $(APP_NAME):$(VERSION)

# Misc
up: build
	docker-compose up -d

clean:
	@echo 'removing dist directory'
	@rm -rf $(DIST_DIR)

version:
	@echo $(VERSION)
