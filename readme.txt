=== Widget Output Filters ===
Contributors:      philip.newcomer
Donate Link:       https://philipnewcomer.net/donate/
Tags:              widget, widgets, filter, filters, output, html
Requires at least: 3.0
Tested up to:      4.6
Stable tag:        1.2.0
License:           GPLv2 or later

A library which enables developers to filter the output of any WordPress widget.

== Description ==

Sometimes developers need to filter the output of a widget that does not have its own output filter built-in. This plugin provides a filter which will allow developers to filter any widget's output, regardless of whether it has that capability natively or not.

This plugin was inspired by a similar filter in the [Widget Logic](https://wordpress.org/plugins/widget-logic/) plugin, and essentially duplicates that functionality, but with more flexibility.

Usage instructions are [on GitHub](https://github.com/philipnewcomer/widget-output-filters).

This plugin is developed [on GitHub](https://github.com/philipnewcomer/widget-output-filters), and is available as a [Composer package](https://packagist.org/packages/philipnewcomer/wp-widget-output-filters).

== Installation ==

If you know what WordPress filters are, you probably know how to install a plugin. Just install and activate; there are no settings to configure. See the [usage instructions on GitHub](https://github.com/philipnewcomer/widget-output-filters).

== Changelog ==

= 1.2.0 =
* Fix infinite loop when the same widget instance is rendered twice on the same page as some page builder plugins allow
* Convert class to a singleton
* Update docs
= 1.1.0 =
* Refactor code
* Add Composer support
* Add sidebar ID as a parameter in the filter
= 1.0 =
* Initial release
