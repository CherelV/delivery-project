<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Delivery Man</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f0f4ff;
            --card: #ffffff;
            --navy: #0f1f5c;
            --accent: #2563eb;
            --accent-hover: #1d4ed8;
            --accent-light: #eff6ff;
            --text: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --danger: #ef4444;
            --success: #10b981;
            --radius: 1rem;
            --shadow: 0 4px 32px rgba(37,99,235,0.10);
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            background-image: radial-gradient(ellipse at 70% 10%, rgba(37,99,235,0.10) 0%, transparent 60%),
                              radial-gradient(ellipse at 10% 90%, rgba(99,102,241,0.08) 0%, transparent 50%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            color: var(--text);
        }

        .card {
            width: 100%;
            max-width: 580px;
            background: var(--card);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            animation: slideUp 0.4s cubic-bezier(.22,.68,0,1.2);
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .card-header {
            background: linear-gradient(135deg, var(--navy) 0%, #1e3a8a 60%, #2563eb 100%);
            padding: 2rem 2.25rem 1.75rem;
            position: relative;
            overflow: hidden;
        }
        .card-header::before {
            content: '';
            position: absolute;
            right: 1.75rem; top: 50%;
            transform: translateY(-50%);
            font-size: 4rem;
            opacity: 0.13;
        }
        .card-header::after {
            content: '';
            position: absolute;
            bottom: -40px; left: -20px;
            width: 160px; height: 160px;
            border-radius: 50%;
            background: rgba(99,102,241,0.15);
        }
        .card-header h1 { font-size: 1.6rem; font-weight: 800; color: #fff; margin-bottom: 0.2rem; }
        .card-header h1 span { color: #93c5fd; }
        .card-header p { color: rgba(255,255,255,0.5); font-size: 0.82rem; }

        .new-badge {
            display: inline-block;
            background: rgba(147,197,253,0.2);
            color: #93c5fd;
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
            margin-top: 1.5rem;
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
        }
        .field input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(37,99,235,0.13);
        }
        .field input::placeholder { color: #cbd5e1; }

        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

        .error-msg { font-size: 0.73rem; color: var(--danger); margin-top: 0.25rem; }

        .btn {
            display: block; width: 100%;
            padding: 0.85rem 1rem;
            border-radius: 0.75rem;
            border: none;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.88rem; font-weight: 700;
            cursor: pointer; transition: all 0.2s;
            text-align: center; text-decoration: none;
            margin-top: 1.25rem;
        }
        .btn-primary { background: var(--accent); color: #fff; }
        .btn-primary:hover {
            background: var(--accent-hover);
            box-shadow: 0 4px 18px rgba(37,99,235,0.38);
            transform: translateY(-1px);
        }
    </style>
</head>
<body>
<div class="card">
    <div class="card-header">
        <h1>New <span>Delivery Man</span></h1>
        <p>Fill in the details to register a new delivery staff member</p>
        <span class="new-badge">NEW REGISTRATION</span>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('delivery-man.store') }}">
            @csrf

            <p class="section-label">Personal Information</p>

            <div class="field">
                <label>Full Name</label>
                <input name="name" type="text" placeholder="e.g. Jean-Paul Mbarga" >
                @error('name') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            <div class="form-row">
                <div class="field">
                    <label>Email</label>
                    <input name="email" type="email" placeholder="email@example.com" >
                    @error('email') <p class="error-msg">{{ $message }}</p> @enderror
                </div>
                <div class="field">
                    <label>Mobile</label>
                    <input name="mobile" type="text" placeholder=" 6XX XXX XXX" >
                    @error('mobile') <p class="error-msg">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="field">
                <label>Address</label>
                <input name="address" type="text" placeholder="e.g. Douala, Akwa" >
                @error('address') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            <div class="form-row">
                <div class="field">
                    <label>National ID</label>
                    <input name="national_id" type="text" placeholder="###########" >
                    @error('national_id') <p class="error-msg">{{ $message }}</p> @enderror
                </div>
                <div class="field">
                    <label>Password</label>
                    <input name="password" type="password" placeholder="Min. 6 characters">
                    @error('password') <p class="error-msg">{{ $message }}</p> @enderror
                </div>
            </div>

            <p class="section-label">Vehicle & License</p>

            <div class="form-row">
                <div class="field">
                    <label>License Number</label>
                    <input name="license_number" type="text" placeholder="###########" >
                    @error('license_number') <p class="error-msg">{{ $message }}</p> @enderror
                </div>
                <div class="field">
                    <label>License Class</label>
                    <input name="license_class" type="text" placeholder="e.g. B, C" >
                    @error('license_class') <p class="error-msg">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="field">
                    <label>Vehicle Type</label>
                    <input name="vehicle_type" type="text" placeholder="e.g. Motorcycle" >
                    @error('vehicle_type') <p class="error-msg">{{ $message }}</p> @enderror
                </div>
                <div class="field">
                    <label>Plate Number</label>
                    <input name="number_plate" type="text" placeholder="e.g. LT 1234 A" >
                    @error('number_plate') <p class="error-msg">{{ $message }}</p> @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Register Delivery Man</button>
        </form>
    </div>
</div>
</body>
</html>
