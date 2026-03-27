# Mantix WordPress Landing Theme

Production-ready custom WordPress theme for the Mantix SaaS landing page.

## Path

`wp-content/themes/mantix`

## What is included

- Custom WordPress theme architecture (no page-builder dependency)
- Full landing page in `front-page.php`
- Reusable section template parts under `template-parts/sections/`
- Theme Customizer controls for brand, hero, CTAs, contact, footer, and SEO
- Native admin-managed content types for Features, Testimonials, Pricing Plans, and FAQs
- "Mantix Homepage Content" admin hub for section-by-section editing links
- Sticky transparent-to-solid header
- Mobile navigation, smooth scrolling, FAQ accordion, counter animation
- Native lead form handler (`admin-post.php`) + optional Contact Form 7 shortcode support
- SEO-ready structure + Schema.org `SoftwareApplication` JSON-LD
- Responsive layout and accessible interaction states

## File overview

- `style.css` Theme metadata
- `functions.php` Bootstrap loader
- `theme.json` Gutenberg/editor settings
- `front-page.php` Landing page section sequence
- `header.php` Announcement + navbar + CTAs
- `footer.php` Footer content + menus
- `inc/defaults.php` Default copy and fallback datasets
- `inc/customizer.php` Customizer settings/controls
- `inc/admin-content.php` Content types, meta boxes, admin hub, and section data getters
- `inc/form-handler.php` Lead form processing and email sending
- `inc/seo.php` Meta tags + dynamic color variables
- `assets/css/main.css` Main responsive design system
- `assets/js/main.js` Interactions and subtle animations
- `assets/css/editor.css` Block editor typography alignment
- `template-parts/sections/*.php` Modular landing sections

## Installation

1. Install WordPress (latest stable) on your server.
2. Copy the `mantix` folder into `wp-content/themes/`.
3. In WordPress Admin, go to `Appearance > Themes` and activate `Mantix Landing`.
4. Create a page named `Home`.
5. Go to `Settings > Reading`:
   - `Your homepage displays`: `A static page`
   - `Homepage`: select `Home`
6. Go to `Appearance > Menus`:
   - Create `Primary Menu` with links to `#home`, `#features`, `#solutions`, `#pricing`, `#testimonials`, `#faq`, `#contact`
   - Create `Footer Menu` with your preferred footer links
7. Configure `Settings > General > Administration Email` (lead form emails are sent there).

## Quick Admin Guide

Go to `Appearance > Mantix Homepage Content` first. This page links each editable section.

### Edit homepage sections

- **Brand, Hero, CTAs, Contact, Footer, SEO**:
  - `Appearance > Customize > Mantix Landing Settings`
- **Features**:
  - `Features` menu in admin
  - Add/edit items using title + excerpt + icon slug field
- **Testimonials**:
  - `Testimonials` menu
  - Add/edit name (title), quote (content), role/company/rating fields
- **Pricing**:
  - `Pricing Plans` menu
  - Add/edit plan title, excerpt description, price/period, features list, button, most-popular toggle
- **FAQ**:
  - `FAQs` menu
  - Question = title, answer = content

Use the **Order** field on each item to control display sequence.

### Advanced fallback data

If needed, JSON fallback fields remain in:
- `Appearance > Customize > Mantix Landing Settings > Advanced Fallback Data`

These are mainly for Showcase, Benefits, Use Cases, Stats, and Social links.

## Lead form behavior

- Native form posts to `admin-post.php`
- Required fields: Name, Email, Message
- Sends email to WordPress admin email
- Redirects back to `#contact` with success/error message

## Performance notes

- Minimal JS (no frameworks)
- No heavy builders or third-party dependencies
- CSS/JS versioned via file modification time for cache busting
- Semantic HTML and responsive-first layout

## Recommended next improvements

1. Add real product screenshots to replace visual placeholders.
2. Add multilingual support (`.pot` generation + translations).
3. Integrate analytics and conversion tracking events.
4. Add dedicated legal pages and OG image assets.