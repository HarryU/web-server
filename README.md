# Web server and container host setup
## Setting up the web server
1. Install and configure the dependencies:
	+ [Docker](https://docs.docker.com/install/linux/docker-ce/ubuntu/):
		+ `sudo apt-get remove docker docker.io containerd runc`
		+ `sudo apt-get update`
		+ `sudo apt-get install apt-transport-https ca-certificates curl gnupg-agent software-properties-common`
		+ `curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -`
		+ `sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"`
		+ `sudo apt-get update`
		+ `sudo apt-get install docker-ce docker-ce-cli containerd.io`
	+ [docker-compose](https://docs.docker.com/compose/install/)
		+ `sudo curl -L "https://github.com/docker/compose/releases/download/1.24.0/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose`
		+ `sudo chmod +x /usr/local/bin/docker-compose`
1. Clone the repo
1. Run `docker-compose up -d`
1. Copy the reverseproxy configuration file into the correct directory:
	+ `cp reverseproxy nginx-config/nginx/sites-enabled/default`
