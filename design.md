# Design System Inspired by Polda Riau

## 1. Visual Theme & Atmosphere

The Polda Riau design system embodies a professional, authoritative government institution aesthetic grounded in trust and civic responsibility. The visual language combines a deep navy foundation with strategic gold accents, evoking stability and leadership. The design philosophy balances formal institutional requirements with accessible, modern usability patterns. Clean typography, generous whitespace, and carefully curated imagery of police operations reinforce competence and transparency. The overall atmosphere is welcoming yet commanding—designed to instill confidence in public information services while maintaining the gravitas appropriate to law enforcement communication.

**Key Characteristics**
- Deep navy and dark blue foundation conveying authority and stability
- Strategic gold/yellow accent for call-to-action and highlighting
- Clean, modern typography hierarchy for clear information hierarchy
- Institutional imagery blended with approachable UI patterns
- High contrast for accessibility and readability
- Generous spacing supporting information scanning
- Subtle shadows and elevation for depth without visual noise

## 2. Color Palette & Roles

### Primary
- **Navy Dark** (`#1A2335`): Primary background, main text container, dominant UI structure—used extensively across cards, navigation, and layout containers
- **Navy Darker** (`#0A1A3A`): Deep background accents, secondary structural elements
- **Navy Deep** (`#212529`): Alternative dark text and component backgrounds for subtle variation

### Accent Colors
- **Gold Warning** (`#F5C842`): Primary call-to-action button, warning states, search button highlight, breaking news label
- **Gold Muted** (`#FFC107`): Secondary warning indication, accent highlighting

### Interactive
- **Link Blue** (`#0D6EFD`): Primary interactive element, hyperlinks, focus states
- **Success Green** (`#198754`): Success states, confirmation messaging, positive feedback
- **Error Red** (`#DC3545`): Error states, danger messaging, negative feedback

### Neutral Scale
- **White** (`#FFFFFF`): Primary text on dark, card surfaces, high contrast foreground
- **Black** (`#000000`): Text overlay on light surfaces, strong contrast text
- **Light Gray** (`#F8F9FA`): Subtle background tint, card hover states
- **Soft Gray** (`#EDF0F6`): Light background fill, disabled states
- **Medium Gray** (`#ADB5BD`): Secondary text, metadata, borders
- **Gray Muted** (`#6C757D`): Tertiary text, help text, timestamps
- **Border Gray** (`#DEE2E6`): Input borders, subtle dividers
- **Border Soft** (`#DDE4EF`): Light input borders, card separators

### Surface & Borders
- **Light Gray Surface** (`#E9ECEF`): Secondary surface background, subtle container fill
- **Steel Blue Muted** (`#A8BBD0`): Secondary text, subheadings, soft typography contrast

## 3. Typography Rules

### Font Family
- **Primary Font:** Poppins (sans-serif) — modern, friendly, and highly legible for government communication
- **Fallback Stack:** `Poppins, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif`

### Hierarchy

| Role | Font | Size | Weight | Line Height | Letter Spacing | Notes |
|------|------|------|--------|-------------|----------------|-------|
| Display / Large Heading | Poppins | 28.8px | 700 | 34.56px | 0px | Page title, hero headline, major section heading |
| Heading Medium | Poppins | 20px | 600 | 24px | 0px | Section subheading, card title, modal heading |
| Display Accent | Poppins | 22.4px | 800 | 33.6px | 0px | Bold hero text, prominent label, breaking news |
| Body Standard | Poppins | 13.28px | 700 | 18.592px | 0px | Body text, paragraph content, news item text |
| Body Regular | Poppins | 16px | 400 | 24px | 0px | Standard paragraph, card description |
| Link / Navigation | Poppins | 20px | 400 | 30px | 0px | Primary navigation link, main menu item |
| Navigation Secondary | Poppins | 13.12px | 700 | 19.68px | 0px | Secondary nav, dropdown menu item |
| Input / Form | Poppins | 14.4px | 400 | 21.6px | 0px | Form input, search field placeholder |
| List Item | Poppins | 16px | 700 | 24px | 0px | Bullet list item, menu option |
| Caption / Meta | Poppins | 12px | 400 | 18px | 0px | Timestamp, byline, helper text (inferred) |

