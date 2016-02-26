## Filter bounces from your target list

When sending emails to large groups of recipients, there will always be a number of emails that cannot be delivered. Mailboxes can be flooded or abolished, receiving servers can be temporarily out of service, and many many more reasons. Some of those errors might be temporary, and won't result in an error in a next mailing. Others can however be of a more persistent nature.  

To maintain a good deliverabily (sender reputation score) it is generally a good idea to handle those bounces correctly. This basically comes down to activily removing (or exclude) email addresses with a hardbounce from your target selection. 

It is currently not possible to manage selections from the MarketingSuite. Also, the MarketingSuite uses a different method on registering those bounces. As a result, previously made bounce selections (in Publisher) didn't have any effect on mailings sent with the MarketingSuite. 

To overcome this problem, we added a new selection condition to the existing list in Publisher. The selection condition is pretty much the same as the current bounce condition. 

### Add MS bounce condition to your selection. 

- Login to [https://publisher.copernica.com](https://publisher.copernica.com)
- In the section **Profiles**, find and select the database you use for your MarketingSuite mailings. 
- Go to Database Management and click **Edit selections**. 
- Locate and click the **selection** wherein you want to add the bounce condition

If you don't have a bounce condition already, click on  **Add a new 'AND' condition to the current 'OR' rule** and then choose **Check on  MarketingSuite email results** from the list. 

Choose how you want to filter bounces and click on **store** to save changes. 

If you already have a selection with a bounce management condition, we recommend adding a new OR condition, and choose the type **Check on  MarketingSuite email results**. By having two bounce conditions inside an 'OR' condition, you can use the same selection for both mailings sent with Publisher and mailings sent with the MarketingSuite. 

For more details on the dialog to setup a bounce selection, please refer to the [documentation about this dialog](https://www.copernica.com/en/blog/selection-condition-check-on-mailing-results) on the Copernica website. 


