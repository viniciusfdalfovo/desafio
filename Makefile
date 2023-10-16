.PHONY:help

help: ## Print help
	@awk 'BEGIN {FS = ":.*##"; printf "\nUsage:\n  make \033[36m<target>\033[0m\n\nTargets:\n"} /^[a-zA-Z_-]+:.*?##/ { printf "  \033[36m%-10s\033[0m %s\n", $$1, $$2 }' $(MAKEFILE_LIST)
docker: ## Build image and run container
	@docker build -t desafio . && docker run -p 80:80 --rm -d --name desafio desafio
build: ## Build image
	@docker build -t desafio .
run: ## Run container
	@docker run -p 80:80 --rm -d --name desafio desafio
stop: ## Stop container
	@docker stop desafio