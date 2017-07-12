# Follow-up Manager: Conditions

Follow-ups can be set up in the [Publisher](./follow-up-manager-publisher), 
[Marketing Suite](./follow-up-manager-ms) or with 
[data-scripts](./followups-scripting). All of these methods support conditions 
to check on set-up or execution, considering the data at the specified moment. 
To add such a condition make a followup first and then add it to the 
finished followup.

We distinguish between two types of conditions. The difference between 
them is when the data is evaluated: at condition activation or followup 
execution.

1.  Activation condition (A)
2.  Execution condition (B)

## A. Activation condition

When setting up an activation condition the data concerned is evaluated 
immediately. If necessary the followup is executed immediately, but it's 
also possible that you have scheduled the followup for a later date. Please 
note that the data may change between activation and execution.

Imagine that you have sent an email with links to different products. For 
each profile you save which links were or weren't clicked. You currently 
have an offer for one of the articles, so you decide to email customers 
who have clicked a link to this article before. You can use the activation 
condition for your followup here. At the moment of creation the condition 
checks who clicked the link before and emails only them. You use the activation 
condition because you only want to email interested people now, not people 
who click the link in the future, because the offer might not be valid anymore.

## B. Execution condition

The execution condition checks the data concerned at the moment of 
executing the followup. The data at the moment of activation is disregarded.

Imagine that you have scheduled an email to invite your contacts to 
a wine tasting. However, you are aware that not everyone is interested 
in wine and in order not to bother those that are uninterested you only 
want to email people who have "wine" in the interests of their profile. 
Because interests change you want to check who is interested at the time 
the invitation is to be sent. This is where you use the execution condition 
to only invite the people who are interested in "wine" at that very moment. 
If you would use the activation condition instead it's possible that you 
miss people who have added "wine" as an interest in the mean time, or that 
you email people who have let you know that they are not interested anymore.

## More information

* [Follow-up Manager Publisher](./follow-up-manager-publisher)
* [Follow-up Manager Marketing Suite](./follow-up-manager-ms)
* [Followups scripting](./followups-scripting)
* [Followup types](./followups-types)