### Principles
- **Clarity First:** Font weights and sizes emphasize information hierarchy—larger sizes reserved for navigation and primary content
- **Reading Comfort:** Generous line heights (130–150% of font size) support scannability across news and informational content
- **Accessibility:** High contrast pairing (dark navy on white, white on navy) ensures readability for diverse users
- **Institutional Tone:** Poppins balances formality with approachability, appropriate for government communication
- **Consistent Scaling:** Font sizes follow a proportional scale, ensuring visual rhythm and predictability

## 4. Component Stylings

### Buttons

#### Primary CTA Button
- **Background:** `#F5C842`
- **Text Color:** `#000000`
- **Font Size:** `16px`
- **Font Weight:** `400`
- **Padding:** `12px 24px`
- **Border Radius:** `6px`
- **Border:** `none`
- **Box Shadow:** none
- **Hover State:** Background `#E5B830`, slight opacity 0.9
- **Active State:** Background `#D4A620`
- **Disabled State:** Background `#D4D4D4`, Text `#808080`, opacity 0.6

#### Secondary Button (Ghost / Outlined)
- **Background:** transparent
- **Text Color:** `#C8D5EC`
- **Font Size:** `13.12px`
- **Font Weight:** `700`
- **Padding:** `8px 8px`
- **Border Radius:** `0px`
- **Border:** `1px solid #C8D5EC`
- **Box Shadow:** none
- **Hover State:** Background `rgba(200, 213, 236, 0.1)`, Text `#FFFFFF`
- **Active State:** Background `rgba(200, 213, 236, 0.2)`

#### Tertiary Button (Minimal)
- **Background:** transparent
- **Text Color:** `#C8D5EC`
- **Font Size:** `13.12px`
- **Font Weight:** `700`
- **Padding:** `4px 12px`
- **Border Radius:** `0px`
- **Border:** none
- **Box Shadow:** none
- **Hover State:** Text `#FFFFFF`, opacity 1.0
- **Active State:** Text `#FFFFFF`, opacity 0.8

#### Icon Button (Navigation Header)
- **Background:** transparent
- **Text Color:** `rgba(255, 255, 255, 0.55)`
- **Font Size:** `20px`
- **Font Weight:** `400`
- **Padding:** `4px 12px`
- **Border Radius:** `6px`
- **Border:** `1px solid rgba(255, 255, 255, 0.1)`
- **Box Shadow:** none
- **Hover State:** Background `rgba(255, 255, 255, 0.1)`, Text `rgba(255, 255, 255, 0.8)`

### Cards & Containers

#### Standard White Card
- **Background:** `#FFFFFF`
- **Text Color:** `#1A2335`
- **Font Size:** `16px`
- **Font Weight:** `400`
- **Padding:** `0px`
- **Border Radius:** `16px`
- **Border:** none
- **Box Shadow:** `rgba(26, 35, 53, 0.08) 0px 2px 16px 0px`
- **Line Height:** `24px`
- **Hover State:** Box Shadow `rgba(26, 35, 53, 0.12) 0px 4px 24px 0px`

#### Dark Overlay Card (Hero / Image Overlay)
- **Background:** transparent
- **Text Color:** `#FFFFFF`
- **Font Size:** `16px`
- **Font Weight:** `400`
- **Padding:** `24px`
- **Border Radius:** `5px`
- **Border:** none
- **Box Shadow:** none
- **Line Height:** `24px`
- **Backdrop:** Dark overlay or semi-transparent dark background

#### News Item Card (Compact)
- **Background:** transparent
- **Text Color:** `#1A2335`
- **Font Size:** `16px`
- **Font Weight:** `400`
- **Padding:** `14px 16px 18px 16px`
- **Border Radius:** `0px`
- **Border:** none
- **Box Shadow:** none
- **Line Height:** `24px`

