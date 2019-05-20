# Upgrade and downgrade instructions

To upgrade MailerQ from version < 5.5 to 5.5+

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

To downgrade MailerQ from version 5.5+ to 5.4

**Debian/Ubuntu:**

```txt
sudo apt-get install -y --allow-downgrades mailerq-5.4
sudo mailerq --repair-database
```

**CentOS/RHEL:**

```txt
yum remove mailerq-5.5
yum install mailerq-5.4
mailerq --repair-database
```
