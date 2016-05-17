Vagrant.configure(2) do |config|
# Install hashicorp/precise32 as the base OS (this is Ubuntu)
# There is a directory of vagrant boxes you can choose from here:
# https://atlas.hashicorp.com/boxes/search

config.vm.box = "boxcutter/ubuntu1510"

# Forward the 3000 port from the VM to your local machine so you can use your
# local browser while running the dev environment on your VM

config.vm.network "forwarded_port", guest: 4000, host: 4000

# Run vagrant.sh the first time a VM is set up
# If you halt the machine and come back to it, this won't run again but if you
# destroy the VM and come back to it, this will run again

# Set the name of the 
config.vm.provider "virtualbox" do |v|
  v.name = "devbox"
  v.cpus = 4
  v.memory = 4096
end

config.vm.provision :shell, path: "vagrant.sh"
end
