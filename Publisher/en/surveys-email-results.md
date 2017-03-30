# Survey: Send survey answers by email.

Copernica also offers the option to send an email with the answers given 
by the participant each time the survey is completed.

To send an email for every survey completion you should create a follow-up 
action. First select "The survey has been sent" for **cause**. Under **action** 
you should select "Send a text e-mail". You can now add a sender name and 
address. The tab "message" is the text body and should use the following 
code that outputs the answers given in the survey.

    {foreach from=$survey.questions key=number item=question}
      {$question.question}
      {$question.type}
      {if $question.type == "open"}
       {$question.answer}
      {else}
       {foreach from=$question.answer item=answer}{$answer}{foreach}
      {if}
     {foreach}

## More information

* [Surveys](./surveys)
* [View results](./surveys-view-results)
* [Export results](./surveys-export-results)
* [Surveys follow-up](./surveys-followup)
