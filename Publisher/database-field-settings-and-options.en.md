When adding a field to your database, there are several checkbox options
displayed. These mainly refer to the overview on your data.

So see an overview of the available field types, [go
here](https://www.copernica.com/en/support/database-and-collection-field-types)

![EN\_databasefields.png](Documentation/field-properties-dialog.png)

### **This field is a hidden field that will not show when editing profiles**

-   Hidden fields are not visible in the Edit profiles dialog.
-   Hidden fields cannot be edited from the profile overview page.

Use this option for passwords fields or fields which should only be
editable by profiles (via webforms).

**Note:** this option doesn’t affect the field visibility in web forms.
This can be set separately in the Edit webform fields dialog under
Content.

**Note 2:** As with normal fields, a hidden field can be included when
importing and exporting data.

### **Show this field on overview pages**

Checking the '**show on overview pages**' box will make the field
visible in the profile window. So if you select a profile, you can
already see this value. It is most commonly used for quick access to
data such as e-mail addresses and mobile numbers and of course the
contact name.

### **This field is ordered by default**

'**Ordered by default**' can be set for only one field per database and
per collection. It defines in which order profiles are shown, and will
list alphabetically.

### **This field is indexed**

Use this option for fields you frequently use for searching profiles.
Indexing these fields speed up the searching. You can index up to 64
fields. Fields with type Big field cannot be indexed.
