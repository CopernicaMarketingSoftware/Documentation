# DNS configuration

MailerQ relies on the DNS resolver functions that are standard installed on
your system. The bad thing about these standard functions is that they are 
not very good, and they were never intended for high performance MTAs that 
do many DNS lookups at the same time. There is however also a nice thing about
using the standard resolver functions: the DNS lookups of MailerQ return 
exactly the same results as the lookups done by system utilities like telnet, 
ping, openssl, dig, et cetera.

Since version 5.11, MailerQ relies on [DNS-CPP](https://github.com/CopernicaMarketingSoftware/DNS-CPP) internally. 
This is an asynchronous resolver that can handle many different concurrent requests efficiently, and also has support
for DNSSEC. This library picks up /etc/resolv.conf and /etc/hosts normally, similar to getaddrinfo().

Unfortunately, for some domains the TTLs that are in DNS are very low, causing MailerQ to retry much too often. Some
domains specify TTLs in the range of 0-30 seconds. To mitigate this, the minimum _respected_
TTL is 60 seconds by default, since some domains specify 0 TTL which can cause lookups for every message.
This incurs a significant performance penalty. To change this minimum value, the following config file option can be used:

```
dns-min-ttl:  120
```

This will make sure that the mininum respected TTL is 120 seconds. Note that the minimum allowed value should
be greater than zero, since zero is explicitly disallowed due to the performance penalty.
