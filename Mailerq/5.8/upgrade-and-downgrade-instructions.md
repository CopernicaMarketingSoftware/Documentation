# Upgrade and downgrade instructions

To upgrade MailerQ from version < 5.8 to 5.8+

**Debian/Ubuntu:**

```txt
sudo apt update
sudo apt install -y mailerq
sudo mailerq --repair-database
sudo systemctl restart mailerq
```

**CentOS/RHEL:**

```txt
yum update
mailerq --repair-database
systemctl restart mailerq
```

To downgrade MailerQ from version 5.8+ to 5.7

**Debian/Ubuntu:**

```txt
sudo apt-get install -y --allow-downgrades mailerq-5.7
sudo mailerq --repair-database
sudo systemctl restart mailerq
```

**CentOS/RHEL:**

```txt
yum remove mailerq-5.8
yum install mailerq-5.7
mailerq --repair-database
systemctl restart mailerq
```
