![ClassicPress logo](https://github.com/ClassicPress/ClassicPress/raw/develop/src/wp-admin/images/classicpress-logo.png)
**ClassicPress: The CMS for Creators. Stable. Lightweight. Instantly Familiar.**

ClassicPress is a community-led open source content management system for creators. It is a fork of WordPress 6.2 that preserves the TinyMCE classic editor as the default option. It is half the size of WordPress, contains less bloat improving performance, and has no block editor (Gutenberg/Full Site Editing).

For more information, see:

- [The official ClassicPress website ›](https://www.classicpress.net/)
- [The ClassicPress documentation ›](https://docs.classicpress.net/)
- [The ClassicPress governance ›](https://www.classicpress.net/governance/)
- [Suggest features ›](https://github.com/ClassicPress/ClassicPress/issues/)

This is an experimental project to transform ClassicPress into a Pantheon upstream. It is not officially supported by Pantheon or ClassicPress. Use at your own risk.

## Setup

1. **Create a custom upstream**
	In your Pantheon dashboard, create a new custom upstream using the URL of this repository. Use the WordPress framework.
1. **Create a site using the ClassicPress upstream**
	When creating a new site, select the custom upstream you created in the previous step.
1. **Set up Integrated Composer** (Optional)
	ClassicPress comes with a `composer.json` file. I have used this to install and manage plugins and themes. This way, the site can receive updates from the Pantheon MU plugin, etc. and you don't need to commit plugin updates to the repository. However, site creation with a build step failed for unknown reasons. So the upstream is currently set up to have `build_step` set to `false` in the included `pantheon.yml`. To use Integrated Composer, you will want to switch this to `true`.
	
Once the ClassicPress is set up, you can install, log into, and manage it the way you would a WordPress site.

## Notes

**WordPress 6.2.x equivalent**
ClassicPress is a fork of WordPress. The current version of ClassicPress is based on WordPress 6.2. This means that any plugins that require a _later_ version of WordPress do not work in ClassicPress. If you find a WordPress plugin that requires a newer version of WordPress, you can try to find an older version of the plugin that works with WordPress 6.2 or find an alternative.

**Included plugins**
I've included several plugins in the upstream's `composer.json` file. These are plugins that are either recommended on Pantheon or part of Pantheon's default upstream. Included plugins are:

- WP Native PHP Sessions
- Pantheon Advanced Page Cache (pinned at version 1.x)
- Pantheon MU Plugin
- SVG Support (for SVG uploads)

**Composer configuration**
The base `composer.json` builds on ClassicPress's basic `composer.json` file by also adding `composer/installers` and the `wpackagist` repository. It also adds configuration for the proper installation paths for WordPress plugins, themes and mu-plugins.

**Object Cache Pro on Pantheon**
The standard Object Cache Pro installation workflow for Pantheon does not work for ClassicPress. However, the [Composer-based installation](https://docs.pantheon.io/object-cache/wordpress#installation-and-configuration-for-composer-managed-wordpress-sites) _does_ work with the exception of the configuration file (ClassicPress uses `wp-config.php` rather than Bedrock's `config/application.php`) and the `define()` function (vs. Bedrock's `Config::define()`). This is likely due to ClassicPress being a hybrid of Composer and non-Composer and the fact that the image that is used to run the Object Cache Pro installation commands do not have Composer or run `composer install`.