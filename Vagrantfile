# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  config.vm.box = "hashicorp/precise32"
  config.vm.hostname = "spbl.org"
  config.vm.box_check_update = false
  
  config.vm.network "forwarded_port", guest: 80, host: 8081
  config.vm.network "private_network", type: "dhcp"
  
  config.vm.synced_folder "build", "/var/www/"

  config.vm.provider "virtualbox" do |vb|
     vb.memory = "2048"
     vb.cpus = "2"
  end
  
  config.vm.provision "shell", inline: <<-SHELL
     curl --silent --location https://deb.nodesource.com/setup_0.12 | sudo bash -
     sudo apt-get install -y 
     sudo apt-get install -y apache2 curl php5 libapache2-mod-php5 php5-mcrypt
     sudo apt-get install -y nodejs 
     sudo apt-get install -y nodejs
     sudo npm install npm -g
     sudo npm install --global gulp
     cd /vagrant/ && sudo npm install
     echo "splb.org running at http://localhost:8081
  SHELL
end
