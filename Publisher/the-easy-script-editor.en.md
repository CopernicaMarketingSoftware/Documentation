Copernica allows you to create conditions for template image and text
blocks, as well as for follow-up actions and web forms.

For simple true/false conditions you can use the easy script editor. For
most users, this tool offers sufficient capabilities.

With this editor you can compare data of the (sub)profile with any value
that you specify. When the condition evaluates to 'true', the linked
action will be executed. To be more specific, this can be executing or
triggering out the follow-up action, or displaying a specific image or
other content in your newsletter.
![](Documentation/eenvoudigeeditor.png)

### Using the easy script editor

The easy script editor can be found at the component for which you want
to set the condition. \

The script editor for **image and text block conditions**in your email
document or web page, is located in the tab **Conditions**at the block
itself (make sure you're in **Edit mode**and then click on a block****
to edit its content and settings).

For **follow-up actions**you will find the editor in the final step of
the follow-up action configuration settings dialog. [More info on
conditions for follow
ups](https://www.copernica.com/en/support/conditions-for-follow-ups).

The behaviour of your **Content webforms**can also be extended with
conditionial statements. You will find the editor for web form
conditions in the **Edit profiles**tab of the *Content* web form.

**Making the condition**

First select the field in your database or collection to which you want
to link the condition. Then indicate in what way the values should be
compared (equal to, not equal to, etc.). Finally, you specify the value
to which the value in the database or collection should be compared to.

### Comparison mode

-   Use **AND** if all conditions must meet
-   Use **OR** if at least one of the set conditions must meet

### Example

In the following example, an image is shown only to women from Amsterdam

**Gender **[is equal to ] **woman**

> **-AND-**

**City **[is equal to] **Amsterdam**

### Smarty code and the easy (Java)script editor

The simple script editor is built with Javascript, use of Smarty code is
therefor not possible in these type of conditions.
