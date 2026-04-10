<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f5f3ff;
            --card: #ffffff;
            --navy: #1e1250;
            --accent: #7c3aed;
            --accent-light: #ede9fe;
            --text: #1e1250;
            --muted: #6b7280;
            --border: #e5e7eb;
            --danger: #ef4444;
            --success: #10b981;
            --radius: 1rem;
            --shadow: 0 4px 32px rgba(124,58,237,0.10);
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            color: var(--text);
        }

        .card {
            width: 100%;
            max-width: 520px;
            background: var(--card);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            animation: slideUp 0.4s ease;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .card-header {
            background: var(--navy);
            padding: 2rem 2.25rem 1.75rem;
            position: relative;
            overflow: hidden;
        }
        .card-header::after {
            content: '';
            position: absolute;
            right: -20px; bottom: -20px;
            width: 110px; height: 110px;
            border-radius: 50%;
            background: var(--accent);
            opacity: 0.12;
        }
        .card-header h1 { font-size: 1.6rem; font-weight: 800; color: #fff; margin-bottom: 0.2rem; }
        .card-header h1 span { color: #a78bfa; }
        .card-header p { color: rgba(255,255,255,0.5); font-size: 0.82rem; }

        .id-badge {
            display: inline-block;
            background: rgba(167,139,250,0.2);
            color: #a78bfa;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            border-radius: 0.4rem;
            padding: 0.15rem 0.55rem;
            margin-top: 0.5rem;
        }

        .card-body { padding: 1.75rem 2.25rem 2rem; }

        .section-label {
            font-size: 0.68rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--muted);
            margin-bottom: 0.75rem;
            margin-top: 1.4rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .section-label::after { content: ''; flex: 1; height: 1px; background: var(--border); }
        .section-label:first-child { margin-top: 0; }

        .field { margin-bottom: 1rem; }
        .field label {
            display: block;
            font-size: 0.78rem; font-weight: 600;
            color: var(--muted);
            margin-bottom: 0.4rem;
        }
        .field input {
            width: 100%;
            padding: 0.7rem 0.95rem;
            border: 1.5px solid var(--border);
            border-radius: 0.65rem;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.88rem;
            color: var(--text);
            background: #fff;
            transition: border-color 0.2s, box-shadow 0.2s;
            -webkit-appearance: none;
        }
        .field input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(124,58,237,0.13);
        }

        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

        .btn-group { display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; margin-top: 1.25rem; }
        .btn-single { margin-top: 0.6rem; }

        .btn {
            display: block; width: 100%;
            padding: 0.85rem 1rem;
            border-radius: 0.75rem;
            border: none;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.88rem; font-weight: 700;
            cursor: pointer; transition: all 0.2s;
            text-align: center; text-decoration: none;
        }
        .btn-primary { background: var(--accent); color: #fff; }
        .btn-primary:hover {
            background: #6d28d9;
            box-shadow: 0 4px 14px rgba(124,58,237,0.35);
            transform: translateY(-1px);
        }
        .btn-danger { background: var(--danger); color: #fff; }
        .btn-danger:hover {
            background: #dc2626;
            box-shadow: 0 4px 14px rgba(239,68,68,0.35);
            transform: translateY(-1px);
        }
        .btn-secondary { background: transparent; color: var(--muted); border: 1.5px solid var(--border); }
        .btn-secondary:hover { background: #f8fafc; color: var(--text); }

        .error-msg { font-size: 0.73rem; color: var(--danger); margin-top: 0.25rem; }
    </style>
</head>
<body>
<div class="card">
    <div class="card-header">
        <h1>Edit <span>Customer</span></h1>
        <p>Update the customer information below</p>
        <span class="id-badge">ID #{{ $customer->id }}</span>
    </div>

    <div class="card-body">
        <form method="POST" action="/customers/{{ $customer->id }}" id="update-form">
            @csrf
            @method('PATCH')

            <p class="section-label">Identity</p>

            <div class="field">
                <label>User Name</label>
                <input name="name" type="text" placeholder="Emma Dupont" value="{{ $customer->user->name }}">
                @error('name') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            <div class="field">
                <label>Email</label>
                <input name="email" type="email" placeholder="emma@example.com" value="{{ $customer->user->email }}">
                @error('email') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            <div class="field">
                <label>Password</label>
                <input name="password" type="password" placeholder="••••••••••">
                @error('password') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            <p class="section-label">Contact &amp; Details</p>

            <div class="field">
                <label>Address</label>
                <input name="address" type="text" placeholder="Douala, Ancien Dépôt" value="{{ $customer->user->address }}">
                @error('address') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            <div class="form-row">
                <div class="field">
                    <label>Mobile</label>
                    <input name="mobile" type="text" placeholder="+237 672 000 000" value="{{ $customer->user->mobile }}">
                    @error('mobile') <p class="error-msg">{{ $message }}</p> @enderror
                </div>
                <div class="field">
                    <label>National ID</label>
                    <input name="national_id" type="text" placeholder="###########" value="{{ $customer->user->national_id }}">
                    @error('national_id') <p class="error-msg">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="btn-group">
                <button type="submit" form="update-form" class="btn btn-primary">Update</button>
                <button type="submit" form="delete-form" class="btn btn-danger">Delete</button>
            </div>
        </form>

        <div class="btn-single">
            <a href="/customers/{{ $customer->id }}" class="btn btn-secondary">Cancel</a>
        </div>

        <form method="POST" action="/customers/{{ $customer->id }}" id="delete-form">
            @csrf
            @method('DELETE')
        </form>
    </div>
</div>
</body>
</html>
