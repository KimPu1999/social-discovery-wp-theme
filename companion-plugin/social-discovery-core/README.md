# Social Discovery Core

Optional companion plugin for persistent member functionality. It is not installed automatically by the theme.

## Responsibilities

- Secure native WordPress registration, login, password recovery, and reset handlers.
- Onboarding state and resume support.
- Controlled interest preferences stored as user metadata.
- Profile field updates with BuddyPress Extended Profile integration when available.
- Profile visibility metadata and authorization checks.
- Rate limiting for registration, login, and password-recovery requests.
- Community Moderator role and private report foundation.
- BuddyPress activity actions, favorites, comments, connections, saved activity references, and public member recommendations.

## Installation

Copy this directory to `wp-content/plugins/social-discovery-core` only when plugin installation has been authorized, then activate it from WordPress admin. Existing users and passwords are preserved.

## BuddyPress behavior

The plugin never replaces BuddyPress authentication, member, activity, messaging, or profile storage. When BuddyPress is active, supported Extended Profile fields are updated through BuddyPress APIs and activation availability is detected. Avatar and cover-image uploads remain governed by BuddyPress-supported UI and permissions.

## Email activation

This plugin does not claim email delivery is configured. If BuddyPress activation is enabled, the theme displays the activation guidance and defers to BuddyPress. Verify WordPress mail delivery or an approved SMTP setup before requiring email activation in production.

## Security

Handlers use WordPress nonces, capability/ownership checks, native password APIs, safe redirects, bounded inputs, and transient rate limits. Passwords and reset keys are never logged or stored by the plugin. Reset links use WordPress reset-key validation and expiration.

## Phase 04 social API

When BuddyPress is active, the plugin registers nonce-protected REST routes under `/wp-json/social-discovery/v1/` for creating public activity, comments, favorites, saving activity references, connections, and bounded recommendations. The routes return errors when BuddyPress or the relevant component is unavailable; they do not create parallel activity or friendship storage.

Saved activities store only activity IDs in per-user metadata. Each save/read action rechecks activity availability through BuddyPress. Recommendations use explicitly selected public interests only, exclude the current user, and use stable shared-interest ordering.
