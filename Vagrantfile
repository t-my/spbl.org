# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  config.vm.network "private_network", ip: "192.168.50.4"
  config.vm.box = "ubuntu/trusty64"
  config.vm.hostname = "spbl.org"
  config.vm.network "forwarded_port", guest: 80, host: 8888
  config.vm.network "forwarded_port", guest: 3306, host: 3306

  config.vm.provider "virtualbox" do |vb|
     vb.memory = "2048"
     vb.cpus = "2"
  end

  config.vm.provision :shell, path: "bootstrap.sh"
end
