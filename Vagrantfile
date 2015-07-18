# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  config.vm.box = "ubuntu/trusty64"
  config.vm.hostname = "spbl.org"
  config.vm.box_check_update = false
  config.vm.network "forwarded_port", guest: 80, host: 8888
  config.vm.provider "virtualbox" do |vb|
     vb.memory = "2048"
     vb.cpus = "2"
  end

  config.vm.provision "shell", inline: <<-SHELL
     curl --silent --location https://deb.nodesource.com/setup_0.12 | sudo -E bash -
     sudo apt-get install -y nodejs apache2
     sudo npm install -g gulp
     cd /vagrant
     sudo npm install --no-bin-links
     gulp build
     sudo rm -rf /var/www/html
     sudo ln -s /vagrant/build /var/www/html
     nohup gulp 0<&- &>/dev/null &
  SHELL

end
