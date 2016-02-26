# Download instructions

MailerQ is distributed in binary form for a number of Linux distributions.
The best way to download MailerQ is to add the Copernica repository (Copernica 
is the company that develops MailerQ) to the list of sources that are
used by your "apt-get" or "yum" package manager. After doing this, you
can use the regular software update tools to stay up to date with the
latest version of MailerQ.


## Installing on Debian/Ubuntu based systems

We have two repositories, one for newer Ubuntu and Debian versions (Ubuntu
12.04 and up, and Debian version 8 and higher), and a repository for Debian
6 and Debian 7.

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
you should modify the repository URL.


## Multiple versions

Once you've added the MailerQ repository to the list of software sources,
you can always get the latest stable version of MailerQ with the instructions
`sudo apt-get install mailerq` for Debian/Ubuntu based systems or
`sudo yum install mailerq` for Red Hat based systems. If you prefer a previous
version, or when you want to try the bleeding edge development version,
you can also append a version name.

```
sudo apt-get install mailerq-4.0
sudo apt-get install mailerq-dev
```
```
sudo yum install mailerq-4.0
sudo yum install mailerq-dev
```

The development version has a "-dev" postfix. This dev version is automatically
recompiled every 24 hours and contains the latest fixes and changes. However,
it is often not recommended to use it in production environments.


## Additional repositories

All binary distributions are statically linked, which means that MailerQ hardly
needs any libraries to be available on your system. However, due to licensing
conditions, we are required to supply dynamically linked versions of MailerQ too.
If you prefer using a dynamically linked version, use one of the following
repositories:

<table>
    <tr>
        <td>Debian/Ubuntu latest</td>
        <td>deb http://packages.copernica.com/debian stable-shared main</td>
    </tr>
    <tr>
        <td>Debian/Ubuntu legacy</td>
        <td>deb http://packages.copernica.com/debian legacy-shared main</td>
    </tr>
    <tr>
        <td>Red Hat latest</td>
        <td>http://packages.copernica.com/rpm-shared/copernica.repo </td>
    </tr>
    <tr>
        <td>Red Hat legacy</td>
        <td>http://packages.copernica.com/rpm-shared-legacy/copernica.repo </td>
    </tr>
</table>
