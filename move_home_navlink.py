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
    pattern = re.compile(r'\s*<a href="\{\{\s*route\(\'welcome\'\).*?<span>Home</span>\s*</a>', re.DOTALL)
    match = pattern.search(content)
    if match:
        home_html = match.group(0)
        content = content.replace(home_html, '')
        
        # Insert before </nav>
        content = content.replace('</nav>', '        ' + home_html.strip() + '\n      </nav>')
        
        with open(file_path, 'w', encoding='utf-8') as f:
            f.write(content)
        print(f"Updated {file_path}")
    else:
        print(f"Could not find Home navlink in {file_path}")
