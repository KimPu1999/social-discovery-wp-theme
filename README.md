# Social Discovery

Professional classic WordPress theme foundation for a community site. Requires no third-party plugin for activation. BuddyPress and Elementor are optional integrations; BuddyPress is used as the source of truth when active.

## Theme structure

- `functions.php` — setup, assets, Customizer, plugin-safe helpers.
- `front-page.php` — responsive logged-out landing page with working WordPress links.
- `header.php`, `footer.php` — responsive navigation and fallbacks.
- `theme.json`, `style.css`, `assets/js/theme.js` — design system, editor settings, dark mode, mobile drawer.
- `companion-plugin/social-discovery-core/` — installable-source foundation for persistent discovery and moderation data.

## Dependencies

WordPress 6.0+, PHP 7.4+. BuddyPress is optional and should be installed separately when social features are needed. Elementor is optional. No core files are modified.

## Honest implementation status

The theme foundation, landing page, responsive design system, Customizer controls, dark mode, accessible navigation, and plugin-safe fallbacks are implemented. BuddyPress-specific directories, messaging, notifications, moderation workflows, and recommendation queries need to be connected against an actual BuddyPress environment before being marked complete.
