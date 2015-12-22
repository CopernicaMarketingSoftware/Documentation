# Warming up an IP address

Sending a large number of emails immediately from a fresh new IP address, can get you
deferred or blocked by ISP's such as outlook.com, gmail.com. This is mostly because a
new IP does not have a reputation score since email has not been sent from it yet.
The reputation score is an indication of the trustworthiness of an email sender’s IP
address and is used by email providers and filters to determine additional email
filtering criteria. 

One way to improve your reputation score, is to warm up your IP address. This involves ramping up
email volume over a specified period of time. Once you have warmed up your IP address
succesfully, you can send large numbers of emails and get through the ISP's killer
filters with more success.

How to begin? Peter will show you how to start sending emails over a new IP address
without delivery failures.

## Why warming up an IP address is important
An IP that has not sent any emails yet does not have a reputation score. A new IP is
considered 'cold'. And a good reputation score is not achieved overnight. You need to
start small and gradually increase the number of emails to send larger volumes in the end.
Your reputation increases as more recipients open your email, and the ISPs will begin to
accept more email from your IP address because of the increasing reputation.

## Do I need to warm up my IP address?
If you are a small sender, around 10,000 or less emails per month, you will most likely stay below
the radar of ISP's. Then, there is no need to warm up an IP. But if you send more than 10,000 emails a month,
you should consider warming up your IP address.

## First things first...
Great, now that you know if you have to warm up or not, there are a
few things you need to check first.

* Ensure key email authentication methods (SPF, DKIM and DMARC) are in place
* Start sending only to recipients that have recently opened or clicked an email
* Avoid sending emails to recipients that have 'hard-bounced' in the past
* Regularly monitor your email deliverability (bounce rate < 10% & complaint rate < 0.1%)

## Ramping up guide
As mentioned before, warming up an IP involves ramping up email volume over a specified period of time.
Please be aware that every sender is different and so is every ISP. How many emails you send in that
first period depends on the amount of emails you want to send once the warming up process is finished.

You can never warm up an IP fast. That is just insane. At SMTPeter we suggest two approaches:

### The safe approach
Estimate your total monthly email volume and divide that number by 30.
Then, spread your sending evenly over the first 30 days, based on that calculation.

__Example:__ If you want to send 180,000 emails a month, start off by sending
6,000 emails per day over the first month.

### The 'Living on the Edge' approach
Estimate your total monthly email volume and divide that number by 15. Then, spread your sending evenly over the first 30 days, based on that calculation.

__Example:__ if you want to send 180,000 emails/ month, start off by sending 12,000 per day
over the first 15 days. If your experience throttling (deferred emails), slow down a bit.

