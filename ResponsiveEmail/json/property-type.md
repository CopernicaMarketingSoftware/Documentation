# Property `type`

The `type` property is a nested string property that is required for each
block inside a [`blocks`](ResponsiveEmail/json/property-blocks) array.
It is used to identify the type of block.

The following block types are supported:

# Block types

| Value | Desc.                                                                                    |
|:------|------------------------------------------------------------------------------------------|
| ["heading"](ResponsiveEmail/json/block-heading) | Heading block ("h1", "h2", etc) |
| ["text"](ResponsiveEmail/json/block-text) | Text block                            |
| ["html"](ResponsiveEmail/json/block-html) | HTML block                            |
| ["image"](ResponsiveEmail/json/block-image) | Image block                         |
| ["video"](ResponsiveEmail/json/block-video) | Video block                         |
| ["button"](ResponsiveEmail/json/block-button) | Button block                      |
| ["link"](ResponsiveEmail/json/block-link) | Hyperlink                             |
| ["spacer"](ResponsiveEmail/json/block-spacer) | Vertical space                    |
| ["separator"](ResponsiveEmail/json/block-separator) | Seperation line             |
| ["columns"](ResponsiveEmail/json/block-columns) | Split in columns                |
