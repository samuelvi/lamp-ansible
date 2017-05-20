<VirtualHost *:80>
    ServerName  demo.intranet
    ServerAlias www.demo.intranet

    DocumentRoot /var/www/demo/httpdocs
    DirectoryIndex index.php

    <Directory /var/www/demo/httpdocs>
        Require all granted

        <IfModule mod_rewrite.c>
            Options -MultiViews
            RewriteEngine On

            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteRule ^(.*)$ index.php [QSA,L]

        </IfModule>
    </Directory>


    # ErrorLog ${APACHE_LOG_DIR}/error.log
    ErrorLog /var/www/demo/error.log

    # Possible values include: debug, info, notice, warn, error, crit, alert, emerg.
    LogLevel warn

    # CustomLog ${APACHE_LOG_DIR}/access.log combined
    CustomLog /var/www/demo/access.log combined

</VirtualHost>