
Vagrant.configure(2) do |config|

  config.vm.box = "ubuntu/xenial64"
  config.vm.network "forwarded_port", guest: 8800, host: 8800

  config.vm.provider "virtualbox" do |v|
    v.name = "weight_app_devbox"
    v.cpus = 2
    v.memory = 4096
  end

  config.vm.provision :shell, path: "vagrant.sh"

end
