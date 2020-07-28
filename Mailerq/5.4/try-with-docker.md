# Trying the software with Docker

The easiest way to try out MailerQ is using Docker. The MailerQ docker image is 
completely self-contained, and allows you to run MailerQ without the hassle of
setting up its dependencies in under a minute.

## Installing
First, to install the 5.4 version of the MailerQ image, run 
```
docker pull mailerq/mailerq:5.4
```

## Running
Now, [create a trial](https://www.mailerq.com/request-trial) if you have not already done so.
Then, the simplest method is to copy your license key from
[here](https://www.mailerq.com/product/license) and supply it to Docker inside an
environmental variable. To do this, you can run 
```
docker run -e LICENSE_KEY=<your_license_key> -it mailerq/mailerq:5.4
```
with your license key filled in. This way, the image will automatically download a 
short-lived license on each startup, ideal for testing.

Alternatively, you can manually download the `license.txt` file, and bind the image license
file to the host file. To accomplish this, you can run
```
docker run -v `pwd`/license.txt:/etc/mailerq/license.txt -it mailerq/mailerq:5.4
```
with the `license.txt` in the current working directory.

## Access

That is it! Now you can access the MailerQ management console [here](http://172.17.0.2)
and the RabbitMQ management console [here](http://172.17.0.2:15672).

## RabbitMQ
By default, the image runs on its own network managed by Docker, which means that the 
default username and password `guest` in RabbitMQ do not work. Therefore, on startup,
an extra account `mailerq` is created with password set to `mailerq`.
