# Social Discovery Core

Optional companion-plugin source for durable social discovery features. Copy this directory to `wp-content/plugins/social-discovery-core` when plugin installation is authorized.

Included foundation:

- Private `sd_interest` taxonomy for structured interest terms.
- Private `sd_report` moderation records with WordPress capability checks.
- A dedicated Community Moderator role on activation.

BuddyPress remains the source of truth for members, profiles, activity, groups, messages, and notifications. Future discovery queries should use paginated WP/BuddyPress APIs and avoid private-message data.
