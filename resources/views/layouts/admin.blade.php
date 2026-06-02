<x-layouts::app.sidebar :title="$title ?? null">
  
   @if(request()->route()->uri() === "tickets/{ticket}")
        <div class="animate-enter">
            {{ $slot }}
        </div>
    
    @else
     <flux:main>
        <div class="animate-enter">
            {{ $slot }}
        </div>
    </flux:main>
    @endif

    <style>
    /* CSS Variables */
    :root {
      --primary: #2563EB;
      --primary-bg: rgba(37, 99, 235, 0.1);
      --primary-dark: #1D4ED8;
      --green: #10B981;
      --green-bg: rgba(16, 185, 129, 0.1);
      --green-dark: #059669;
      --warning: #F59E0B;
      --warning-bg: rgba(245, 158, 11, 0.1);
      --danger: #EF4444;
      --danger-bg: rgba(239, 68, 68, 0.1);
      --gray-50: #f8fafc;
      --gray-100: #f1f5f9;
      --gray-200: #e2e8f0;
      --gray-300: #cbd5e1;
      --gray-400: #94a3b8;
      --gray-500: #64748b;
      --gray-600: #475569;
      --gray-700: #334155;
      --gray-800: #1e293b;
      --gray-900: #0f172a;
      --border: #e2e8f0;
      --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
      --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    /* Core Base */
    .welcome-banner {
      background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
      border-radius: 16px;
      padding: 24px 32px;
      box-shadow: 0 10px 25px -5px rgba(37, 99, 235, 0.3);
    }

    .stats-grid {
      display: grid;
      gap: 20px;
    }

    .content-grid {
      display: grid;
      gap: 20px;
    }

    /* Cards */
    .card {
      background: white;
      border-radius: 16px;
      border: 1px solid var(--border);
      box-shadow: var(--shadow-sm);
      margin-bottom: 24px;
      overflow: hidden;
    }

    .card-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 24px;
      border-bottom: 1px solid var(--border);
      background: var(--gray-50);
    }

    .card-title {
      font-size: 15px;
      font-weight: 700;
      color: var(--gray-800);
    }

    .card-link {
      font-size: 12px;
      font-weight: 600;
      color: var(--primary);
      text-decoration: none;
    }

    .card-link:hover { text-decoration: underline; }

    .card-body {
      padding: 24px;
    }

    .stat-card {
      background: white;
      border-radius: 16px;
      border: 1px solid var(--border);
      padding: 20px;
      display: flex;
      align-items: center;
      gap: 16px;
      box-shadow: var(--shadow-sm);
      transition: transform 0.2s, box-shadow 0.2s;
    }

    .stat-card:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow);
    }

    .stat-icon {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .stat-info {
      flex: 1;
    }

    .stat-value {
      font-size: 24px;
      font-weight: 800;
      color: var(--gray-800);
      line-height: 1.2;
    }

    .stat-label {
      font-size: 12px;
      color: var(--gray-500);
      font-weight: 500;
    }

    /* Buttons */
    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      padding: 10px 18px;
      border-radius: 10px;
      font-size: 13px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s;
      border: none;
      text-decoration: none;
    }

    .btn-primary {
      background: var(--primary);
      color: white;
    }
    .btn-primary:hover { background: var(--primary-dark); }

    .btn-outline {
      background: transparent;
      border: 1.5px solid var(--border);
      color: var(--gray-700);
    }
    .btn-outline:hover { background: var(--gray-50); border-color: var(--gray-300); }

    .btn-sm { padding: 6px 12px; font-size: 12px; }

    /* Table */
    .table-wrapper {
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th {
      text-align: left;
      padding: 12px 16px;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      color: var(--gray-500);
      letter-spacing: 0.05em;
      border-bottom: 1px solid var(--border);
    }

    td {
      padding: 14px 16px;
      border-bottom: 1px solid var(--gray-100);
      font-size: 13px;
      color: var(--gray-700);
    }

    tr:last-child td { border-bottom: none; }
    tr:hover td { background: var(--gray-50); }

    /* Badges */
    .status-badge {
      display: inline-block;
      padding: 4px 10px;
      border-radius: 20px;
      font-size: 11px;
      font-weight: 700;
    }
    .status-badge.active { background: var(--green-bg); color: var(--green-dark); }
    .status-badge.pending { background: var(--warning-bg); color: #B45309; }
    .status-badge.completed { background: rgba(59,130,246,0.1); color: #2563EB; }

    /* Progress */
    .progress-bar {
      height: 6px;
      background: var(--gray-100);
      border-radius: 3px;
      overflow: hidden;
      width: 100%;
    }
    .progress-fill {
      height: 100%;
      border-radius: 3px;
    }
    </style>
</x-layouts::app.sidebar>
