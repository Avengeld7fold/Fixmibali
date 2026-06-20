# Fixmi Agent Instructions

## Ponytail Mode

This project uses the installed Codex Ponytail skills as the source of truth.
For coding, review, audit, and refactor work in this repo, load and follow:

- `/Users/macmini/.codex/skills/ponytail/SKILL.md`
- `/Users/macmini/.codex/skills/ponytail-review/SKILL.md` when reviewing a diff
- `/Users/macmini/.codex/skills/ponytail-audit/SKILL.md` when auditing the repo
- `/Users/macmini/.codex/skills/ponytail-debt/SKILL.md` when collecting `ponytail:` debt
- `/Users/macmini/.codex/skills/ponytail-help/SKILL.md` when the user asks for help

Do not treat this file as a replacement for Ponytail. This file only tells the
agent to use the installed Ponytail skill files for this project.

Default Ponytail level for Fixmi: `full`.

Before writing code, stop at the first rung that holds:

1. Does this need to be built at all? If not, skip it and say why.
2. Does PHP, Laravel, Blade, JavaScript, CSS, the browser, or the database
   already provide it?
3. Does an already-installed dependency solve it?
4. Can it be one line or a small local edit?
5. Only then, write the minimum code that works.

Rules:

- No unrequested abstractions, factories, services, configs, or layers.
- No new dependency unless the existing stack cannot reasonably do the job.
- Prefer deletion over addition, boring over clever, and fewer files over more.
- Keep accessibility, security, validation, and data-loss handling intact.
- For non-trivial logic, leave the smallest useful runnable check.
- Mark deliberate shortcuts with a `ponytail:` comment that names the ceiling
  and when to upgrade it.
- Keep explanations short unless the user explicitly asks for a walkthrough.

If the user asks for "normal mode" or "stop ponytail", ignore this section for
that request.

## Frontend Design Skill

This project also uses the installed `frontend-design` skill for UI and visual
design work.

Load and follow the project-local skill first:

- `/Users/macmini/Documents/Vibe Coding/Website/fixmi/.agents/skills/frontend-design/SKILL.md`

Use the global Codex install as a fallback:

- `/Users/macmini/.codex/skills/frontend-design/SKILL.md`

Use `frontend-design` whenever the task involves:

- building or redesigning UI
- changing layout, typography, palette, imagery, motion, or visual hierarchy
- polishing responsive behavior or interaction states
- turning product requirements into a more intentional frontend experience

When both Ponytail and `frontend-design` apply, use both: Ponytail controls
scope and simplicity, while `frontend-design` controls visual direction and UI
quality. Keep the implementation minimal, but do not make the design generic.

## Laravel Specialist Skill

This project also uses the installed `laravel-specialist` skill for Laravel
backend work.

Load and follow the project-local skill first:

- `/Users/macmini/Documents/Vibe Coding/Website/fixmi/.agents/skills/laravel-specialist/SKILL.md`

Use the global Codex install as a fallback:

- `/Users/macmini/.codex/skills/laravel-specialist/SKILL.md`

Use `laravel-specialist` whenever the task involves:

- Laravel models, migrations, controllers, routes, middleware, policies, or validation
- Blade, Livewire, Inertia, API resources, queues, jobs, Horizon, or auth flows
- Eloquent relationships, query optimisation, or database work
- Laravel feature or unit tests

When both Ponytail and `laravel-specialist` apply, use both: Ponytail keeps the
scope minimal, while `laravel-specialist` drives Laravel-specific implementation.
