docker-php-example
==================

A simple 'Hello World' example of Tozny authentication using Apache and Docker.

Edit @index.php@, replace TOZ_REALM_KEY_ID and TOZ_SECRET_KEY_SECRET with your key information.

Build the Docker image.
```
docker build -t 'tozny/docker-php-example'
```

Run an instance of the Docker image on port 8080.
```
docker run -d -p 8080:80 tozny/docker-php-example
```

Navigate to http://localhost:8080
