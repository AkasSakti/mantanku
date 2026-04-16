<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Data Mantan')</title>
    <style>
        :root {
            color-scheme: light;
            --bg: #f5f7fb;
            --card: #ffffff;
            --primary: #0f766e;
            --primary-dark: #115e59;
            --danger: #b91c1c;
            --text: #172033;
            --muted: #64748b;
            --border: #d9e2ec;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, sans-serif;
            background: linear-gradient(180deg, #eef6ff 0%, var(--bg) 100%);
            color: var(--text);
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 32px 16px 48px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            align-items: center;
            margin-bottom: 24px;
        }
        .card {
            background: var(--card);
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
            border: 1px solid rgba(217, 226, 236, 0.8);
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 10px;
            padding: 10px 16px;
            text-decoration: none;
            cursor: pointer;
            font-weight: 600;
        }
        .btn-primary { background: var(--primary); color: #fff; }
        .btn-primary:hover { background: var(--primary-dark); }
        .btn-secondary {
            background: #e2e8f0;
            color: var(--text);
        }
        .btn-danger { background: var(--danger); color: #fff; }
        .flash {
            margin-bottom: 16px;
            padding: 14px 16px;
            border-radius: 12px;
            background: #dcfce7;
            color: #166534;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
        }
        th, td {
            text-align: left;
            padding: 14px 12px;
            border-bottom: 1px solid var(--border);
            vertical-align: top;
        }
        th { color: var(--muted); font-size: 14px; }
        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        form.inline { display: inline; }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
        }
        input, textarea {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 12px 14px;
            font: inherit;
            margin-bottom: 16px;
        }
        textarea { min-height: 120px; resize: vertical; }
        .error-list {
            margin: 0 0 16px;
            padding: 12px 16px;
            border-radius: 12px;
            background: #fee2e2;
            color: #991b1b;
        }
        .pagination {
            margin-top: 20px;
        }
        @media (max-width: 720px) {
            .header { flex-direction: column; align-items: flex-start; }
            table, thead, tbody, th, td, tr { display: block; }
            thead { display: none; }
            td { padding-left: 0; padding-right: 0; }
            tr { padding: 12px 0; border-bottom: 1px solid var(--border); }
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
