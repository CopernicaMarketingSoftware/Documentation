#Yothalot\Connection

The **Connection** class connects Yothalot to the cluster via RabbitMQ.
Member functions are:
- Connection (constructor)
- create (creates a job)
- flush  (flushes job)

**Connection()** is the constructor of the object. Its usage is:
 ```php
$master = new Yothalot\Connection("host","user","password","vhost","exchange","routingkey");
```
Where `"host"` is the hostname of RabbitMQ, `"user"` is the username of RabbitMQ, `"Password"` is the password of RabbitMQ, `"vhost"` is the virtual host of RabbitMQ, `"routingkey"` is the routing key.


**create()** creates a MapReduce job on the cluster. Its usage is:
```php
create(mapReduce);
```
Where `mapReduce` is an instance of your MapReduce class that implements the Yothalot\Mapreduce interface.

**flush()** flushes the connection. Its usage is:
```php
flush();
```
