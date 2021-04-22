# WebDevelopmentCOMP4650


# Architecture Setup
- All virtual machines were deployed on a Hyper-V hypervisor
- The pfSense machine is configured with 4GB Memory
- The web server and remote machines are configured with 2GB Memory
- All Remote Machines use a CentOS 7 or 8 Linux Operating System
## pfSense machine
1. We downloaded the community version at https://www.pfsense.org/download/ onto a generation 2 Hyper-V VM
2. We also need to configure virtual interfaces on Hyper-V to separate the virtual network from the physical network. For the 'WAN' interface, it is set to be an external adapter and it is bridged to my eth0 on the host machine. For the 'LAN' interface, it is private virtual adapter that only devices within the subnet can communicate with.
3. Once configured, attack the new virtual NICs to the pfSense machine.
4. Once within the pfSense user interface, we assign IP addresses to the interfaces and start the web configurator
5. Accessing the web configurator by going to 192.168.2.1, we configure OpenVPN with all the default settings and install the OpenVPN Client Exporter module
6. Enabled port forwarding on my physical network to allow VPN connections to my virtual network
7. Clients / Team can download and install the VPN and access the virtual network and be able to SSH into any of the machines and configure them
## Remote servers 
1. Downloaded CentOS https://www.centos.org/download/
2. Configured and started the four virtual machines with appropriate IP addressing and attached the 'LAN' private adapter configured previously to ensure communication
3. Installed appropriate services (SSHd, httpd, vsftpd, etc) to be viewed
4. Configured user credentials of 'WIT' and 'comp4650' as password across all VMs, for SSH access by the program
## Web Server
1. Downloaded CentOS https://www.centos.org/download/
2. Configured with static address of 192.168.2.10 and attached the 'LAN' private adapter
3. Installed LAMP https://www.apachefriends.org/index.html
4. Installed Git and cloned our repository


