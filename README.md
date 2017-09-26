# Web server and container host setup
## Setting up the web server
1. Clone the repo
2. Install dependencies:
```
sudo apt install nginx php7.0-fpm letsencrypt
```
2. Symlink the files to their locations:
```
sudo mv /etc/nginx/nginx.conf /etc/nginx/nginx.conf.default
sudo ln -s ~/web-server/reverseproxy /etc/nginx/sites-enabled/reverseproxy
sudo ln -s ~/web-server/nginx.conf /etc/nginx/nginx.conf
sudo ln -s ~/web-server/ssl-153.duckdns.org.conf /etc/nginx/snippets/ssl-153.duckdns.org.conf
sudo ln -s ~/web-server/ssl-params.conf /etc/nginx/snippets/ssl-params.conf
```
  
3. Generate the SSL certificate:

`sudo letsencrypt certonly -a webroot --webroot-path=/var/www/html -d 153.duckdns.org -d search.153.duckdns.org -d freenas.153.duckdns.org -d photos.153.duckdns.org -d git.153.duckdns.org -d watchlist.153.duckdns.org`

4. Generate the Diffie-Helman Group:

`sudo openssl dhparam -out /etc/ssl/certs/dhparam.pem 2048`

5. Test nGinx config and restart:

`sudo nginx -t && sudo nginx -s reload`

## Setting up containerized services

`sudo apt install docker.io`
`sudo usermod -aG docker $(whoami)`

### Guacamole

* [Installing Guacamole with Docker](https://guacamole.incubator.apache.org/doc/gug/guacamole-docker.html)
* [Steps to put everything in a seperate container](https://www.cb-net.co.uk/linux/running-guacamole-from-a-docker-container-on-ubuntu-16-04-lts-16-10/)

### Searx

* [Docker installation](https://asciimoo.github.io/searx/dev/install/installation.html)

`docker pull wonderfall/searx`
`docker run -d --name searx -p 8888:8888 wonderfall/searx`

