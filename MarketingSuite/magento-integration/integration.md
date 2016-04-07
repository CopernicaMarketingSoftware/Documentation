# Integration

Copernica developed an official extension for Magento to synchronize data between your Magento webshop and the Marketing Suite. Once you have installed the extenstion and synchronized the data, you will 
be able to target mailings based on the data of your Magento webshop.  

## Download extension

The extension can be installed for free from the [Magento Connect][connect-link] website.

## Installation guide

Installing the extension is actually pretty simple and performed in just a few steps. 

**Important**: If you have an existing installation of the old SOAP based extension, it is important
to remove this extension first before proceeding with installing the new one.

**Also important** To install the extension, you need access to the Magento Admin Panel of the webshop. Also you need Admin rights inside Copernica. To see if you have such priveleges, log in to your dashboard on [Copernica.com/en/dashboard](https://www.copernica.com/nl/account/-/choose), go to the account settings (not your personal settings), and then click *Users* under *Account* from the left side menu.   

### Now the actual installation

Extension can be installed via Magento Connect platform and via [modman][modman-link]. Both installation methods should yield same results.

#### Magento Connect installation

*   Go to [Magento Connect][connect-link] to get the link to the extension. 

*   Copy this link to your clipboaard. 

*   Go to your Magento Admin Panel and paste the link into Magento Connect Manager 
    (System -> Magento Connect -> Magento Connect Manager)

Magento Connect Mananager will now start installing the extension. Once the installation 
is complete, a new menu item named 'Copernica' will appeara in the Magento Admin navigation.

#### Modman installation

To install extension via modman, ssh access to server will be required. 

Navigate to magento directory and execute following lines:

```
git clone https://github.com/CopernicaMarketingSoftware/MAGENTO.git ~/Copernica_Integration

modman init

modman link ~/Copernica_Integration

modman deploy Copernica_Integration
```

#### Initial configuration

If you don't see this menu item, you might try to logout and login again. 

*   Go to Copernica -> Account Settings 
*   Click the link 'Authorize for account'

This will bring you to the Copernica website where you can choose the account 
you want to sync your webshop with. A webshop can only be linked to one Copernica 
account at the same time. The Magento webshop is now authorized to sync data with Copernica.

Cool. Now, lets synchronize!

*   Go back to the *Magento Admin Panel* and choose *Synchronize data* from the the *Copernica* menu.
*   Find the *Synchronize data* button in the top right corner, and click it to 
    start the synchronization process.

Depending on the amount of data to synchronize, synchronization can take from 5 minutes to hours. 

Once the installation and synschronzation is complete, the two applications will
automcatically remain in sync. Thus, if a customer places an order, Magento will 
automatically inform Copernica of this event. 


## Open source

The Magento integration for the Marketing Suite is created and maintained by Copernica. 
We have decided to make the integration open source, and we invite anyone interested to contribute. 

The code is hosted on  [GitHub](https://github.com/CopernicaMarketingSoftware/MAGENTO).

## Old extension

Inside Magento Connect platform users can find two extensions. [The most recent one](http://www.magentocommerce.com/magento-connect/copernica.html) is created by Copernica and it's designed to work with Marketing Suite.

The second is created and maintained by partner company [Cream](http://www.cream.nl/). This 
extension was developed with Publisher software in mind. That means it will use product databases and selections instead of the special Magento targets.

[Read more about differences between new and old extension](integrations-differences)

### Compatibility

The extensions are not compatible with each other and there is no way to upgrade 
from old one to new one. It's highly advised to remove the old extension prior 
to the installation of the newest version.

[modman-link]: https://github.com/colinmollenhour/modman
[connect-link]: http://www.magentocommerce.com/magento-connect/copernica.html
