---
name: laravel-branding
description: Enforces Laravel-inspired design aesthetics (colors, typography, and principles) for all web products, landings, and CRMs. Activate when creating new UI, landing pages, or redesigning components.
---

# Laravel Branding Skill

Apply the signature Laravel aesthetic to every product we build. This skill ensures consistency across web pages, landing pages, dashboards, and CRM interfaces.

## Brand Essence

Laravel's design is characterized by:
- **Premium Simplicity**: Clean layouts with carefully balanced whitespace.
- **Vibrant Primary Red**: Used as a focused accent for call-to-actions (CTAs) and primary elements.
- **Sophisticated Neutrals**: A mix of Slate/Slate-900 for dark themes and Slate-50 for light backgrounds.
- **Precision Typography**: Utilizing 'Inter' for readability and a modern feel.

## Colors (from branding.json)

- **Laravel Red**: `#FF2D20` (Primary)
- **Deep Slate**: `#0F172A` (Text/Dark backgrounds)
- **Soft Light**: `#F8FAFC` (General background)

## Implementation Rules

### 1. Landing Pages & Products
- **Hero Sections**: Use bold typography with high contrast. Use subtle gradients for depth (e.g., `from-white to-slate-50`).
- **CTAs**: Primary buttons MUST use Laravel Red (`#FF2D20`) with white text. Apply a subtle hover scale effect.
- **Borders**: Highly subtle. Use `border-slate-200` for light mode and `border-slate-800` for dark mode.

### 2. CRM & Dashboards
- **Sidebar**: Use Deep Slate (`#0F172A`) for a premium professional look.
- **Active States**: Use a left-border indicator in Laravel Red for navigation items.
- **Cards**: Use white backgrounds with extremely soft shadows (`shadow-sm` or `shadow-md`).

### 3. Typography Rules
- **Headings**: `font-semibold` or `font-bold` with tight tracking (`tracking-tight`).
- **Body**: `leading-relaxed` for readability.
- **Sub-headers**: Use `text-slate-500` or `text-slate-400` for hierarchy.

## Usage Guide
When starting a design task, always reference `resources/branding.json` to extract precise HSL or HEX values.

```json
{
  "colors": {
    "primary": "#FF2D20",
    "background": "#F8FAFC"
  }
}
```

## Aesthetic Principles
1. **WOW Factor**: Every page should look state-of-the-art. No generic components.
2. **Glassmorphism**: Use for overlays and modals with `backdrop-blur`.
3. **Micro-animations**: Add subtle transitions to links, buttons, and state changes.
