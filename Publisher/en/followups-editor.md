# Follow up editor

Follow up editor is a new tool that allows creating follow up actions inside our
drag and drop editor.  This tool works by connecting boxes together with links.
Each box represents a single action (check profile, update profile, send email,
etc).

Each box can have links coming in and coming out. Coming in, are links that
connect from the top. Coming out, are links that connect from the bottom.

Follow up action starts from a **trigger box**. Trigger box has an orange background,
and usually, it's automatically added to the follow up. Currently only *link
click* trigger box is available.

Beside trigger boxes, there are a couple of other types of boxes: decisions,
actions, and delays.

**Decision box** has a blue background and it's a box that allows choosing a path.
Links connected from a decision box have labels that tell what kind of output is
expected to proceed with this link.

**Action box** has a green background and it's a box that takes a direct action
(modifies a profile, sends an email, etc). After action box is processed all
other boxes connected to action box will be processed.

**Delay box** has a pink background and it's a box that will hold execution of
a follow up for specified amount of time.

## Advanced boxes

When required functionality is not available out of the box, you can scripting
boxes: **decision** and **action**. These boxes take a JavsScript script and
execute it. Read more about [follow ups scripting](./followups-scripting.md).
