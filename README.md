# Widget Output Filters
*Enables developers to filter the output of any WordPress widget.*

Sometimes developers need to filter the output of a widget that does not have its own output filter built-in. This plugin provides a filter which will allow developers to filter any widget's output, regardless of whether it has that capability natively or not.

This plugin was inspired by a similar filter in the [Widget Logic](https://wordpress.org/plugins/widget-logic/) plugin, and essentially duplicates that functionality, but with more flexibility.

## Usage

This plugin provides a `widget_output` filter, which will be passed four parameters:

1. The complete HTML output of the widget
2. The widget type, or *base* ID; i.e. `meta` or `recent-posts`
3. The full widget ID; i.e. `meta-2` or `recent-posts-5`
4. The ID of the current sidebar; i.e. `sidebar-1`

### Example

```php
function filter_widgets( $widget_output, $widget_type, $widget_id, $sidebar_id ) {

	if ( 'my_widget' == $widget_type ) {
		$widget_output = str_replace( 'something-to-find', 'something-to-replace', $widget_output );
	}

	return $widget_output;
}
add_filter( 'widget_output', 'filter_widgets', 10, 4 );
```

## FAQ

**Can't I just use output buffering in my sidebar.php template file, and modify widget output there?**  
Yes, but that method does not work in the WordPress Theme Customizer, or with widgets used in locations other than your output-buffered widget area. It also requires that widget area output buffering be built into the theme, and does not provide an easy way to target only one specific widget or widget type. This plugin provides widget type and widget ID parameters to your filter function, it works in the Theme Customizer, and does not require any support from the theme.

**How is this plugin better than the widget_content filter already existing in the Widget Logic plugin?**  
This plugin provides the widget type (or *base* ID) in its filter, in addition to the unique widget ID. This makes it possible to target all widgets of a specific type, without resorting to complicated [regular expressions](http://en.wikipedia.org/wiki/Regular_expression). This plugin also provides the ID of the sidebar that the current widget is in, allowing you to target only widgets in a specific sidebar. With the Widget Logic filter, a developer has access only to the individual widget ID in his filter function, making it harder to target all widgets of a specific type, or widgets in a specific sidebar.

**If I am already using the Widget Logic plugin to control the visibility of my widgets, is this plugin compatible with Widget Logic's widget_content filter?**  
Yes, this plugin coexists nicely with the Widget Logic plugin. However, if you are already using Widget Logic to manage the visibility of your widgets, the only reason you would need to use this plugin would be if you require the additional flexibility that this plugin provides. Otherwise Widget Logic's `widget_content` filter will do the job just as well.
