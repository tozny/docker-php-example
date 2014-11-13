#!/bin/bash

#
# Simple script for packaging into a zip file, index.php and the Tozny Realm PHP SDK files,
# The zip file is suffixed with the realm key id. 
#
PUBLIC_KEY=`cat index.php | grep "define('TOZ_REALM_KEY_ID'" | sed "s/define('TOZ_REALM_KEY_ID','\(.*\)');/\1/g"`

zip tozny-$PUBLIC_KEY.zip *.php Dockerfile
