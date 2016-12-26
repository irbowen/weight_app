
# First, we update all the things
sudo apt update

# Install the only editors you'll ever need
sudo apt-get install vim emacs --yes

# PHP and Postgres
sudo apt-get install php7.0 php7.0-fpm --yes
sudo apt-get install postgresql postgresql-contrib --yes
sudo apt-get install php7.0-pgsql --yes

# TODO Need to make the postgres user weight, as well as the
# corresponding unix account and password
# as well as create the database
# You do not need to edit the php.ini file though


# nginx
sudo apt-get -y install nginx
sudo service nginx start

