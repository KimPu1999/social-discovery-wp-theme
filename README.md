# Social Discovery

Social Discovery is a classic WordPress theme foundation for a professional community site.

## Requirements

- WordPress 6.0 or newer.
- PHP 7.4 or newer.
- BuddyPress is optional and not required to activate the theme.
- Elementor Free is optional. Elementor Pro Theme Builder can replace native header/footer locations when its display conditions apply.

## Installation

1. Place this directory in `wp-content/themes/social-discovery`.
2. Activate Social Discovery from Appearance → Themes.
3. Set a site logo under Appearance → Customize → Site Identity.
4. Assign Primary, Secondary, Footer, and Mobile menus under Appearance → Menus.
5. Configure Appearance → Customize → Social Discovery.

## Phase 01 features

- Modular classic-theme setup and translation-ready templates.
- CSS custom-property design system with blue, purple, cyan, light, dark, and system modes.
- Default, centered, and minimal header layouts.
- Default, centered, and minimal footer layouts.
- Customizer controls for header, footer, design, colors, spacing, CTA, sticky behavior, and social URLs.
- Accessible responsive navigation with nested menu support, mobile drawer, overlay, Escape handling, and focus restoration.
- Blog, page, archive, search, comments, 404, and page-template foundations.
- Gutenberg wide alignment, responsive embeds, custom logo, featured images, and HTML5 support.
- BuddyPress-safe compatibility foundation without duplicating social business logic.

## Menus and Elementor

The theme registers Primary, Secondary, Footer, and Mobile locations. Native templates are always available. Elementor Pro theme locations are registered through the supported Elementor API when Elementor is active, and the theme avoids rendering a native header or footer when Elementor supplies one.

## Known limitations

Live activation, Customizer persistence, Elementor rendering, browser responsiveness, and BuddyPress-specific pages require a running WordPress environment. BuddyPress member, activity, group, messaging, notification, and recommendation features are intentionally deferred to later phases.
