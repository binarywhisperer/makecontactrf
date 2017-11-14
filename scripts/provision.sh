#!/usr/bin/env bash
export DEBIAN_FRONTEND=noninteractive

echo "Preparing Ubuntu..."
apt-get update
apt-get -y upgrade

apt-get install -y software-properties-common curl sendmail

apt-add-repository ppa:ondrej/php -y
apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv 0C49F3730359A14518585931BC711F9BA15703C6
echo "deb [ arch=amd64,arm64 ] http://repo.mongodb.org/apt/ubuntu xenial/mongodb-org/3.4 multiverse" | sudo tee /etc/apt/sources.list.d/mongodb-org-3.4.list
apt-get update

echo "Adding apache2..."
apt-get install -y apache2 libapache2-mod-php
if ! [ -L /var/www ]; then
  rm -rf /var/www/html
  ln -fs /vagrant/public /var/www/html
fi
a2enmod rewrite
service apache2 restart

echo "Adding PHP 7.1..."
apt-get install -y php7.1 php7.1-cli php7.1-dev php7.1-gd php7.1-curl php7.1-memcached php7.1-mbstring

echo "Adding MongoDB..."
apt-get install -y mongodb-org
service mongod start
mongo mydb --eval "db.createCollection('messages')"

echo "Adding MailHog..."
wget --quiet -O /usr/local/bin/mailhog https://github.com/mailhog/MailHog/releases/download/v0.2.1/MailHog_linux_amd64
chmod +x /usr/local/bin/mailhog

sudo tee /etc/systemd/system/mailhog.service <<EOL
[Unit]
Description=Mailhog
After=network.target
[Service]
User=vagrant
ExecStart=/usr/bin/env /usr/local/bin/mailhog
[Install]
WantedBy=multi-user.target
EOL

systemctl daemon-reload
systemctl enable mailhog

echo "sendmail_path='/usr/local/bin/mailhog sendmail test@mail.test'" | sudo tee /etc/php/7.1/mods-available/sendmail.ini
phpenmod sendmail
service apache2 restart

mailhog -mongo-db="mydb" -storage="mongodb" >/dev/null 2>&1 &