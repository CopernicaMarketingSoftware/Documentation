# Download instructions

MailerQ is distributed in binary form for a number of Linux distributions.
The best way to download MailerQ is to add the Copernica repository (Copernica 
is the company that develops MailerQ) to the list of sources 
used by your "apt-get" or "yum" package manager. After doing this, you
can use the regular software update tools to stay up to date with the
latest version of MailerQ.


## Installing on Debian/Ubuntu based systems

We have two repositories, one for newer Ubuntu and Debian versions (Ubuntu
12.04 and up, and Debian version 8 and higher), and a repository for the
older Debian 6 and Debian 7 versions.

<table>
    <tr>
        <td>Ubuntu 12.04 and up</td>
        <td>deb http://packages.copernica.com/debian stable main</td>
    </tr>
    <tr>
        <td>Debian 8 and up</td>
        <td>deb http://packages.copernica.com/debian stable main</td>
    </tr>
    <tr>
        <td>Debian 6 and Debian 7</td>
        <td>deb http://packages.copernica.com/debian legacy main</td>
    </tr>
</table>

You can enter the following instructions to add our repository to your
software list, and to download and install MailerQ.

```
wget -O- http://packages.copernica.com/copernica.key | sudo apt-key add -
echo "deb http://packages.copernica.com/debian stable main" | sudo tee /etc/apt/sources.list.d/copernica.list
sudo apt-get update
sudo apt-get install mailerq
```

Watch out: if you're on Debian 6 or Debian 7, make sure you replace the 
word "stable" with "legacy"!


## Installing on Red Hat based systems

For Red Had based systems there are two repositories as well, one for
the latest versions of these systems, and one for older releases.

<table>
    <tr>
        <td>CentOS 7+, Red Hat 7+, Fedora 22+</td>
        <td>http://packages.copernica.com/rpm/copernica.repo</td>
    </tr>
    <tr>
        <td>CentOS 6, Red Hat 6, Fedora 21</td>
        <td>http://packages.copernica.com/rpm-legacy/copernica.repo</td>
    </tr>
</table>

To install MailerQ on a new version of CentOS, Red Hat or Fedora, enter
the following instructions in your shell:

```
sudo wget http://packages.copernica.com/rpm/copernica.repo -O /etc/yum.repos.d/copernica.repo
sudo yum update
sudo yum install mailerq
```

Of course, if you're on an older system (CentOS 7, Red Hat 6 or Fedora 21),
you should modify the repository URL to contain "rpm-legacy" instead of "rpm".


## Specific versions

Once you've added the MailerQ repository to the list of software sources,
you can always get the latest stable version of MailerQ with the instructions
"sudo apt-get install mailerq" for Debian/Ubuntu based systems or
"sudo yum install mailerq" for Red Hat based systems. If you prefer an older
version over the current stable one, or when you want to try the bleeding edge 
development version, you should append a version number.

```
sudo apt-get install mailerq-4.0
sudo apt-get install mailerq-dev
```
```
sudo yum install mailerq-4.0
sudo yum install mailerq-dev
```

The development version has a "-dev" postfix. This dev version is automatically
recompiled every 24 hours and contains the latest fixes and changes. 
Although it is often not recommended to use it in production environments, it's
a great way to keep an eye on MailerQ improvements.

Note that if you run a specific version of MailerQ, the location of the config
file changes too. By default, MailerQ loads it configuration from "/etc/mailerq/config.txt",
but if you install an explicit version the version number is included in the 
filename of the config file (for example "/etc/mailerq/config-4.0.txt" or 
"/etc/mailerq/config-dev.txt").


## Dynamically linked versions

All repositories mentioned above contain MailerQ versions that are statically 
linked, which means that there are hardly any dependencies. However, due to licensing
conditions, we are required to supply dynamically linked versions of MailerQ too.
If you prefer using a dynamically linked version, add '-shared' to the package name.


```
sudo apt-get install mailerq-4.0-shared
sudo apt-get install mailerq-dev-shared
```
```
sudo yum install mailerq-4.0-shared
sudo yum install mailerq-dev-shared
```