#### Section Container
- **Background:** `#F8F9FA` or transparent
- **Padding:** `20px` to `60px` (context-dependent)
- **Border Radius:** `0px` (full-width sections) or `12px` (contained sections)
- **Margin:** `24px` to `60px` vertical spacing

### Inputs & Forms

#### Search Input
- **Background:** `#FFFFFF`
- **Text Color:** `#1A2335`
- **Font Size:** `14.4px`
- **Font Weight:** `400`
- **Padding:** `10px 15px`
- **Border Radius:** `10px 0px 0px 10px` (left-side rounded for paired search button)
- **Border:** `1px solid #D4DBE8`
- **Placeholder Color:** `#ADB5BD`
- **Box Shadow:** none
- **Height:** `43.58px`
- **Focus State:** Border `#0D6EFD`, Box Shadow `0px 0px 0px 3px rgba(13, 110, 253, 0.1)`

#### Search Button (Paired)
- **Background:** `#F5C842`
- **Text Color:** `#000000`
- **Font Size:** `16px`
- **Font Weight:** `400`
- **Padding:** `10px 20px`
- **Border Radius:** `0px 10px 10px 0px` (right-side rounded)
- **Border:** none
- **Height:** `43.58px`
- **Cursor:** pointer
- **Hover State:** Background `#E5B830`

#### Form Input (Text Field)
- **Background:** `#FFFFFF`
- **Text Color:** `#1A2335`
- **Font Size:** `14.4px`
- **Font Weight:** `400`
- **Padding:** `10px 15px`
- **Border Radius:** `6px`
- **Border:** `1px solid #D4DBE8`
- **Placeholder Color:** `#ADB5BD`
- **Box Shadow:** none
- **Focus State:** Border `#0D6EFD`, Box Shadow `0px 0px 0px 3px rgba(13, 110, 253, 0.1)`
- **Error State:** Border `#DC3545`, Box Shadow `0px 0px 0px 3px rgba(220, 53, 69, 0.1)`
- **Disabled State:** Background `#F8F9FA`, Text `#6C757D`, Border `#DEE2E6`, opacity 0.6

### Navigation

#### Header Navigation Bar
- **Background:** `#1A2335`
- **Text Color:** `#FFFFFF`
- **Font Size:** `16px`
- **Font Weight:** `400`
- **Padding:** `8px 0px` (vertical)
- **Height:** `66px`
- **Box Shadow:** `rgba(0, 0, 0, 0.5) 0px 2px 20px 0px`
- **Border:** none
- **Position:** sticky or fixed (depending on implementation)

#### Navigation Link (Header)
- **Background:** transparent
- **Text Color:** `#FFFFFF`
- **Font Size:** `20px`
- **Font Weight:** `400`
- **Padding:** `5px 0px`
- **Border Radius:** `0px`
- **Border:** none
- **Height:** `50px`
- **Line Height:** `30px`
- **Hover State:** Text `#F5C842`, Background `transparent`
- **Active State:** Border Bottom `2px solid #F5C842`, Text `#F5C842`

#### Dropdown Menu Item
- **Background:** `#FFFFFF`
- **Text Color:** `#1A2335`
- **Font Size:** `13.12px`
- **Font Weight:** `700`
- **Padding:** `12px 16px`
- **Border Radius:** `0px`
- **Border:** none
- **Box Shadow:** `rgba(0, 0, 0, 0.14) 0px 10px 40px 0px`
- **Hover State:** Background `#F8F9FA`, Text `#0D6EFD`

### Badges & Labels

#### Breaking News Label
- **Background:** `#F5C842`
- **Text Color:** `#000000`
- **Font Size:** `12px`
- **Font Weight:** `700`
- **Padding:** `6px 12px`
- **Border Radius:** `4px`
- **Border:** none

