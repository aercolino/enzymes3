=== Nzymes ===
Contributors: aercolino
Donate link: http://github.com/aercolino
Tags: inject, custom fields, attributes, post, author, php code, enzymes, nzymes
Requires at least: 4.7
Tested up to: 4.7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Boost your posts with Nzymes injections.



== Description ==


If you want to insert PHP code into posts content so safely that you can also allow trusted authors to do so themselves, then Nzymes is what you are looking for.

1. You want to add a thing to a post, but a plugin might not exist.
1. That thing is already available or can be associated to a post or author.
1. You know how to program in PHP or another trusted author can do it for you.

= Example =

When citing authors in a post, you'd like to show the number of posts they published. Maybe there is a plugin for that, maybe there is not. Anyway, how difficult would it be to code? Quite easy, actually, given that WordPress has a function to do exactly that: `count_user_posts`.

If you used Nzymes, you could cite authors like this

> As you know, {[ =john= | @my.cite(1) ]} and I are very good friends.

Which could be shown like this

> As you know, John (42 posts) and I are very good friends.

With Nzymes many things are a couple of PHP lines away.

* Why not change the style of "(42 posts)"?
* Why not add a link to John's posts?

= At a glance =

Nzymes injections are expressions like this: {[ enzyme-1 | enzyme-2 | … enzyme-N ]}

* Nzymes automatically filters title, excerpt, and content of a post looking for injections.
* For each found injection, it orderly replaces each enzyme with its value, left to right.
* Then it replaces the value of the last enzyme to the whole injection.



== Frequently Asked Questions ==


= What is an enzyme? =

1. A string or an unsigned integer.
1. A locator of an attribute or a custom field of a post or a post's author.


= What is the value of an enzyme? =

1. Its literal value.
1. The value referenced by the locator (transclusion).
1. The value returned by evaluating the code referenced by the locator (execution).


= Is Nzymes secure? =

1. Nzymes defines a rich set of capabilities and roles.
1. After activating Nzymes, only administrators have all the capabilities.
1. To allow authors to use Nzymes, administrators can assign roles to them as they see fit.

For example, to use an execution enzyme from a post of some coder into a post of some injector, first of all the coder must be able to `create_dynamic_custom_fields` then, additionally,
* either the injector and the coder are the same person
* or the injector can `use_others_custom_fields` and the coder can `share_dynamic_custom_fields`.


= Does Nzymes replaces Enzymes? =

If you currently use my [Enzymes](https://wordpress.org/plugins/enzymes/) plugin, then both can coexist in your blog. Nzymes is much easier to use and it's also much more powerful than Enzymes. Unfortunately Enzymes' enzymes (notice the different capitalization) and Nzymes' enzymes are not always compatible. Therefore, Nzymes will only process enzymes injected after its installation. See the manual for how to bend this rule.


= There is so much more to Nzymes! =

* Read the manual at http://andowebsit.es/blog/noteslog.com/nzymes/.


== Installation ==

1. Upload the plugin zip file.
1. Activate the plugin.


== Screenshots ==



== Changelog ==

= 1.0.0 =
First version of [Nzymes](https://wordpress.org/plugins/nzymes/).
