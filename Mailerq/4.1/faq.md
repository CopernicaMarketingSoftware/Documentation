# MailerQ Frequently Asked Questions

Below you will find a short list of our most frequently asked questions about our Mail Transfer Agent. For more information please see our documentation. If you cannot find what you are looking for, please contact [support](mailto:support@copernica.com "contact support").

## Technical Questions

Before you download and install MailerQ, make sure you have a working [RabbitMQ](https://www.rabbitmq.com "RabbitMQ website") message broker (version 3.3.1+) . There are [three ways to send email](send-email "Send email") with MailerQ. However, posting messages directly to the AMQP message queue is the fastest way. Below you will find the 'technical' questions that are asked most frequent.

### Does MailerQ support IPv6?

Yes, MailerQ supports IPv6\. However, do note that not all receiving mail servers have support for IPv6\. It is therefore recommended to use IPv4.

### Can I see my opens, clicks, etc. in MailerQ?

No, statistics, such as opens, clicks and more are handled outside of MailerQ. MailerQ focuses completely on the delivery process of your e-mails. All delivery related results are registered by MailerQ and returned to the RabbitMQ results queue. Here your own application can read and process these results.

### What happens when an email cannot be delivered?

There are many reasons why an email cannot be delivered (initially). MailerQ will automatically place these e-mails in the retry queue and send them again after a set amount of time. Each attempt will also add a new "results" property to the JSON so you will know exactly what happened during the delivery of the email.


## License related Questions

After downloading and installing MailerQ, you will need a license to be able to use the software. This license holds a special 'key', the end date and the IP addresses you have specified as the ones you want to use.

### Where can I find a MailerQ license?

You can find MailerQ licenses on the [create License](/product/license "create license") page. On this you can choose to create a Free License (which allows you to use one IP address, send 1000 messages a minute and expires after one month) or a Commercial License (unlimited messages, unlimited IP addresses, renewed montly or annually and professional support). Make sure you add your VAT number when purchasing a commercial license. After reading the terms and conditions press the 'create' button, pay for your license if applicable, and you can download your license.

### How do I renew a license?

On the license page of your [personal profile](/product/license/all "personal profile") you can renew your current license. Renewing a license will create the exact same license, with the same IP addresses, but with a different end date. Make sure you use the 'create new license' option when you want to add new IP addreses.

### What do I do when I want to add new IP-addresses?

If you want to add new IP addresses to your license there are currently two ways to do so. The first one is to add them to your license when you create a new license. This is the easiest way if you have a monthly license. If you have an annual license or need to add new IPs right away you can contact [support](mailto:support@copernica.com "contact support"). We will have to manually add a new IP addresses to your license. In the future you will be able to do so on your profile page.

### What if I accidentally delete my license?

In the license page of your [personal profile](/product/license/all "personal profile") you can download any of your current and old licenses.

### Are there any extra costs?

No. Once you have purchased your license we will not charge you anything extra for the services offered within that license.