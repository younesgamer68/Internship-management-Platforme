with open('resources/views/livewire/student/profile.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

content = content.replace('{{  }}', '{{ \ }}')
content = content.replace('{{ \ ?? \'Add University\' }}', '{{ \ ?? \'Add University\' }}')
content = content.replace('{{ \ ?? \'-\' }}', '{{ \ ?? \'-\' }}')

with open('resources/views/livewire/student/profile.blade.php', 'w', encoding='utf-8') as f:
    f.write(content)
