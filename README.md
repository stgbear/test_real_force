# REAL FORCE CODE TEST

There is a docker configuration to make build and testing more convenient

Build:
- cd docker && docker-compose up -d

Testing:
- open "http://localhost:8000/" in your browser

Unit tests:
- run "docker-compose exec test_real_force php bin/phpunit"
- run "docker-compose exec test_real_force php -dpcov.enabled=1 bin/phpunit --coverage-text" to show test coverage

