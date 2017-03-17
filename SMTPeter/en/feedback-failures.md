# Feedback loops for failures

If you want to receive realtime notifications about failed deliveries,
you can set up a failures feedback loop. You will receive notifications
for both synchronous failures (failures during the SMTP handshake)
as well as asynchronous failures (messages that were initially accepted,
but for which we received a failure report later on).


## Synchronous vs asynchronous

The SMTP protocol allows receiving servers to either accept or reject a 
message. When a message is rejected, SMTPeter simply makes a call to the 
URL that you set up for the feedback loop. However, when a message is 
accepted, it still is possible that the receiving server sends back a 
bounce email later on to report that the delivery failed after all. These 
asynchronous errors are also picked up by SMTPeter, and when they are 
recognized, are also passed to the failures feedback loop.

Mail servers often use the official Delivery Status Notification standard 
for sending back bounce messages. This standardized format allows SMTPeter
to automatically recognize bounces, log them and report them via the
feedback loops. However, this standard has not been adopted by all
mail servers, and even a couple of big email senders still send back 
notifications in a format that they invented themselves. Although we do
our best to recognize all types of bounce messages and pass them on to
the feedback loops, it is not always possible to process such non-standardized
asynchronous bounces, and to pass them to feedback loops.

If you want to receive all bounces, even the ones that we did not recognize,
you can set up a [feedback loop for bounces](feedback-bounces) besides
the failure feedback loop.


## Format

SMTPeter uses HTTP POST calls to send the data to you. This can be done
over HTTP or over HTTPS. The following variables are used in the POST
calls:

<table>
    <tr>
        <td>id</td>
        <td>unique id of the message for which this is a failure report</td>
    </tr>
    <tr>
        <td>recipient</td>
        <td>email address for which this is a failure</td>
    </tr>
    <tr>
        <td>state</td>
        <td>state in the smtp protocol where the failure occured ("bounce" for async bounces)</td>
    </tr>
    <tr>
        <td>code</td>
        <td>optional smtp error code</td>
    </tr>
    <tr>
        <td>extended</td>
        <td>optional extended smtp status code</td>
    </tr>
    <tr>
        <td>description</td>
        <td>optional description of the error</td>
    </tr>
</table>

