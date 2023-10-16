docker:
	@docker build -t desafio . && docker run -p 80:80 --rm -d --name desafio desafio
