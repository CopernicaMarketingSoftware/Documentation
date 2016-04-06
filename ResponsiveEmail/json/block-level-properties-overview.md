#Block level properties overview

On this page we've collected all properties available on block level, including 
the blocks itself.

All properties described on this page exist inside the toplevel property `content`

## Block types

| Property | Type | Description                                                                                             |
|:---------|------|---------------------------------------------------------------------------------------------------------|
| [columns](json/block-columns) | _array with objects_ | Add columns to your email layout    |
| [text](json/block-text) | _mixed_ | Add text block to your design                          |
| [image](json/block-image) | _mixed_ | Add image block to your design                       |
| [button](json/block-button) | _mixed_ | Block that represents a single button              |
| [seperator](json/block-seperator) | _mixed_ | BLock that represents a horizontal rule (HR) |
| [spacer](json/block-spacer) | _mixed_ | Add whitespace between blocks                      |
| [link](json/block-link) | _mixed_ | Block that represents a single hyperlink               |

## Block level common properties 

| Property | Type | Description                                                                                                                                                    |
|:---------|------|----------------------------------------------------------------------------------------------------------------------------------------------------------------|
| type | _string_ | Identifier of the block type e.g., "button" for a button block.                                                                                                |
| [background](json/block-level-content-and-style-properties#background) | _object_ | Lets you specify background related properties for the block. |
| [margin](json/block-level-content-and-style-properties#margin) | mixed | Specify cellpadding for the block element                                |
| [container](json/property-container) | _object_ | Allows you to add custom css and html attributes for the containing element.                    |
| [css](json/property-css) | _object_ | Add custom CSS to the block                                                                                 |
| [attributes](json/property-attributes) | _object_ | Add custom HTML attributes to the block                                                       |
| [visibility](json/property-visibility) | _object_ | Show or hide blocks based on device, client and/or subscriber data                            |