#### Status Badge (Success)
- **Background:** `#198754`
- **Text Color:** `#FFFFFF`
- **Font Size:** `12px`
- **Font Weight:** `600`
- **Padding:** `6px 12px`
- **Border Radius:** `12px`
- **Border:** none

#### Status Badge (Error)
- **Background:** `#DC3545`
- **Text Color:** `#FFFFFF`
- **Font Size:** `12px`
- **Font Weight:** `600`
- **Padding:** `6px 12px`
- **Border Radius:** `12px`
- **Border:** none

## 5. Layout Principles

### Spacing System

**Base Unit:** `4px`

**Scale:**
- **2xs:** `4px` — tight micro-spacing between inline elements
- **xs:** `8px` — compact spacing for small component gaps
- **sm:** `12px` — small spacing between form labels and inputs
- **md:** `16px` — standard spacing between sections and components
- **lg:** `20px` — generous spacing within container padding
- **xl:** `24px` — large spacing between major sections
- **2xl:** `28px` — extra-large spacing for section separation
- **3xl:** `60px` — hero and full-width section spacing

**Usage Context:**
- **Margin Between Cards:** `16px` to `24px`
- **Padding Within Card:** `20px` to `28px`
- **Input Field Spacing:** `12px` (label to input), `16px` (input to input)
- **Section Vertical Spacing:** `40px` to `60px`
- **Header Padding:** `16px` horizontal, `8px` vertical

### Grid & Container

- **Max Container Width:** `1440px`
- **Full-Width Sections:** Extend to viewport edge
- **Padding on Sides:** `20px` to `40px` (mobile to desktop)
- **Grid Strategy:** 12-column CSS Grid or Flexbox with 16px gutters
- **Card Grid:** 4-column on desktop, 2-column tablet, 1-column mobile
- **News Grid:** 4 items per row (desktop), 2 items (tablet), 1 item (mobile)

### Whitespace Philosophy

Generous whitespace is a core principle supporting information hierarchy and readability. Substantial breathing room surrounds major sections, news cards, and call-to-action areas. Vertical rhythm through consistent spacing creates visual flow and guides the eye through priority content. White space between navy dark backgrounds and white card surfaces creates strong visual separation, preventing cognitive overload.

### Border Radius Scale

- **None (`0px`):** Navigation items, full-width backgrounds, overlay containers
- **Small (`5px`):** Dark overlay cards, secondary components
- **Medium (`6px`):** Buttons, input fields, small interactive elements
- **Large (`8px`):** Form links, soft-edged secondary buttons (inferred)
- **Extra Large (`10px`):** Search input paired with button (asymmetric `10px 0px 0px 10px` and `0px 10px 10px 0px`)
- **Round (`12px` to `16px`):** Standard cards, containers, prominent surfaces
- **Hero (`16px 16px 0px 0px`):** Image tops in hero cards, maintaining bottom square cut

## 6. Depth & Elevation

| Level | Treatment | Use |
|-------|-----------|-----|
| **Flat (L0)** | No shadow, `box-shadow: none` | Button text, ghost buttons, minimal overlays, hero text |
| **Lifted (L1)** | `rgba(26, 35, 53, 0.08) 0px 2px 16px 0px` | Standard white cards, content containers, subtle depth |
| **Raised (L2)** | `rgba(0, 0, 0, 0.14) 0px 10px 40px 0px` | Dropdown menus, floating panels, modal contexts |
| **Floating (L3)** | `rgba(0, 0, 0, 0.5) 0px 2px 20px 0px` | Navigation header, fixed overlays, topmost UI |

**Shadow Philosophy:**
Shadows are used sparingly to create subtle depth without visual noise. They clarify layering—distinguishing cards from backgrounds, highlighting dropdowns, and anchoring fixed navigation. Shadows strengthen as elevation increases, but remain soft and blurred rather than harsh. The shadow color respects the context: navy-based shadows on light surfaces, black shadows on overlays. This measured approach keeps the interface clean while maintaining clear spatial relationships.

