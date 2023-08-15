IMAGE_NAME=opencodeco/rinha-de-backend:2023-q3

default: build push

.PHONY: build
build:
	docker build -t $(IMAGE_NAME) .

.PHONY: push
push:
	docker push $(IMAGE_NAME)
