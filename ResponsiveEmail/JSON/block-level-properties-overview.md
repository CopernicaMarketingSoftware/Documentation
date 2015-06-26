#Block level properties overview

On this page we've collected all properties available on block level, including the blocks itself.

All properties described on this page exist inside the toplevel property `content`

| Block types |
| --- |
| Property | Type | Description |
| [columns](copernica-docs:ResponsiveEmail/json/block-columns) | _array with objects_ | Add columns to your email layout |
| [text](copernica-docs:ResponsiveEmail/json/block-text) | _mixed_ | Add text block to your design |
| [image](copernica-docs:ResponsiveEmail/json/block-image) | _mixed_ | Add image block to your design |
| [button](copernica-docs:ResponsiveEmail/json/block-button) | _mixed_ | Block that represents a single button |
| [seperator](copernica-docs:ResponsiveEmail/json/block-seperator) | _mixed_ | BLock that represents a horizontal rule (HR) |
| [spacer](copernica-docs:ResponsiveEmail/json/block-spacer) | _mixed_ | Add whitespace between blocks |
| [link](copernica-docs:ResponsiveEmail/json/block-link) | _mixed_ | Block that represents a single hyperlink |

### Block level common properties 

#### The common properties are available for all block types. 

| Block level common properties |
| --- |
| Property | Type | Description |
| type | _string_ | Identifier of the block type e.g., "button" for a button block. |
| [background](copernica-docs:ResponsiveEmail/json/block-level-content-and-style-properties#background) | _object_ | Lets you specify background related properties for the block. |
| [margin](copernica-docs:ResponsiveEmail/json/block-level-content-and-style-properties#margin) | mixed | Specify cellpadding for the block element |
| [container](copernica-docs:ResponsiveEmail/json/property-container) | _object_ | Allows you to add custom css and html attributes for the containing element. |
| [css](copernica-docs:ResponsiveEmail/json/property-css) | _object_ | Add custom CSS to the block |
| [attributes](copernica-docs:ResponsiveEmail/json/property-attributes) | _object_ | Add custom HTML attributes to the block |
| [visibility](copernica-docs:ResponsiveEmail/json/property-visibility) | _object_ | Show or hide blocks based on device, client and/or subscriber data |