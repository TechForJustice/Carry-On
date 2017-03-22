=== Buttons With Style ===
Tags: button, button generator, button shortcode, buttons with icon, iocnic button, icon with button, icon button, buttons, CSS button generator, responsive buttons
Contributors: wponlinesupport, anoopranawat 
Requires at least: 3.1
Tested up to: 4.7.2
Author URI: http://wponlinesupport.com
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

WordPress Buttons Generator: Lets you build custom buttons with Foundation Icon Fonts, 5 class of buttons, 3 type and 3 styles with simple shortcode.

== Description ==
Button lets you build custom buttons with Foundation Icon Fonts, 5 class of buttons, 3 type and 3 styles. Perfect for hyperlinks, downloads, promotions, or redirects. plugin allows you add, manage and display buttons on your WordPress website.

View [DEMO](https://www.wponlinesupport.com/wp-plugin/buttons-with-style/) for more details.

View [PRO DEMO and Features](https://www.wponlinesupport.com/wp-plugin/buttons-with-style/) for additional information.

Now you can also Display Buttons With Style.

= Features =
* Use Foundation Icon Fonts with button.
* Use 5 class of buttons ie success, primary, secondary, info, alert.
* Use 3 types of buttons style ie  radius, square, round
* Use 3 styes ie shadow, plane, border.

= Here is the example =
<code>
type
[bws_button link="http://www.goggle.com" type="radius"]
class
[bws_button name="Submit" class="success"]
style
[bws_button name="Send" style="shadow"]
target
[bws_button name="YOUR BUTTON NAME" target="blank"]
</code>

= Shortcode parameters are =
* **link** : <code>[bws_button link="http://www.goggle.com"]</code> (ie button link parameter)
* **name** : <code>[bws_button name="button-name"]</code> (ie name of button ie Submit OR Send etc)
* **type** : <code>[bws_button type="radius"]</code> (ie type can be used radius, square, round)
* **class** :<code>[bws_button class="success"]</code> (ie class can be used  success, primary, secondary, info, alert)
* **style** :<code>[bws_button style="shadow"]</code> (ie style can be used  shadow, plane, border ie all)
* **target** : <code>[bws_button target="blank"]</code> (ie target can be used  blank, self )
* **size** : <code>[bws_button size="tiny"]</code> (ie button size tiny, small, largem, expand)
* **icon_class** : <code>[bws_button icon_class="star"]</code> (ie add the icon class. Here is link for all [Foundation Icon Fonts](http://zurb.com/playground/foundation-icon-fonts-3) )
* **icon_size** : <code>[bws_button icon_size="medium"] </code> (ie set the icon size. Values are large, medium and small)

= Complete shortcode with all parameters =

<code>[bws_button name="button-name" type="square" link="http://www.goggle.com" class="success" style="shadow" target="blank" icon_class="star" icon_size="medium"]</code>

= PRO Features : =
> <strong>Premium Version</strong><br>
>
> * Added 2 shortcodes for Simple button and Group button.
> <code>[bws_button] and [bws_group_button]</code>
> * 20+ Predefined designs.
> * Simple Button.
> * Group Button.
> * Material Design Button.
> * Button with icon.
> * Control button size, button icon size, button style and etc.
> * Easy user interface for button.
> * Custom CSS option.
> * Light weight and Fast.
> * 100% Multilanguage.
> * Template code :
> <code><?php echo do_shortcode('[bws_button]'); ?></code> 
> <code><?php echo do_shortcode('[bws_group_button]'); ?></code>
>
> View [PRO DEMO and Features](https://www.wponlinesupport.com/wp-plugin/buttons-with-style/) for additional information.
>

== Installation ==

1. Upload the 'buttons-with-style' folder to the '/wp-content/plugins/' directory.
2. Activate the "Buttons With Style" list plugin through the 'Plugins' menu in WordPress.
3. Add this short code where you want to display button
<code>[bws_button]</code>

= Complete shortcode with all parameters =

<code>[bws_button name="button-name" type="square" link="http://www.goggle.com" class="success" style="shadow" target="blank" icon_class="star" icon_size="medium"]</code>

== Screenshots ==

1. Simple Buttons.
2. Button with Icons.


== Changelog ==

= 1.0.3 =
* [+] Added Icon class so that user can display button with icon.
* [+] Added new icon_class paramater.
* [+] Added new icon_size paramater.
* [+] Added how it work tab.

= 1.0.2 =
* [*] Removed unnecessary string being disply at button.

= 1.0.1 =
* Changed plugin shortcode from 'button' to 'bws_button' to avoid conflict with some theme.

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 1.0.3 =
* [+] Added Icon class so that user can display button with icon.
* [+] Added new icon-class paramater.
* [+] Added new icon-size paramater.
* [+] Added how it work tab.

= 1.0.2 =
* [*] Removed unnecessary string being disply at button.

= 1.0.1 =
* Changed plugin shortcode from 'button' to 'bws_button' to avoid conflict with some theme.

= 1.0 =
* Initial release.