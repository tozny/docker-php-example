FROM      ubuntu:14.04
MAINTAINER Kirk Peterson "kirk@tozny.com"

ENV DEBIAN_FRONTEND noninteractive

####################
# apache2 server
RUN apt-get update  -y
RUN apt-get install -y apache2 php5 libapache2-mod-php5 php5-curl php5-gd php5-intl php5-mcrypt php5-json php5-dev php5-gmp
RUN rm /var/www/html/index.html
ADD ./index.php /var/www/html/index.php
ADD ./ToznyRemoteRealmAPI.php /var/www/html/ToznyRemoteRealmAPI.php

EXPOSE 80

ENTRYPOINT ["/usr/sbin/apache2ctl"]
CMD ["-D", "FOREGROUND"]
