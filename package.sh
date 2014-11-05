#!/bin/bash

PUBLIC_KEY=`cat index.php | grep "define('TOZ_REALM_KEY_ID'" | sed "s/define('TOZ_REALM_KEY_ID','\(.*\)');/\1/g"`

zip tozny-$PUBLIC_KEY.zip *.php Dockerfile
