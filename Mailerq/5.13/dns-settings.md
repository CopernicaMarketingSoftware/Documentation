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

## Timeouts

Since 5.12, the timeouts on DNS requests can be configured in MailerQ. There are two settings for altering the timings. Naturally,
settings from /etc/resolv.conf will be picked up first, and then the settings in MailerQ are applied on top of them. If the setting
inside MailerQ is empty, the setting from resolv.conf will be kept. 

```
dns-timeout:     60.0
dns-interval:    3.0
```

The `dns-timeout` setting limits the time the resolver waits for a response after the last attempt was made. 
The `dns-interval` specifies after how many seconds of waiting for a reply on the initial query, the query should be retransmitted. 

## Quality of Service

Since 5.13 three settings were added to finetune the maximum workload of the DNS resolver:

- `dns-attempts`: If you run into errors for domains that are reported to not exist, while you know that they do exist, consider making this value higher. MailerQ will then try longer doing DNS lookups before giving up. Default: `5`.
- `dns-capacity`: The number of DNS lookups that can run in parallel. Make this value higher if you notice that DNS lookups are a bottleneck in your delivery, and make it lower if your DNS server cannot keep up with the lookups (or add more DNS servers). Default: `100`.
- `dns-sockets`: To improve security MailerQ rotates the lookups over different sockets. By doing this, MailerQ avoids that the same port is constantly used for handling DNS responses. If this is set to 1, MailerQ can only rotate / start using a different port when there are no more lookups in progress. A higher value brings more rotating options and thus more security. Default: `4`.

## Buffer size

DNS works over UDP, and so these packets may be lost at any point in the process, which means that they may have never been 
seen by the recursor, or the recursor has replied and we had to drop the packet. To prevent the latter problem, the `dns-buffersize`
setting was introduced.

```
dns-buffersize:  1MB
```

This sets the receiving and sending buffer size. We recommend raising this as high as possible, since that makes the probability of
dropped packets because the receive buffer is full significantly lower. Keep in mind that this is bound by the system limit on the
receive buffer size, which can be altered with sysctl. To make it larger, use the following commands to tune the settings.

```
sysctl -w net.core.rmem_max=1000000
sysctl -w net.core.wmem_max=1000000
```

## Rotation

If all nameservers in /etc/resolv.conf are local resolvers and have a similar resolving speed, we recommend setting the rotate option to true:

```
dns-rotate:     true
```

This will allow MailerQ to distribute the load across the nameservers randomly, performing a rudimentary load-balancing
on it. 
