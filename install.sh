#!/bin/bash

function wait_keypress() {
    read -p "Press any key to continue"
}

echo -e "Installing and configuring environment";
read -s -p "[sudo] sudo password for $(whoami): " pass

echo -e
echo -e "Configuring locales"
export LANGUAGE=en_US.UTF-8
export LANG=en_US.UTF-8
export LC_ALL=en_US.UTF-8
echo $pass | sudo -S locale-gen en_US.UTF-8
echo -e "Click OK in the dialog that will appear"
wait_keypress
echo $pass | sudo -S dpkg-reconfigure locales

echo -e "Updating armbian"
echo $pass | sudo -S aptitude update
echo $pass | sudo -S aptitude upgrade -y

echo -e "Installing emacs and tmux"
echo $pass | sudo -S aptitude install -y emacs tmux 

echo -e "Configuring tmux"
cd ~ && git clone https://github.com/gpakosz/.tmux.git && ln -s -f .tmux/.tmux.conf && cp .tmux/.tmux.conf.local .

echo -e "Configuring bash shortcuts"
touch ~/.bash_aliases
echo -e "\nalias ne='emacs'" >> ~/.bash_aliases
echo "alias md='mkdir'" >> ~/.bash_aliases
echo "alias ll='ls -lah'" >> ~/.bash_aliases
source ~/.bashrc

echo -e "Installing mariadb"
echo $pass | sudo -S aptitude install -y mariadb-server mariadb-client

echo -e "Installing php"
echo $pass | sudo -S apt -y install lsb-release apt-transport-https ca-certificates
echo $pass | sudo -S wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/php7.3.list
echo $pass | sudo -S aptitude update
echo $pass | sudo -S aptitude upgrade -y
echo $pass | sudo -S aptitude install php7.3 -y
echo $pass | sudo -S systemctl restart apache2.service

echo -e "Installing python"
echo $pass | sudo -S aptitude install -y python python3 python-pip python3-pip
echo $pass | sudo -S pip install speedtest-cli

echo -e "Configuring dashboard"
echo $pass | sudo cp -r src/web_interface/* /var/www/html


echo -e "Installation finished\nPress any key"
wait_keypress

