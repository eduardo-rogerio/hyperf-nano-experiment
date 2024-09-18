CONTAINER_NAME=hyperf-nano-app

help: ## Print help.
	@awk 'BEGIN {FS = ":.*##"; printf "\nUsage:\n  make \033[36m<target>\033[0m\n\nTargets:\n"} /^[a-zA-Z_-]+:.*?##/ { printf "  \033[36m%-10s\033[0m %s\n", $$1, $$2 }' $(MAKEFILE_LIST)

install: ## instala projeto
	@composer install
	@docker compose up -d

run: ## run command compose up
	@docker compose up -d

restart: ## restart container
	@docker compose restart

stop: ## stop container
	@docker stop $(CONTAINER_NAME)

destroy: ## destroy
	@docker rm -vf $(CONTAINER_NAME)

fresh: stop destroy run

