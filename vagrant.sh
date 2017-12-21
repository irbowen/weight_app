
# First, we update all the things
sudo apt update

# Install the only editors you'll ever need
sudo apt install vim emacs --yes

# PHP and Postgres
sudo apt install php7.0 php7.0-fpm --yes
sudo apt install postgresql postgresql-contrib --yes
sudo apt install php7.0-pgsql --yes

# TODO Need to make the postgres user weight, as well as the
# corresponding unix account and password
# as well as create the database
# You do not need to edit the php.ini file though

sudo apt install git
sudo apt install nodejs npm
sudo ln -s /usr/bin/nodejs /usr/bin/node

sudo apt install php7.0-pgsql --yes

# nginx
sudo apt -y install nginx
sudo service nginx start

