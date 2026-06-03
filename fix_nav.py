import re

files = [
    'resources/views/layouts/admin.blade.php',
    'resources/views/layouts/student.blade.php',
    'resources/views/layouts/company.blade.php'
]

for file_path in files:
    with open(file_path, 'r', encoding='utf-8') as f:
        content = f.read()

    # Find the Home nav-item
    home_pattern = re.compile(r'(\s*<a href=\"\{\{\s*route\(\'welcome\'\).*?<span>Home</span>\s*</a>)', re.DOTALL)
    match = home_pattern.search(content)
    if match:
        home_html = match.group(1)
        content = content.replace(home_html, '')
        
        # Insert before </nav>
        # Add a divider if not present just before the home navlink. Let's just append it before </nav>
        content = content.replace('</nav>', home_html.lstrip('\n') + '\n      </nav>')
        
        with open(file_path, 'w', encoding='utf-8') as f:
            f.write(content)
