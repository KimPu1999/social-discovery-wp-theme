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

## Phase 03 member experience

- Native WordPress login, registration, password recovery, and reset templates.
- Registration respects `users_can_register` and uses the companion plugin only for the secure custom form handler.
- Multi-step onboarding for account preparation, profile information, avatar guidance, interests, privacy, and completion.
- Member profile and account-settings templates with ownership checks.
- BuddyPress-safe avatar, activity, profile-field, and activation detection.
- Profile visibility options are enforced by Social Discovery Core for public, members-only, and private profiles.
- Header account navigation shows profile, settings, and logout actions for authenticated members.

## Authentication setup

Create pages using the Login, Register, Forgot Password, Reset Password, Onboarding, Member Profile, and Account Settings templates. Enable registration in Settings → General only when the site is ready to accept accounts. When Social Discovery Core is inactive, the theme falls back to native WordPress login and recovery links.

The companion plugin owns onboarding state, interest preferences, profile privacy, rate limits, form handlers, and profile updates. BuddyPress remains the source of truth for extended profiles, avatars, cover images, groups, activity, and activation when installed. Email delivery is not claimed as configured; verify `wp_mail()` or SMTP separately.

## Phase 04 social features

- Social Feed, Discover People, and Member Directory page templates.
- BuddyPress-backed public activity feed, favorites, comments, feed filters, and text composer when BuddyPress is active.
- BuddyPress Friends connection controls when the Friends component is active.
- Bounded member search, sorting, public interest filtering, and deterministic shared-interest recommendations.
- Companion-plugin saved activity references using user metadata; saved content is rechecked against activity visibility.
- REST API routes are protected by logged-in checks, WordPress REST nonces, rate limits, and BuddyPress availability checks.

Create pages using the Social Feed, Discover People, or Member Directory templates. If BuddyPress is not active, the pages show an honest unavailable/empty state instead of fake social content.

## Phase 05 communities and messaging

Create pages using the Communities, My Communities, and Messages templates. Enable BuddyPress Groups and Private Messaging to activate the corresponding features. Community directory and group-detail layouts use BuddyPress data, while hidden groups and private activity remain guarded by server-side checks.

Private conversations use BuddyPress message threads only. The companion plugin validates thread participation, recipient permissions, REST nonces, and rate limits before sending or changing message state. Real-time messaging, global message deletion, and blocking enforcement are not claimed unless the active platform provides those capabilities.

## Menus and Elementor

The theme registers Primary, Secondary, Footer, and Mobile locations. Native templates are always available. Elementor Pro theme locations are registered through the supported Elementor API when Elementor is active, and the theme avoids rendering a native header or footer when Elementor supplies one.

## Known limitations

Live activation, Customizer persistence, Elementor rendering, browser responsiveness, and BuddyPress-specific pages require a running WordPress environment. BuddyPress member, activity, group, messaging, notification, and recommendation features are intentionally deferred to later phases.
