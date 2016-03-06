echo "### install nodejs ###"
curl -sL https://deb.nodesource.com/setup_5.x | sudo -E bash - > /dev/null
sudo apt-get install -y nodejs > /dev/null

echo "### install other shits ###"
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'
sudo apt-get install apache2 mysql-server libapache2-mod-auth-mysql php5-mysql


echo "### install gulp ###"
sudo npm install -g gulp > /dev/null

echo "### install project with npm ###"
cd /vagrant
sudo npm install --no-bin-links > /dev/null 2>&1
sudo npm rebuild node-sass --no-bin-links > /dev/null

echo "### build site (gulp build) ###"
sudo gulp build

echo "### symlink site to apache www ###"
sudo rm -rf /var/www/html
sudo ln -s /vagrant/build /var/www/html
sudo chmod -R 777 /var/www/html
