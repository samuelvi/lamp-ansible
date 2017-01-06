# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(2) do |config|

  # Use the same key for each machine
  config.ssh.insert_key = false

  config.vm.define "lamp56" do |lamp56|
    lamp56.vm.box = "ubuntu/trusty64"

    lamp56.vm.network "forwarded_port", guest: 80, host: 10080
    lamp56.vm.network "forwarded_port", guest: 443, host: 10443
    lamp56.vm.network "forwarded_port", guest: 8000, host:18000 
    lamp56.vm.network "forwarded_port", guest: 1080, host:11080
    lamp56.vm.network "forwarded_port", guest: 4444, host: 14444

    lamp56.vm.network "private_network", ip: "192.168.40.100"

    lamp56.vm.provider :virtualbox do | vb | # Prefer VMware Fusion before VirtualBox

        vb.name = "lamp56"
        vb.gui = false # Hide/Show GUI Screen

        vb.customize ["modifyvm", :id, "--memory", "2048"]
        vb.customize ["modifyvm", :id, "--cpus", "2"]

        # Get disk path
        line = `VBoxManage list systemproperties | grep "Default machine folder"`
        vb_machine_folder = line.split(':')[1].strip()
        # console.log <=> puts(vb_machine_folder)
        file_to_disk = File.join(vb_machine_folder, vb.name, 'disk2.vdi')

        unless File.exist?(file_to_disk)
            vb.customize [
                'createhd',
                '--filename', file_to_disk,
                '--format', 'VDI',
                '--size', 256 * 1024 # 256 GB
                ]
           vb.customize [
                'storageattach', :id,
                '--storagectl', 'SATAController',
                '--port', 1, '--device', 0,
                '--type', 'hdd', '--medium',
                file_to_disk
                ]
        end

    end

    lamp56.vm.synced_folder "./www", "/var/www", :type => "nfs", mount_options: ['rw', 'vers=3', 'tcp', 'fsc']

  end

  # ######################################################################################################
  # This keeps right sync folder. Needs vagrant-bind plugin (vagrant plugin install vagrant-bindfs)
  config.bindfs.bind_folder "/var/www", "/var/www", u: 'www-data', g: 'www-data'
  config.nfs.map_uid = Process.uid
  config.nfs.map_gid = Process.gid
  # ######################################################################################################

end