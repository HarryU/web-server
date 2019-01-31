# Web server and container host setup
## Setting up the web server
0. Install and configure the dependencies:
	+ `sudo apt install docker.io`
	+ `sudo usermod -aG docker $(whoami)`
1. Clone the repo
2. Run `docker-compose up -d`

### Guacamole

* [Installing Guacamole with Docker](https://guacamole.incubator.apache.org/doc/gug/guacamole-docker.html)
* [Steps to put everything in a seperate container](https://www.cb-net.co.uk/linux/running-guacamole-from-a-docker-container-on-ubuntu-16-04-lts-16-10/)
* Use Postgres, combining the steps from the above two links - current versions of MySQL/guac appear to be broken when used together through docker (some weird auth issue)
