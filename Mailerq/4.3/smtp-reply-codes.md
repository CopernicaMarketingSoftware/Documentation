<h1>SMTP reply codes</h1>
<p>
    The list below is a standard list with the SMTP reply codes
    according to the SMTP standard. Beware however that this is just a standard,  
    and that certain SMTP servers might return their own status, codes and descriptions
    that differ from the list below.
</p>
| Code | Status (SMTP Error) | Description                                                        |
|------|---------------------|--------------------------------------------------------------------|
| 211  | 2.1.1               | System status, or system help reply                                |
| 214  | 2.1.4               | Help message                                                       |
| 220  | 2.2.0               | <domain> Service ready                                             |
| 221  | 2.2.1               | <domain> Service closing transmission channel                      |
| 250  | 2.5.0               | Requested mail action okay, completed                              |
| 251  | 2.5.1               | User not local; will forward to &lt;forward-path&gt;               |
| 354  | 3.5.4               | Start mail input; end with &lt;CRLF&gt;.&lt;CRLF&gt;               |
| 421  | 4.2.1               | &lt;domain&gt; Service not available, closing transmission channel |
| 450  | 4.5.0               | Requested mail action not taken: mailbox unavailable               |
| 451  | 4.5.1               | Requested action aborted: local error in processing                |
| 452  | 4.5.2               | Requested action not taken: insufficient system storage            |
| 500  | 5.0.0               | Syntax error, command unrecognised                                 |
| 501  | 5.0.1               | Syntax error in parameters or arguments                            |
| 502  | 5.0.2               | Command not implemented                                            |
| 503  | 5.0.3               | Bad sequence of commands                                           |
| 504  | 5.0.4               | Command parameter not implemented                                  |
| 521  | 5.2.1               | &lt;domain&gt; does not accept mail                                |
| 530  | 5.3.0               | Access denied                                                      |
| 550  | 5.5.0               | Requested action not taken: mailbox unavailable                    |
| 551  | 5.5.1               | User not local; please try &lt;forward-path&gt;                    |
| 552  | 5.5.2               | Requested mail action aborted: exceeded storage allocation         |
| 553  | 5.5.3               | Requested action not taken: mailbox name not allowed               |
| 554  | 5.5.4               | Transaction failed                                                 |
