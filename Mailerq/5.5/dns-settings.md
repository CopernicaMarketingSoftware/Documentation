# DNS configuration

MailerQ relies on the DNS resolver functions that are standard installed on
your system. The bad thing about these standard functions is that they are 
not very good, and they were never intended for high performance MTAs that 
do many DNS lookups at the same time. There is however also a nice thing about
using the standard resolver functions: the DNS lookups of MailerQ return 
exactly the same results as the lookups done by system utilities like telnet, 
ping, openssl, dig, et cetera.


## Seperate threads

To work around the bad aspects of the standard resolver functions, MailerQ
runs all DNS operations in seperate threads. By doing this, a slow DNS 
operation can never block or slow down other mail deliveries. The number of
threads that MailerQ uses for the DNS lookups can be set in the config file
using the "dns-threads" variable:

```
dns-threads:        5
```

The management console has a special DNS widget that you can use to monitor
how many DNS operations are in progress. If you see that the number of DNS operations
is almost always higher than the number of threads, it is best to increase
the number of threads. This will immediately improve your MTA's performance.


## Using getaddrinfo

For the DNS lookups of IP addresses, MailerQ uses the standard "getaddrinfo"
library call that is available on all Linux systems. This function checks the 
/etc/hosts and /etc/gai.conf files for your server's DNS settings and it sends
a DNS query to a DNS server if necessary. This is exactly what you want.

However, this standard "getaddrinfo" function does not expose the time-to-live 
(TTL) value to its caller, which is needed to know for how long DNS results can be cached. 
MailerQ is therefore conservative and assumes that all TTLs are set to 60 
seconds. This low TTL value causes a lot of unnecessary DNS lookups, because 
DNS queries are repeated every single minute, while in reality most TTL are 
set to a much higher values (for example 24 or 48 hours).

To prevent all these extra DNS lookups, you can instruct MailerQ to forget 
about the "getaddrinfo" function and send queries to DNS server directly. If 
MailerQ does this, it will have access to the real TTL value, and can cache 
the DNS results for a much longer time. You can disable the "getaddrinfo" calls 
with the following config file setting:

```
dns-getaddrinfo:    no
```

There is however a downside here. If the getaddrinfo function is not used,
MailerQ will also not check the /etc/hosts and /etc/gai.conf file, and you
run the risk that MailerQ's DNS lookups return different results than the
lookups of system utilities.

There is a second downside to the real TTLs, because this may also be very low. Some
domains specify TTLs in the range of 0-30 seconds. To mitigate this, the minimum _respected_
TTL is 60 seconds by default, since some domains specify 0 TTL which can cause lookups for every message.
This incurs a significant performance penalty. change this minimum value, the following config file option can be used:

```
dns-min-ttl:  120
```

This will make sure that the mininum respected TTL is 120 seconds. Note that the minimum allowed value should
be greater than zero, since zero is explicitly disallowed due to the performance penalty.

## DNS lookups for database reloads

Every couple of minutes, MailerQ reloads all its information from the database,
and validates all the DKIM keys in the database by matching the public key
found in DNS with the private key in the database. If you have a lot of 
DKIM keys in your database, this could take a very long time because the DNS
lookups are slow and MailerQ can only run one at a time. If you want to speed 
this up, you can start special DNS threads that are only used when
DKIM keys are being reloaded. This allows MailerQ to run many lookups in 
parallel. The number of threads can be set in the config file:

```
database-threads:   10
```

These threads only run during the short period of time that DKIM keys are 
loaded from the database.
