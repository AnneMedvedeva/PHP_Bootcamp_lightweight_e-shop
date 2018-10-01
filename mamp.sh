#!/bin/bash
ln -s ~/Library/Containers/MAMP/manager-osx.app ~/Desktop/MAMP
sed -i -e 's/opcache.revalidate_freq=60/opcache.revalidate_freq=0/g' ~/Library/Containers/MAMP/php/etc/php.ini
mv ~/Library/Containers/MAMP/apache2/htdocs ~/Library/Containers/MAMP/apache2/oldhtdocs
ln -s ~/http/htdocks ~/Library/Containers/MAMP/apache2/htdocs
alias mysql='~/Library/Containers/MAMP/mysql/bin/mysql'
 