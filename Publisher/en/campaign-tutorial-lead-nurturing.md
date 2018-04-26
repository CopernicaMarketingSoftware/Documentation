# Campaign Tutorial: Lead Scoring and Nurturing

Lead nurturing is the process of guiding potentials customers, also referred 
to as leads, into becoming paying customers by gradually providing them 
with more information. 

With Copernica's follow-up manager we can not only automate this process, 
but also help tailor the experience for each individual lead. We introduce 
the concept of the *leadscore* which reflects the interest of the user. 
A user starts at zero and the score is incremented for each action that 
shows interest in your company, product or service. When the leadscore 
is high enough it is time to take action and approach the lead. This 
tutorial will teach you how to set up a so-called drip campaign to nurture 
a lead.

## Preparing the campaign

### Content

The goal of this campaign is to guide the new user by gradually providing 
more content, hopefully resulting in a new sale. Think about the interests 
and needs of the customer when creating and picking your content: 
What do users need in terms of information? What will they find interesting? 
What will set you apart from competitors?

Of course, not everyone will be equally interested. For this tutorial we 
will divide into three types of content, suitable for users of different 
interest levels.

* Light content: This is light, simple content meant to pique the interest 
of your users. You can send them tips and tricks, blog posts or short videos 
related to the service or product. Be careful not to push your company or 
product on the lead too much. The increase in leadscore for clicking 
this content should be low. 
* Medium content: This is content for people who are already interested 
in your product or related products. It's time for people to get to know 
your product and all the benefits you can offer them; Send them a brochure, 
a page about the advantages of your product, an invitation to subscribe 
to your newsletter, a discount, etc. The increase in leadscore for clicking 
such content can be a little higher.
* Heavy content: At this stage the customer is very interested. Now is the 
time to persuade the lead. Don't be afraid to get personal; Call them, send 
them an invitation for a meeting/congress, offer them a training session or 
send them an enticing discount/offer. The leadscore for this information is 
high.

Think about how to divide your content into these categories and don't forget 
to prepare e-mail templates to use in the campaign.

### Keeping track of engagement

You can keep track of the interest of your users by saving profile information 
about the content they have clicked or by keeping track of a leadscore. 
After creating the fields you should add follow-ups to all content links 
in your templates. 

If you are saving which content users have clicked you 
can consult the [tutorial on profile enrichment](./campaign-tutorial-profile-enrichment). 
If you use a leadscore you can increase its value with a Javascript execution 
box in the advanced mode of the editor. Use the following code:

```Javascript
// add 1 to the score in the profile if a leadscore already exists
if (profile.fields.leadscore) profile.fields.leadscore + = 1;

// set the leadscore to 1 if it wasn't defined yet
else profile.fields.leadscore = 1;
```

## Building the lead nurturing campaign

If you are sure the content is set up correctly and that the information 
you gain is saved to the profile it's time to create the follow-up. 
The basic structure of the follow-up looks like this:

- Send some information (Send email box) with an 'email delivery' link to 
- Give the user some time to explore the content (Delay box) with a link to
- Evaluate the response and handle the outcome (Check destination box)

In the last step you can check whether the lead clicked the link you sent 
or if the leadscore is high enough, for example. Then you have to decide what to do; 
Leave the customer alone, send more information, update the profile, etc. If a 
customer is not responding (as much as you'd like them to) you can choose 
to leave them alone, to avoid the risk of being marked as spam. If you 
choose to send more information you should go through the steps above again. 

The key to a successful campaign is to determine how interested your leads 
are and tailor your content according to their interest.

## Example

This is an example of a lead nurturing campaign made in Copernica's follow-up 
editor.

## More information

* [Follow-ups](./follow-up-manager-ms)
* [Campaign Tutorial: Profile enrichment](./campaign-tutorial-profile-enrichment)
