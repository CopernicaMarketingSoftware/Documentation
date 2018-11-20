# Upgrade and downgrade instructions

To upgrade MailerQ from version < 5.3 to 5.3+

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

To downgrade MailerQ from version 5.3+ to 5.2

**Debian/Ubuntu:**

```txt
sudo apt-get install -y --allow-downgrades mailerq-5.2 mailerq=5.2.1
sudo mailerq --repair-database
```

**CentOS/RHEL:**

```txt
yum remove mailerq-5.3
yum install mailerq-5.2
mailerq --repair-database
```
