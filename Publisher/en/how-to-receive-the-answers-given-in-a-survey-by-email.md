You can have the ansers given in a survey delivered to your inbox each
time a survey has been completed and sent.

To do so, create a survey follow-up action

-   **cause**, the survey has been sent
-   **effect**: send textual e-mail, choose fixed address and enter your
    e-mail address. Copy and paste the following text into the body of
    the e-mail:

{foreach from=\$survey.questions key=number item=question}\
  {\$question.question}\
  {\$question.type}\
  {if \$question.type == "open"}\
   {\$question.answer}\
  {else}\
   {foreach from=\$question.answer item=answer}{\$answer}{/foreach}\
  {/if}\
 {/foreach}

This will output the answers given by the respondent.
