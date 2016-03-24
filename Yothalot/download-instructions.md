# Download instructions

Yothalot is distributed in binary form for a number of Linux distributions.
The best way to download Yothalot is to add the Copernica repository (Copernica 
is the company that develops Yothalot) to the list of sources 
used by your "apt-get" or "yum" package manager. After doing this, you
can use the regular software update tools to stay up to date with the
latest version of Yothalot.


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
software list, and to download and install Yothalot.

```
wget -O- http://packages.copernica.com/copernica.key | sudo apt-key add -
echo "deb http://packages.copernica.com/debian stable main" | sudo tee /etc/apt/sources.list.d/copernica.list
sudo apt-get update
sudo apt-get install yothalot
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

To install Yothalot on a new version of CentOS, Red Hat or Fedora, enter
the following instructions in your shell:

```
sudo wget http://packages.copernica.com/rpm/copernica.repo -O /etc/yum.repos.d/copernica.repo
sudo yum update
sudo yum install yothalot
```

Of course, if you're on an older system (CentOS 7, Red Hat 6 or Fedora 21),
you should modify the repository URL to contain "rpm-legacy" instead of "rpm".


## Specific versions

Once you've added the Copernica repository to the list of software sources,
you can always get the latest stable version of Yothalot with the instructions
"sudo apt-get install yothalot" for Debian/Ubuntu based systems or
"sudo yum install yothalot" for Red Hat based systems. If you prefer an older
version over the current stable one, or when you want to try the bleeding edge 
development version, you should append a version number.

```
sudo apt-get install yothalot-2.0
sudo apt-get install yothalot-dev
```
```
sudo yum install yothalot-2.0
sudo yum install yothalot-dev
```

The development version has a "-dev" postfix. This dev version is automatically
recompiled every 24 hours and contains the latest fixes and changes. 
Although it is often not recommended to use it in production environments, it's
a great way to keep an eye on Yothalot improvements.

Note that if you run a specific version of Yothalot, the location of the config
file changes too. By default, Yothalot loads it configuration from "/etc/yothalot/config.txt",
but if you install an explicit version the version number is included in the 
filename of the config file (for example "/etc/yothalot/config-2.0.txt" or 
"/etc/yothalot/config-dev.txt").


## PHP extension

If you want to use Yothalot within your PHP application, you need download and 
install the Yothalot-PHP extension. You can fork the bleeding edge version via
[github](https://github.com/CopernicaMarketingSoftware/Yothalot-PHP), or you
can download a stable version.

**[Get the latest release from GitHub](https://github.com/CopernicaMarketingSoftware/Yothalot-PHP/releases)**

