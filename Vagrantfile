
Vagrant.configure(2) do |config|

  config.vm.box = "bento/ubuntu-16.04"
  config.vm.network "forwarded_port", guest: 8500, host: 8500

  config.vm.provider "virtualbox" do |v|
    v.name = "devbox"
    v.cpus = 4
    v.memory = 4096
  end

  config.vm.provision :shell, path: "vagrant.sh"

end
