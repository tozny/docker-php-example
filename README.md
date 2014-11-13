docker-php-example
==================

A simple 'Hello World' example of Tozny authentication using Apache and Docker.


Edit `index.php`, replace `REALM_KEY_ID` and `REALM_KEY_SECRET` with your key information.

Build the Docker image.

```
$ docker build -t 'tozny/php-example'
```

Run an instance of the Docker image on port 8080.

```
$ docker run -d -p 8080:80 tozny/php-example
```

Finally, Navigate to `http://localhost:8080`

Note: if you are running Docker on your mac, you will need yo use the IP of your boot2docker VM. To find the boot2docker VM IP, run:

```
$ boot2docker ip
```


