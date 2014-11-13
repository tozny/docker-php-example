docker-php-example
==================

Prerequisites
-------------
 * You need to have the Tozny app installed on your phone.
 * You need to have a Tozny realm
 * You need to have an account for the Realm installed on your phone. 
 * You need your Realm Key ID and your Realm Key Secret.
 
Running the PHP example on a PHP-enabled web server
---------------------------------------------------
1. Click here to download the Tozny PHP-Example zip file from GitHub.
2. Unzip and move the contents of the archive to a sub-directory within your web server's web-root folder. 
3. Edit index.php
     * replace the <YOUR REALM KEY ID> with your realm key id.
     * replace the <YOUR REALM KEY SECRET> with your realm key secret.
4. Navigate to `http://your-web-server/path-to-unzipped-files`.
5. Click "Log in with Tozny"
6. Scan the QR code.
7. You should see the '**You're logged in!**' message.

Running the PHP example with Docker 
-----------------------------------
1. Click here to download the Tozny PHP-Example zip file from GitHub.
2. Unzip the contents of the archive, change into the extracted directory.
3. Edit index.php
     * replace the <YOUR REALM KEY ID> with your realm key id.
     * replace the <YOUR REALM KEY SECRET> with your realm key secret.
4. Build the docker image:`docker build -t 'tozny/php-example`
5. Run the built image on port 8080:`docker run -d -p 8080:80 tozny/php-example`
6. Navigate to `http://your-docker-server:8080/`. 
If you are running Docker on your mac, run `boot2docker ip` to get your server's IP address

7. Click "Log in with Tozny"
8. Scan the QR code.
9. You should see the '**You're logged in!**' message. 
