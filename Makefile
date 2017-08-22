DB_NAME = camagru.db

all: drop setup

setup: 
	@echo "db setup"
	@php config/setup.php

drop:
	@echo "db drop"
	@rm $(DB_NAME)

