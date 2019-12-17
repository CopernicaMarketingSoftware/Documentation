# Upgrade and downgrade instructions

To upgrade MailerQ from version < 5.7 to 5.7+

**Debian/Ubuntu:**

```txt
sudo apt update
sudo apt install -y mailerq
sudo mailerq --repair-database
```

**CentOS/RHEL:**

```txt
yum update
mailerq --repair-database
```

To downgrade MailerQ from version 5.7+ to 5.6

**Debian/Ubuntu:**

```txt
sudo apt-get install -y --allow-downgrades mailerq-5.6
sudo mailerq --repair-database
```

**CentOS/RHEL:**

```txt
yum remove mailerq-5.7
yum install mailerq-5.6
mailerq --repair-database
```
