# ProductAttribute object

Product attribute is a atomic piece of data about a product. Each attribute is
identified by it's code. Each attributes has a value. Each attributes is optionally
provided with label (when it's intended to be shown to customer).

Each product is assigned with set of attributes according to attribute set. 

Attributes are also a way to describe products in store specific way. For example
when webstore is selling bicycles its products will have attributes like wheel
size or frame material, but store selling napkins will have attributes like fabric
material or size. So attributes give a way to implement some of that custom logic
inside templates.

## Attribute value

Each attribute is defined with it's own type. Type can be a text field, date, 
image, etc. Cause of that value types of attributes can be vary quite strongly.
It's advised to use simple attributes inside mailings as they don't require any
special logic.

## Default attributes

Each product by default has following attributes:

* name
* description
* short_description
* sku
* weight
* news_from_date
* news_to_date
* status
* url_key
* visibility
* country_of_manufacture
* price
* group_price
* special_price
* special_from_date
* special_to_date
* cost
* tier_price
* msrp_enabled
* msrp_display_actual_price
* msrp
* tax_class_id
* price_view
* meta_title
* meta_keyword
* meta_description
* image
* small_image
* thumbnail
* media_gallery
* gallery
* is_recurring
* recurring_profile
* custom_design
* custom_design_from
* custom_design_to
* custom_layout_update
* page_layout
* options_container
* gift_message_available

## Personalization properties

The following properties are available for personalization in the `ProdcutAttribute` object

| Property name   | Property type | Description                                                                           |
|-----------------|---------------|---------------------------------------------------------------------------------------|
| code            | _string_      | The unique code of attribute.                                                         |
| label           | _string_      | If attribute is intended to be shown in frontend it will contain user friendly label. |
| value           | _mixed_       | The value of attribute. Type depends on attribute.                                    |