## 7. Do's and Don'ts

### Do
- **Prioritize Contrast:** Always pair dark navy backgrounds with white text; use white cards with dark text for legibility
- **Use Gold Sparingly:** Reserve `#F5C842` for primary CTAs, search buttons, and breaking news—overuse dilutes impact
- **Maintain Generous Spacing:** Apply `16px` minimum between major content blocks; `24px` to `60px` for section separation
- **Respect Typography Hierarchy:** Use `28.8px` weight 700 for major headings, `16px` weight 400 for body paragraphs; never skip heading levels
- **Leverage the 12-Column Grid:** Align all content to visible or invisible grid for consistency; maintain `16px` gutters
- **Apply Shadows Deliberately:** Use L1 shadows for cards, L2 for dropdowns, L3 for fixed navigation—maintain clear elevation levels
- **Pair Input with Search Button:** Always right-align gold search button with left-rounded input (`10px 0px 0px 10px`)
- **Test Accessibility:** Ensure 4.5:1 minimum contrast ratio; use `#0D6EFD` and `#198754` for interactive feedback
- **Round Top Corners of Images:** Apply `16px 16px 0px 0px` border-radius to hero images; keep bottom edges square

### Don't
- **Don't Overuse Accent Colors:** Avoid scattering gold and blue throughout UI; reserve for interactive and warning states
- **Don't Mix Competing Shadows:** Stick to the L0–L3 shadow scale; don't create custom shadows
- **Don't Shrink Typography Below 13.12px:** Maintain minimum `13.12px` for navigation and form text; `16px` for body content
- **Don't Stack More Than 3 Levels of Depth:** Avoid deeply nested shadow elevation; keep depth clear and simple
- **Don't Ignore Line Height:** Never compress line height below 1.4x font size; maintain `24px+` for body text
- **Don't Place Light Text on Light Backgrounds:** Always pair white on navy, or navy on white—never white on `#F8F9FA`
- **Don't Disable Hover States:** All interactive elements must have visible `:hover`, `:active`, and `:focus` states
- **Don't Forget Form Validation:** Implement color-coded error states (`#DC3545`) with clear messaging
- **Don't Mix Font Weights Arbitrarily:** Use the 9-role hierarchy; don't invent intermediate weights beyond 400, 600, 700, 800

## 8. Responsive Behavior

### Breakpoints

| Breakpoint Name | Width | Key Changes |
|-----------------|-------|-------------|
| **Mobile (xs)** | 320px–575px | 1-column layout, full-width cards, 20px horizontal padding, `13.12px` text, stacked navigation |
| **Tablet (md)** | 576px–767px | 2-column card grid, 24px padding, `16px` text, collapsible navigation |
| **Large Tablet (lg)** | 768px–991px | 3-column grid, 28px padding, maintained `16px` body text |
| **Desktop (xl)** | 992px–1199px | 4-column news grid, full-width sections with max `1440px`, 40px padding, all typography at full size |
| **Large Desktop (xxl)** | 1200px+ | Max container `1440px` centered, maintained spacing, optimized for ultra-wide displays |

### Touch Targets

- **Minimum Button Size:** `44px × 44px` (ensures fingertip-friendly tapping on mobile)
- **Link Hit Area:** Minimum `16px` padding around text; `12px` vertical, `16px` horizontal minimum
- **Input Field Height:** `43.58px` (accommodates comfortable mobile input)
- **Spacing Between Tappable Elements:** Minimum `8px` gap to prevent accidental activation
- **Search Button Width:** `44px` minimum on mobile, `60px+` on desktop

### Collapsing Strategy

**Header Navigation:**
- **Desktop (xl+):** Horizontal menu bar with `66px` height, all nav items visible
- **Tablet (lg):** Hamburger menu toggle appears; horizontal layout maintained if space allows
- **Mobile (xs–md):** Hamburger icon reveals full-height side drawer or dropdown menu; items stack vertically

