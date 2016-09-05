An import to a database can be set to run repeatedly (e.g. daily) and
you can specify a date and time when the import should be performed. To
use the scheduled import function, the data file must be available on an
online location.

Scheduled imports work the same as normal imports.

In the first step you **enter the online location** where the import
file is found.

When importing from a web location you can either use the *http, https,
ftp*and the *ftps*protocol.

#### Example online locations:

-   http://www.yourdomain.com/directory/file.txt
-   ftps://username:password@hostname/directory/file.txt

![](../images/import-from-online-location.png)

Please specify if the columns of the import file are recognized by tab,
comma or semicolon. Click Upload file and proceed to the next step

After you have defined the location of the import file in the first
step, you will see the option for periodic imports on the 'Interval' tab
of the dialogue window.

Choose *'periodic import*' and set the interval at which the import
should be repeated. This means that the application will check the
designated location and import the file present there, every
day/week/month/year or such frequency as you set at *'interval'*.

Make sure to also follow the process of *Setting columns*and *Editing
import settings*before starting the import!

![The interval tab enables you to set an interval for a scheduled
import](../images/scheduledimport.png)
