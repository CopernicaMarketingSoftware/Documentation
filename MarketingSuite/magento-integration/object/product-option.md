# ProductOption object

Product option is one of custom options that can be set inside product. Custom
option enables seller to predefine an option that buyer can fill up to customize
his product. There might be more than one custom option predefined on one product.

Custom options can be marked as required. That means customer will have to fill 
that option before he can add the product into his basket.

## Types

Each custom option has a type of input that it can hold. Sellers can choose from
following list when defining custom option:

| Type            | Identifier    | Description                                      |
|-----------------|---------------|--------------------------------------------------|
| Text field      | 'field'       | Simple input text.                               |
| Text area       | 'area'        | Multiline text area.                             |
| File            | 'file'        | File input with an upload form in the front-end. |
| Drop down       | 'drop_down'   | Drop down list with predefined values.           |
| Radio buttons   | 'radio'       | A set of radio buttons.                          |
| Checkbox        | 'checkbox'    | Multiple selectable checkbox options.            |
| Multiple select | 'multiselect' | List of multiple selectable options.             |
| Date            | 'date'        | Date input field.                                |
| Date & Time     | 'date_time'   | Date and time input field.                       |
| Time            | 'time'        | Time only field.                                 |

Inside smarty code it's possible to detect option type by referencing `type` 
property. 

## Personalization properties

The ProductOption object holds the following properties  

| Property name   | Property type                    | Description                                                                              |
|-----------------|----------------------------------|------------------------------------------------------------------------------------------|
| product         | _[Product][product-object]_      | The product that option is assigned to.                                                  |
| title           | _string_                         | The title of the option.                                                                 |
| type            | _string_                         | The type of the option.                                                                  |
| required        | _boolean_                        | Is option required?                                                                      |
| maxCharacters   | _int_                            | Max allowed characters. This property applies to text types.                             |
| values          | _mixed_                          | Depending on the type this value can vary. @todo describe                                |
| imageSizeY      | _int_                            | Max height of image. It's applicable for file options only.                              |
| imageSizeX      | _int_                            | Max width of image. It's applicable for file option only.                                |
| fileExtension   | _collection of string_           | Collection of allowed file types for this option. It's applicable for file options only. |

[product-object]: copernica-docs:MarketingSuite/magento-integration/object/product
