# Download instructions

The easiest way to get your hands on the software is to add the Copernica 
repository to the source list of your package manager. You can then use
"apt" or "yum" package managers to install MailerQ, and to get updates. If 
you do not want to use your package manager, you can download MailerQ 
manually. Check out our [downloads page](/product/downloads) for a list of 
available files that can be manually installed.

## Installing MailerQ on Debian/Ubuntu based systems

We have a single repository, for Ubuntu (14.04 and higher) and Debian 
(8 and higher) versions.

<table>
    <tr>
        <td>Debian 8+ and Ubuntu 14.04+</td>
        <td>deb https://packages.mailerq.com/debian stable main</td>
    </tr>
</table>

You can enter the following instructions to add our repository to your
software list, and to download and install MailerQ.

```bash
# Download and add the repository key
wget -qO - https://packages.mailerq.com/mailerq.key | sudo apt-key add -
# Add the MailerQ repository to apt
echo "deb https://packages.mailerq.com/debian stable main" | sudo tee /etc/apt/sources.list.d/mailerq.list
# Update the apt cache
sudo apt update
# Install the latest MailerQ
sudo apt install mailerq
```

## Installing MailerQ on Red Hat based systems

For Red Had based systems there is a single repository as well.

<table>
    <tr>
        <td>CentOS 7+, Red Hat 7+, Fedora 22+</td>
        <td>https://packages.mailerq.com/rpm/mailerq.repo</td>
    </tr>
</table>

To install MailerQ on a supported version of CentOS, Red Hat or Fedora, 
enter the following instructions in your shell:

```bash
# Add the MailerQ repository to yum
sudo wget https://packages.mailerq.com/rpm/mailerq.repo -O /etc/yum.repos.d/mailerq.repo
# Install the latest MailerQ
sudo yum install mailerq
```

## Specific versions

Once you've added the MailerQ repository to the list of software sources,
you can always get the latest stable version of MailerQ with the instructions
"sudo apt-get install mailerq" for Debian/Ubuntu based systems or
"sudo yum install mailerq" for Red Hat based systems. If you prefer an older
version over the current stable one, you can append a version number.

```bash
sudo apt-get install mailerq-5.6
```

```bash
sudo yum install mailerq-5.6
```
Note that if you run a specific version of MailerQ, the location of the config
file changes too. By default, MailerQ loads it configuration from "/etc/mailerq/config.txt",
but if you install an explicit version the version number is included in the 
filename of the config file (for example "/etc/mailerq/config-5.6.txt").
This allows for easy downgrades to a previously installed version.


## Dynamically linked versions

All repositories mentioned above contain MailerQ versions that are statically 
linked, which means that there are not many dependencies. However, due to licensing
conditions, we are required to supply dynamically linked versions of MailerQ too.
If you prefer using a dynamically linked version, add '-shared' to the package name.


```bash
sudo apt-get install mailerq-shared
```
```bash
sudo yum install mailerq-shared
```

