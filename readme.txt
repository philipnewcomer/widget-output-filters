=== Widget Output Filters ===
Contributors:      philip.newcomer
Donate Link:       https://philipnewcomer.net/donate/
Tags:              widget, widgets, filter, filters, output, html
Requires at least: 3.0
Tested up to:      3.9.1
Stable tag:        trunk
License:           GPLv2 or later
License URI:       http://www.gnu.org/licenses/gpl-2.0.html

Enables developers to filter the output of WordPress widgets.

== Description ==

Sometimes developers need to filter the output of a widget that does not have its own output filter built-in. This plugin provides a filter which will allow developers to modify the complete HTML output of any widget.

This plugin is inspired by a similar filter in the [Widget Logic](https://wordpress.org/plugins/widget-logic/) plugin, and is useful in cases where a developer only needs to filter a widget's output, and does not require the widget visibility functionality of Widget Logic.

This plugin also provides a filter parameter containing the widget type, or *base* ID (i.e. `meta` or `recent-posts`), in addition to the more specific widget ID parameter (`meta-2` or `recent-posts-5`). This allows developers to more easily filter all widgets of a specific type, rather than (as is the case with Widget Logic) only having the widget's own unique ID to work with, which will vary between individual widgets, widget areas, and WordPress installs.

== Installation ==

If you know what WordPress filters are, you probably know how to install a plugin. Just install and activate; there are no settings to configure. See the [usage instuctions](http://wordpress.org/plugins/widget-output-filters/other_notes/).

== Other Notes ==

This plugin provides a `widget_output` filter, with three parameters:

1. The complete HTML output of the widget
2. The widget type, or *base* ID; i.e. `meta` or `recent-posts`
3. The complete widget ID; i.e. `meta-2` or `recent-posts-5`

= Usage Example =

`function my_widget_output_filter( $widget_output, $widget_type, $widget_id ) {

	if ( 'my_widget' == $widget_type ) {
		$widget_output = str_replace( 'something-to-find', 'something-to-replace', $widget_output );
	}

	return $widget_output;

}
add_filter( 'widget_output', 'my_widget_output_filter', 10, 3 );`

== Frequently Asked Questions ==

= Can't I just use output buffering in my sidebar.php template file, and modify widget output there? =

Yes, but that method does not work in the WordPress Theme Customizer, or with widgets used in locations other than your output-buffered widget area. It also requires that widget area output buffering be built into the theme, and does not provide an easy way to target only one specific widget or widget type. This plugin provides widget type and widget ID parameters to your filter function, it works in the Theme Customizer, and does not require any support from the theme.

= How is this plugin better than the widget_content filter already existing in the Widget Logic plugin? =

This plugin provides the widget type (or *base* ID) in its filter, in addition to the unique widget ID. This makes it possible to target all widgets of a specific type, without resorting to complicated [regular expressions](http://en.wikipedia.org/wiki/Regular_expression). With the Widget Logic filter, a developer has access only to the individual widget ID in his filter function. Also, if you are using Widget Logic only for its `widget_content` filter, then this plugin will be lighter in weight than having the entire Widget Logic functionality active unnecessarily.

= If I am already using the Widget Logic plugin to control the visibility of my widgets, is this plugin compatible with Widget Logic's widget_content filter? =

Yes, this plugin coexists nicely with the Widget Logic plugin. However, if you are already using Widget Logic to manage the visibility of your widgets, the only reason you would need to use this plugin in addition to Widget Logic would be if you require the widget base ID to be available in your filter function, which Widget Logic does not provide. Otherwise Widget Logic's `widget_content` filter will do the job just as well.

== Changelog ==

= 1.0 =
* Initial release
