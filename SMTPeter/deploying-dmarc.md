# It's very important to deploy DMARC slowly!

SMTPeter visualizes how your messages are authenticated in a report which is updated frequently within your 
dashboard. When you add a new sender domain, Peter suggests to start with the 'monitor' `policy` so you can 
monitor your messages and look for anomalies in the reports, for example messages that are not yet being 
signed or are being spoofed. 

Then, when you are comfortable with the results, change the the domain `policy` in your dashboard from "monitor" 
to "quarantine". Once again, review the results, this time in both your spam catch and in the reports. Finally, 
once you are absolutely sure all of your messages are authenticated correctly, change the `policy` setting to 
"reject" to make full use of DMARC. Review your reports on a regular basis to ensure your results are acceptable.

Aside of the domain `policy` you have the possibility to define the amount of messages (in percent) which should 
be authenticated. By default 100% of your messages are affected by the `policy`. Setting this value to e.g. 
10% results in one-tenth of all messages being affected. This setting is especially useful once you choose to 
"quarantine" or "reject" mail. Start with a lower percent to begin with and increase it every few days.

Peter, being a careful guy, would recommend you a safe deployment cycle which resembles something like this:

| Domain policy | Percentage |
| ----   | ---        |
| Monitor | 100% |
| Quarantine | 1% |
| Quarantine | 5% |
| Quarantine | 10% |
| Quarantine | 25% |
| Quarantine | 50% |
| Quarantine | 100% |
| Reject | 1% |
| Reject | 5% |
| Reject | 10% |
| Reject | 25% |
| Reject | 50% |
| Reject | 100% |
