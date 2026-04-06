<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Delivery</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js"
        integrity="sha512-eSeh0V+8U3qoxFnK3KgBsM69hrMOGMBy3CNxq/T4BArsSQJfKVsKb5joMqIPrNMjRQSTl4xG8oJRpgU2o9I7HQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css"
        integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        :root {
            --bg: #f1f5f9;
            --card: #ffffff;
            --navy: #0f172a;
            --accent: #f97316;
            --accent-light: #fff7ed;
            --text: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --danger: #ef4444;
            --success: #10b981;
            --warning: #f59e0b;
            --radius: 1rem;
            --shadow: 0 4px 32px rgba(0,0,0,0.09);
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
            max-width: 580px;
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
            content: '✏️';
            position: absolute;
            right: 1.75rem; top: 50%;
            transform: translateY(-50%);
            font-size: 3.5rem;
            opacity: 0.12;
        }
        .card-header h1 { font-size: 1.6rem; font-weight: 800; color: #fff; margin-bottom: 0.2rem; }
        .card-header h1 span { color: var(--accent); }
        .card-header p { color: rgba(255,255,255,0.5); font-size: 0.82rem; }

        .delivery-id-badge {
            display: inline-block;
            background: rgba(249,115,22,0.18);
            color: var(--accent);
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
        .field input,
        .field select {
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
        .field input:focus,
        .field select:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(249,115,22,0.13);
        }

        .status-select option[value="pending"]   { color: var(--warning); }
        .status-select option[value="completed"] { color: var(--success); }
        .status-select option[value="canceled"]  { color: var(--danger);  }

        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

        .btn-group { display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; margin-top: 1.25rem; }
        .btn-group-single { margin-top: 0.6rem; }

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
        .btn-primary   { background: var(--accent); color: #fff; }
        .btn-primary:hover { background: #ea6c0a; box-shadow: 0 4px 14px rgba(249,115,22,0.38); transform: translateY(-1px); }
        .btn-danger    { background: var(--danger); color: #fff; }
        .btn-danger:hover { background: #dc2626; box-shadow: 0 4px 14px rgba(239,68,68,0.35); transform: translateY(-1px); }
        .btn-secondary { background: transparent; color: var(--muted); border: 1.5px solid var(--border); }
        .btn-secondary:hover { background: #f8fafc; color: var(--text); }

        .error-msg { font-size: 0.73rem; color: var(--danger); margin-top: 0.25rem; }

        /* ── Chosen.js overrides ── */
        .chosen-container { width: 100% !important; }
        .chosen-container-single .chosen-single {
            padding: 0.7rem 0.95rem !important;
            border: 1.5px solid var(--border) !important;
            border-radius: 0.65rem !important;
            height: auto !important; line-height: 1.5 !important;
            background: #fff !important; box-shadow: none !important;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.88rem; color: var(--text) !important;
        }
        .chosen-container-active.chosen-with-drop .chosen-single {
            border-color: var(--accent) !important;
            box-shadow: 0 0 0 3px rgba(249,115,22,0.13) !important;
        }
        .chosen-drop {
            border: 1.5px solid var(--border) !important;
            border-radius: 0.65rem !important;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1) !important;
            overflow: hidden;
        }
        .chosen-results li.highlighted { background: var(--accent) !important; color: #fff !important; }
        .chosen-search input[type="text"] {
            border-radius: 0.45rem !important;
            font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.85rem;
        }
    </style>
</head>
<body>
<div class="card">
    <div class="card-header">
        <h1>Edit <span>Delivery</span></h1>
        <p>Update the delivery information below</p>
        <span class="delivery-id-badge">ID #{{ $delivery->id }}</span>
    </div>

    <div class="card-body">
        {{-- @dump($errors) --}}
        <form method="POST" action="{{ route('delivery-list.update', $delivery->id) }}" id="update-form">
            @csrf
            @method('PATCH')

            <p class="section-label">People</p>

            <div class="field">
                <label>Customer</label>
                <select name="customer_id" class="ch" required>
                    <option value="{{ $delivery->customer->id }}">{{ $delivery->customer->user->name }}</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label>Delivery Man</label>
                <select name="delivery_man_id" class="ch" required>
                    <option value="{{ $delivery->deliveryMan->id }}">{{ $delivery->deliveryMan->user->name }}</option>
                    @foreach ($delivery_men as $deliveryMan)
                        <option value="{{ $deliveryMan->id }}">{{ $deliveryMan->user->name }}</option>
                    @endforeach
                </select>
            </div>

            <p class="section-label">Route</p>

            <div class="field">
                <label>Departure Address</label>
                <select name="departure_address_id" class="ch" required>
                    <option value="{{ $delivery->departure_address_id }}">
                        @if (filled($delivery->departureAddress))
                            {{ $delivery->departureAddress->name }}
                        @else
                            — Not set —
                        @endif
                    </option>
                    @foreach ($quarters as $quarter)
                        <option value="{{ $quarter->id }}">{{ $quarter->name }}</option>
                    @endforeach
                </select>
                @error('departure_address_id') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            <div class="field">
                <label>Destination Quarter</label>
                <select name="destination_address_id" id="destination_quarter_id" class="ch" required>
                    <option value="{{ $delivery->destination_address_id }}">
                        @if (filled($delivery->destinationAddress))
                            {{ $delivery->destinationAddress->name }}
                        @else
                            — Not set —
                        @endif
                    </option>
                    @foreach ($quarters as $quarter)
                        <option value="{{ $quarter->id }}">{{ $quarter->name }}</option>
                    @endforeach
                </select>
                @error('destination_address_id') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            <p class="section-label">Package Details</p>

            <div class="field">
                <label>Item Description</label>
                <input name="item_description" type="text"
                       placeholder="e.g. Electronics, Documents…"
                       value="{{ $delivery->item_description }}">
                @error('item_description') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            <div class="form-row">
                <div class="field">
                    <label>Status</label>
                    <select name="status" class="status-select" required>
                        <option value="pending"   {{ $delivery->status == 'pending'   ? 'selected' : '' }}>Pending</option>
                        <option value="completed" {{ $delivery->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="canceled"  {{ $delivery->status == 'canceled'  ? 'selected' : '' }}>Canceled</option>
                    </select>
                    @error('status') <p class="error-msg">{{ $message }}</p> @enderror
                </div>
                <div class="field">
                    <label>Fee (XAF)</label>
                    <input name="fee" type="text" placeholder="e.g. 2500" value="{{ $delivery->fee }}">
                    @error('fee') <p class="error-msg">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="field">
                <label>Delivered On</label>
                <input name="delivered_on" type="datetime-local"
                       value="{{ \Carbon\Carbon::parse($delivery->delivered_on)->format('Y-m-d\TH:i') }}" required>
                @error('delivered_on') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            <div class="btn-group">
                <button type="submit" form="update-form" class="btn btn-primary">Update Delivery</button>
                <button type="submit" form="delete-form" class="btn btn-danger">Delete</button>
            </div>
        </form>

        <div class="btn-group-single">
            <a href="/delivery-list/{{ $delivery->id }}" class="btn btn-secondary">Cancel</a>
        </div>

        <form method="POST" action="/delivery-list/{{ $delivery->id }}" id="delete-form">
            @csrf
            @method('DELETE')
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.ch').chosen({ width: '100%' });
    });
</script>
</body>
</html>
