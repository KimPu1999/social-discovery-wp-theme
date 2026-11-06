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

## Phase 02 homepage builder

- Native homepage section renderer with allowlisted section ordering.
- Configurable Hero, Featured Communities, Discover People, Explore Interests, Public Discussions, How It Works, Benefits, Guidelines, Latest Articles, Join CTA, FAQ, and Contact CTA sections.
- Native WordPress content mode for Elementor-built assigned homepage content.
- BuddyPress-safe groups, public members, and public activity sources when BuddyPress is active.
- WordPress posts, categories, tags, page selectors, hero media, CTA URLs, and FAQ controls through Appearance → Customize → Social Discovery Homepage.
- Elementor Full Width, Elementor Canvas-compatible page templates, and native fallback templates.

## Homepage setup

Use Settings → Reading to assign a static front page. The default homepage mode renders native Social Discovery sections. Set Homepage Rendering Mode to “Assigned page content” when the assigned page is built with Elementor or Gutenberg and should render through `the_content()` instead.

Dynamic sections never fabricate members, groups, activity, interests, or articles. They hide cleanly when no public source is available. Public WordPress categories and tags are used for Explore Interests until a future companion-plugin interest source is available.

Recommended images: hero images around 1200×800px; article card images around 640×420px.

## Menus and Elementor

The theme registers Primary, Secondary, Footer, and Mobile locations. Native templates are always available. Elementor Pro theme locations are registered through the supported Elementor API when Elementor is active, and the theme avoids rendering a native header or footer when Elementor supplies one.

## Known limitations

Live activation, Customizer persistence, Elementor rendering, browser responsiveness, and BuddyPress-specific pages require a running WordPress environment. BuddyPress member, activity, group, messaging, notification, and recommendation features are intentionally deferred to later phases.
