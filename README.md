`git clone http://harry:GwG5KzFNZ3uk@git.153.duckdns.org/harry/nginx-config.git`

1. Clone the repo
2. Symlink the files to their locations:
  ```
  ln -s ~/web-server/reverseproxy /etc/nginx/sites-enabled/reverseproxy
  ln -s ~/web-server/nginx.conf /etc/nginx/nginx.conf
  ln -s ~/web-server/ssl-153.duckdns.org.conf /etc/nginx/snippets/ssl-153.duckdns.org.conf
    ```
  
3. Generate the SSL certificate:

`sudo letsencrypt certonly -a webroot --webroot-path=/var/www/html -d 153.duckdns.org -d search.153.duckdns.org -d freenas.153.duckdns.org -d photos.153.duckdns.org -d git.153.duckdns.org -d watchlist.153.duckdns.org`

4. Generate the Diffie-Helman Group:

`sudo openssl dhparam -out /etc/ssl/certs/dhparam.pem 2048`

