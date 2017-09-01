DB_NAME = camagru.db

all: drop setup seed

setup: 
	@echo "db setup"
	@php config/setup.php

seed:
	@echo "db seed"
	@php config/seed.php

drop:
	@echo "db drop"
	@rm $(DB_NAME)
	@rm -rf uploads/*.*
