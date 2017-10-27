# Setting up the Management Console

Before you are able to use our management console, you must first enable it
through the configuration file.  After this, you can set it up to use a secure
connection.

## Activation

The management console can be enabled in MailerQ's configuration file.
The following variables should be used:

````
www-port:           8485 (default: 8485)
www-ip:             1.2.3.4 (default: 0.0.0.0)
www-password:       admin (empty by default)
www-dir:            /usr/share/mailerq/www (default: /usr/share/mailerq/www)
www-connections:    10
````

The `www-port` variable holds the port number for the management console;
8485 is the default. If you use port 80, you do
not have to include the port number in the URL and you can access the
management console with using a browser via address `http://hostname.of.your.server`. 
If you assign a different port number (like 8080), you have to include
the port number in the URL: `http://hostname.of.your.server:8080`.

In its default setting of `0.0.0.0`, the management console is accessible via 
all IP addresses that are assigned to the server on which MailerQ runs. If you 
only want to make it accessible via one specific IP, you can set the `www-ip` 
variable. Of course, the IP address that you assign must be bound to the server.

The management console is protected with a password to prevent anyone from
accessing it. This password can be set with the `www-password`
variable. Besides setting a password, we also recommend to put the
management console behind a firewall so that you will not have to worry
about people breaking into it.

All HTML, CSS and Javascripts that are necessary for the management 
console are automatically installed into the `/usr/share/mailerq/www`
directory. If you want to run the console from out of a different
location, you can change this directory with the `www-dir` variable.

To limit the number of resources that can be used by the built-in HTTP
server, you can use the "www-connections" variable to limit the number
of simultaneous HTTP connections that can be handled. This number
includes active web sockets.


## Setting up a secure management console

If is a good idea to secure your management console, as it will also
used to manage private DKIM keys; by definition, these should not be transferered
over interceptable non-secure HTTP connections.

The following configuration file variables are relevant for enabling 
HTTPS support:

````
www-port:                   0
www-secure-port:            443 (empty by default)
www-certificate:            /path/to/certificate.crt (empty by default)
www-privatekey:             /path/to/privatekey.key (empty by default)
www-ciphers:                !aNULL:!eNULL:!LOW:!SSLv2:!EXPORT:!EXPORT56:FIPS:MEDIUM:HIGH:@STRENGTH (empty by default)
````

If you enable HTTPS, switch off the regular HTTP
interface by setting the `www-port` to zero. This prevents that users
will connect to the old unsecure interface by accident. The `www-secure-port`
holds the port number for the HTTPS connections (443 is the default for 
this, so that you won't have to include the port number in URLS). The
certifate and key files, and the supported ciphers can be set using
the `www-certificate`, `www-privatekey` and `www-ciphers` variables.

Once enabled, the encrypted management console can be accessed using
the address `https://hostname.of.your.server` if you use default port 443,
or `https://hostname.of.your.server:port` for any other port.
