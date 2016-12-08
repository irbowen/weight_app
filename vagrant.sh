sudo apt-get update

# Install the only editors you'll ever need
sudo apt install vim emacs --yes
sudo apt install php7.0 --yes


# By default, while installing MySQL, there will be a blocking prompt asking you to enter the password
# Next two lines set the default password of root so there is no prompt during installation
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'

# Install MySQL server with the default argument --yes
sudo apt-get install mysql-server --yes

# Go to working directory
# This folder is synced on the VM with your local directory where the Vagrantfile is
cd /vagrant/sql
sh ./setup_database.sh
cd ..
