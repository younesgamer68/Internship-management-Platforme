import re, os

with open('resources/views/app/student/profile.blade.php', 'r', encoding='utf-8') as f:
    original = f.read()

layout_pattern = re.compile(r'(<x-layouts::student.*?>)(.*?)(</x-layouts::student>)', re.DOTALL)
match = layout_pattern.search(original)
if not match:
    print("Could not find layout tag")
    exit(1)

layout_open = match.group(1)
content = match.group(2)
layout_close = match.group(3)

style_pattern = re.compile(r'(<style>.*?</style>)', re.DOTALL)
style_match = style_pattern.search(content)
styles = style_match.group(1) if style_match else ""

body = content.replace(styles, '').strip()
body = body.replace('@php  = auth()->user()->company?->slug ?? \'internlink-demo\'; @endphp', '')

new_app = f'''{layout_open}
@php \ = auth()->user()->company?->slug ?? 'internlink-demo'; @endphp

{styles}

<livewire:student.profile />

{layout_close}
'''

with open('resources/views/app/student/profile.blade.php', 'w', encoding='utf-8') as f:
    f.write(new_app)

os.makedirs('resources/views/livewire/student', exist_ok=True)
with open('resources/views/livewire/student/profile.blade.php', 'w', encoding='utf-8') as f:
    f.write('<div>\n' + body + '\n</div>')
