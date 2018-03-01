# Follow-up Manager Marketing Suite
The Follow-up manager is a user-friendly tool for creating advanced campaigns. Because this tool is integrated within the template editor and the database application, you can design advanced and personal follow-up actions at these locations.
Within the follow-up manager you can combine advanced marketing campaigns by combining boxes. Advanced boxes allow you to add extra functionalities with JavaScript objects. You can find the available objects [here](./followups-scripting).

## Triggers
The Followups starting always with a trigger. This can be a click within the template editor or a new or adjusted (sub)profile within the database application. From this moment on you can start automating emails based on actual data.

## Decision moments
By setting up decision moments, you decide what your customers will see. You can set up actions based on customer behavior.

You can easyily setup a check to see if:
- A user is subscribed
- If a profile or subprofile maches a condition
- If a link is clicked
- Or you can delay a check

## Insert actions
With an action you can send e-mails or enrich a profile.

- You can update a profile
- Create a profile or subprofile
- Unsubscribe or remove a destination
- And you can send an email

## Advanced boxes
Through JavaScript it's also possible to store customer data. You can execute these actions later on to develop sophisticated follow-up actions.

With the advanced boxes you can make your own javascript evaluation and Javascript execution boxes.
 

## Database application
With the follow-up manager you can easily start automating in the database application. The follow-ups always start with a trigger. For example, this trigger is a new or modified profile in a database. Around this you can automate campaigns with the follow-up manager. You can create follow-up actions on both a database and a collection.
Within the database app you can find the followups within the database settings.
 
## Template editor
Within the HTML and the drag-n-drop template editor you can make an automatic follow-up action on every link.
You will find the Follow-up Manager in the right column by selecting a button or link in the drag-n-drop template editor for which you want to create a follow-up action. 
Within the HTML template editor you navigate within the Tools menu to the link click follow-ups.
 
You can make a follow-up action in two ways, with the flowchart editor and with the script editor.
 
## Script editor
The script editor is just like an advanced box. Here you can use JavaScript in order to set up advanced campaigns. These scripts, like in the flowchart editor, are executed on the Copernica servers when a link is clicked. You can find the available objects [here](./followups-scripting).
 
## Lead Scoring with the Flowchart Editor 
To increase a score by a point, an Advanced Javascript Execute Box is required. Because you want to increment from an existing score, if there is one.
 
```Javascript
// update the score with 1
if (profile.fields.leadscore) profile.fields.leadscore + = 1;
 
// if no value has been saved yet
else profile.fields.leadscore = 1;
```

## More information
- [Follow-ups](./followups)
- [Follow-ups in Publisher](./follow-up-manager-publisher)
