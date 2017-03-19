1. Clone the repo
2. Install dependencies:
```
sudo apt-get install nginx php7.0-fpm letsencrypt
```
2. Symlink the files to their locations:
```
sudo ln -s ~/web-server/reverseproxy /etc/nginx/sites-enabled/reverseproxy
sudo ln -s ~/web-server/nginx.conf /etc/nginx/nginx.conf
sudo ln -s ~/web-server/ssl-153.duckdns.org.conf /etc/nginx/snippets/ssl-153.duckdns.org.conf
```
  
3. Generate the SSL certificate:

`sudo letsencrypt certonly -a webroot --webroot-path=/var/www/html -d 153.duckdns.org -d search.153.duckdns.org -d freenas.153.duckdns.org -d photos.153.duckdns.org -d git.153.duckdns.org -d watchlist.153.duckdns.org`

4. Generate the Diffie-Helman Group:

`sudo openssl dhparam -out /etc/ssl/certs/dhparam.pem 2048`