**Card Grid:**
- **Desktop (xl+):** 4 columns with `16px` gutters
- **Tablet (lg):** 3 columns with `12px` gutters
- **Mobile Tablet (md):** 2 columns with `12px` gutters
- **Mobile (xs):** Single column, full-width cards with `20px` margins

**Hero Section:**
- **Desktop:** Full-width image with overlay text positioned right; `60px` top/bottom padding
- **Tablet:** Image scales down; text adjusts to `20px` heading, `14.4px` body
- **Mobile:** Stacked layout; image fills width, text overlay repositioned below or centered on image

**Search Bar:**
- **Desktop:** `352.656px` input width paired with button
- **Tablet:** `60%` dynamic width with button
- **Mobile:** Full-width input and button stack vertically or resize to fit `calc(100% - 20px)`

## 9. Agent Prompt Guide

### Quick Color Reference

- **Primary CTA Button:** Gold (`#F5C842`) on light backgrounds, or White (`#FFFFFF`) text on dark navy (`#1A2335`)
- **Primary Background:** Navy Dark (`#1A2335`), Navy Deeper (`#0A1A3A`)
- **Card Surface:** White (`#FFFFFF`) with `16px` border-radius and L1 shadow
- **Heading Text:** Navy Dark (`#1A2335`) on white; White (`#FFFFFF`) on navy backgrounds
- **Body Text:** Navy Dark (`#1A2335`) for primary, Steel Blue Muted (`#A8BBD0`) for secondary on light; White (`#FFFFFF`) on dark
- **Borders:** Medium Gray (`#ADB5BD`), Border Gray (`#DEE2E6`), or Border Soft (`#DDE4EF`)
- **Interactive States:** Link Blue (`#0D6EFD`) for links, Success Green (`#198754`) for validation, Error Red (`#DC3545`) for errors
- **Neutral Fill:** Light Gray (`#F8F9FA`), Soft Gray (`#EDF0F6`), or Light Gray Surface (`#E9ECEF`)

### Iteration Guide

1. **Navigation & Header:** Build with `#1A2335` background, `66px` height, white text, gold hover states, L3 shadow (`rgba(0, 0, 0, 0.5) 0px 2px 20px 0px`)
2. **Cards & Content:** Use `#FFFFFF` background, `16px` border-radius, L1 shadow (`rgba(26, 35, 53, 0.08) 0px 2px 16px 0px`), navy dark text, `20px`–`28px` internal padding
3. **Buttons (Primary CTA):** `#F5C842` background, `#000000` text, `16px` weight 400, `12px 24px` padding, `6px` border-radius, no shadow
4. **Buttons (Secondary):** Transparent background, `#C8D5EC` text, `13.12px` weight 700, `8px` padding, no border-radius, light border if outlined
5. **Input Fields:** `#FFFFFF` background, `#1A2335` text, `14.4px` weight 400, `10px 15px` padding, `6px` or `10px` border-radius (asymmetric if paired), `#D4DBE8` border, focus state adds L1 shadow with `#0D6EFD` border
6. **Search Bar + Button:** Input with `10px 0px 0px 10px` radius, button with `0px 10px 10px 0px` radius, both `43.58px` height, gold button on white
7. **Typography Hierarchy:** Apply `28.8px` 700 for h3, `20px` 600 for h5, `16px` 400 for body, `13.28px` 700 for dense text, maintain 130%–150% line height
8. **Spacing:** Use `16px` base unit; apply `24px` between major sections, `16px` between cards, `20px`–`28px` card padding, `60px` for hero sections
9. **Responsive Collapsing:** Ensure 4-column desktop grid collapses to 2-column mobile, navigation hamburger menu on `<lg` breakpoints, full-width sections center at `1440px` max
10. **Elevation & Depth:** L0 (no shadow) for text/minimal elements, L1 for cards, L2 for dropdowns, L3 for header—maintain consistent depth scale without custom shadows