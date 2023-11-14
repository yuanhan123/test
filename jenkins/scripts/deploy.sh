#!/usr/bin/env sh

set -x
docker run -d -p 80:80 --name ver2 -v /var/jenkins_home/workspace/test/src:/var/www/html nginx
sleep 1
set +x

echo 'Now...'
echo 'Visit http://localhost to see your PHP application in action.'

