Vagrant.configure("2") do |config|
  config.vm.box = "bento/ubuntu-16.04"
  config.vm.hostname = "makecontact.rf"
  config.vm.network "private_network",  ip: "192.168.42.42"
  config.vm.provision "shell", path: "scripts/provision.sh"
end