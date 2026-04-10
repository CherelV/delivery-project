<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Delivery</title>
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
            content: '';
            position: absolute;
            right: 1.75rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 3.5rem;
            opacity: 0.12;
        }
        .card-header h1 { font-size: 1.6rem; font-weight: 800; color: #fff; margin-bottom: 0.2rem; }
        .card-header h1 span { color: var(--accent); }
        .card-header p { color: rgba(255,255,255,0.5); font-size: 0.82rem; }

        .card-body { padding: 1.75rem 2.25rem 2rem; }

        /* ── Section labels ── */
        .section-label {
            font-size: 0.68rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.08em;
            color: var(--muted);
            margin-bottom: 0.75rem; margin-top: 1.5rem;
            display: flex; align-items: center; gap: 0.5rem;
        }
        .section-label::after { content: ''; flex: 1; height: 1px; background: var(--border); }
        .section-label:first-child { margin-top: 0; }

        /* ── Info chip (customer preview) ── */
        .info-chip {
            display: flex; align-items: center; gap: 0.75rem;
            background: #f8fafc;
            border: 1.5px solid var(--border);
            border-radius: 0.65rem;
            padding: 0.65rem 0.95rem;
            margin-bottom: 1rem;
        }
        .chip-avatar {
            width: 34px; height: 34px; border-radius: 50%;
            background: var(--accent-light); color: var(--accent);
            font-weight: 700; font-size: 0.85rem;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .chip-label { font-size: 0.65rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: var(--muted); }
        .chip-name  { font-weight: 600; font-size: 0.88rem; }
        .chip-sub   { font-size: 0.73rem; color: var(--muted); margin-top: 1px; }

        /* ── Delivery-man editable chip ── */
        .driver-chip {
            display: flex; align-items: center; gap: 0.75rem;
            background: #f0fdf4;
            border: 1.5px solid #bbf7d0;
            border-radius: 0.65rem;
            padding: 0.65rem 0.95rem;
            margin-bottom: 0.4rem;
        }
        .chip-avatar.driver { background: #ecfdf5; color: var(--success); }
        .driver-chip .chip-name  { font-weight: 600; font-size: 0.88rem; }
        .driver-chip .chip-sub   { font-size: 0.73rem; color: var(--muted); margin-top: 1px; }

        .change-driver-btn {
            margin-left: auto; flex-shrink: 0;
            background: none; border: 1.5px solid var(--border);
            border-radius: 0.5rem; padding: 0.3rem 0.65rem;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.72rem; font-weight: 600; color: var(--muted);
            cursor: pointer; transition: all 0.18s;
        }
        .change-driver-btn:hover { border-color: var(--accent); color: var(--accent); }

        /* ── Departure strip ── */
        .departure-strip {
            display: flex; align-items: center; gap: 0.6rem;
            background: #f8fafc; border: 1.5px solid var(--border);
            border-left: 3px solid var(--accent);
            border-radius: 0.65rem; padding: 0.7rem 0.95rem;
            margin-bottom: 0.75rem;
        }
        .departure-strip .ds-icon { font-size: 1.1rem; flex-shrink: 0; }
        .departure-strip .ds-label { font-size: 0.65rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: var(--muted); }
        .departure-strip .ds-name  { font-size: 0.88rem; font-weight: 600; color: var(--text); }

        /* ── Fields ── */
        .field { margin-bottom: 1rem; }
        .field label {
            display: block; font-size: 0.78rem; font-weight: 600;
            color: var(--muted); margin-bottom: 0.4rem;
        }
        .field input,
        .field select {
            width: 100%; padding: 0.7rem 0.95rem;
            border: 1.5px solid var(--border); border-radius: 0.65rem;
            font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.88rem;
            color: var(--text); background: #fff;
            transition: border-color 0.2s, box-shadow 0.2s;
            -webkit-appearance: none;
        }
        .field input:focus,
        .field select:focus {
            outline: none; border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(249,115,22,0.13);
        }
        .field input[readonly] { background: #f8fafc; color: var(--muted); cursor: default; }

        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

        /* ── Fee box ── */
        .fee-wrapper { position: relative; }
        .fee-wrapper .currency-tag {
            position: absolute; right: 0.95rem; top: 50%; transform: translateY(-50%);
            font-size: 0.72rem; font-weight: 700; color: var(--muted); pointer-events: none;
        }
        .fee-wrapper.has-value input {
            border-color: var(--accent);
            background: var(--accent-light);
            color: var(--accent);
            font-weight: 700;
        }
        .fee-wrapper.has-value .currency-tag { color: var(--accent); }

        .fee-hint {
            font-size: 0.72rem; color: var(--muted);
            margin-top: 0.3rem; display: none;
            padding: 0.3rem 0.5rem;
            background: #f8fafc; border-radius: 0.4rem;
            border-left: 2px solid var(--accent);
        }
        .fee-hint.visible { display: block; }

        /* ── Button ── */
        .btn {
            display: block; width: 100%; padding: 0.9rem 1rem;
            border-radius: 0.75rem; border: none;
            font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.92rem; font-weight: 700;
            cursor: pointer; transition: all 0.2s; text-align: center;
            margin-top: 0.5rem;
        }
        .btn-primary { background: var(--accent); color: #fff; }
        .btn-primary:hover {
            background: #ea6c0a;
            box-shadow: 0 4px 14px rgba(249,115,22,0.38);
            transform: translateY(-1px);
        }

        .error-msg { font-size: 0.73rem; color: var(--danger); margin-top: 0.25rem; }

        .note {
            font-size: 0.72rem; color: var(--muted); text-align: center;
            margin-top: 1rem; line-height: 1.6;
        }

        /* ── Chosen.js overrides ── */
        .chosen-container { width: 100% !important; }
        .chosen-container-single .chosen-single {
            padding: 0.7rem 0.95rem !important;
            border: 1.5px solid var(--border) !important;
            border-radius: 0.65rem !important; height: auto !important;
            line-height: 1.5 !important; background: #fff !important;
            box-shadow: none !important;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.88rem; color: var(--text) !important;
        }
        .chosen-container-single .chosen-single span { color: var(--text); }
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
        <h1>Create <span>Delivery</span></h1>
        <p>Fill in the details below to register a new delivery</p>
    </div>

    <div class="card-body">
        {{-- @dump($errors) --}}
        <form method="POST" action="{{ route('delivery-list.store') }}">
            @csrf

            {{-- ═══════════════ PEOPLE ═══════════════ --}}
            <p class="section-label">People</p>

            {{-- Customer (selectable) --}}
            <div class="field">
                <label>Customer</label>
                <select name="customer_id" class="ch" required>
                    <option value="">— Choose a Customer —</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->user->name }}</option>
                    @endforeach
                </select>
                @error('customer_id') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            {{-- Delivery Man — shows pre-selected chip + "Change" toggle --}}
            <div class="field">
                <label>Delivery Man</label>

                {{-- Pre-selected preview chip --}}
                <div class="driver-chip" id="driver-chip">
                    <div class="chip-avatar driver" id="driver-avatar">
                        {{ strtoupper(substr($selectedDeliveryMan->user->name, 0, 1)) }}
                    </div>
                    <div>
                        <div class="chip-label">Driver</div>
                        <div class="chip-name" id="driver-name">{{ $selectedDeliveryMan->user->name }}</div>
                        <div class="chip-sub">{{ $selectedDeliveryMan->pending_count ?? 0 }} pending deliveries</div>
                    </div>
                    <button type="button" class="change-driver-btn" id="toggle-driver-btn">✎ Change</button>
                </div>

                {{-- Dropdown (hidden by default) --}}
                <div id="driver-select-wrap" style="display:none; margin-top:0.4rem;">
                    <select name="delivery_man_id" id="driver-select" class="ch" required>
                        <option value="">— Choose a Delivery Man —</option>
                        @foreach ($delivery_men as $dm)
                            <option value="{{ $dm->id }}"
                                data-name="{{ $dm->user->name }}"
                                data-pending="{{ $dm->pending_count ?? 0 }}"
                                {{ $dm->id == $selectedDeliveryMan->id ? 'selected' : '' }}>
                                {{ $dm->user->name }} 
                                {{-- ({{ $dm->pending_count ?? 0 }} pending) --}}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Hidden field used when dropdown is NOT shown --}}
                <input type="hidden" name="delivery_man_id" id="driver-hidden"
                       value="{{ $selectedDeliveryMan->id }}">

                @error('delivery_man_id') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            {{-- ═══════════════ ROUTE ═══════════════ --}}
            <p class="section-label">Route</p>

            {{-- Departure address (fixed) --}}
            @php
                $departure = $quarters->firstWhere('name', 'Akwa Carrefour Soudanaise')
                          ?? $quarters->firstWhere('name', 'Akwa - Carrefour Soudanaise');
            @endphp
            <input type="hidden" name="departure_address_id" value="{{ $departure->id ?? '' }}">

            <div class="departure-strip">
                <span class="ds-icon"></span>
                <div>
                    <div class="ds-label">Departure (fixed)</div>
                    <div class="ds-name">{{ $departure->name ?? 'Akwa — Carrefour Soudanaise' }}</div>
                </div>
            </div>

            {{-- Destination --}}
            <div class="field">
                <label>Destination Quarter</label>
                <select name="destination_address_id" id="destination_address_id" class="ch" required>
                    <option value="">— Choose Destination Quarter —</option>
                    @foreach ($quarters as $quarter)
                        <option value="{{ $quarter->id }}" data-name="{{ $quarter->name }}">{{ $quarter->name }}</option>
                    @endforeach
                </select>
                @error('destination_address_id') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            {{-- ═══════════════ PACKAGE ═══════════════ --}}
            <p class="section-label">Package Details</p>

            <div class="field">
                <label>Item Description</label>
                <input name="item_description" type="text" placeholder="e.g. Electronics, Documents…">
                @error('item_description') <p class="error-msg">{{ $message }}</p> @enderror
            </div>

            <input type="hidden" name="status" value="pending">

            <div class="form-row">
                <div class="field">
                    <label>Fee (XAF)</label>
                    <div class="fee-wrapper" id="fee-box">
                        <input id="fee" name="fee" type="text" placeholder="Auto-calculated" readonly>
                        <span class="currency-tag">XAF</span>
                    </div>
                    <div class="fee-hint" id="fee-hint"></div>
                    @error('fee') <p class="error-msg">{{ $message }}</p> @enderror
                </div>
                <div class="field">
                    <label>Date</label>
                    <input name="delivered_on" type="date" value="{{ now()->format('Y-m-d') }}">
                    @error('delivered_on') <p class="error-msg">{{ $message }}</p> @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save Delivery</button>
        </form>

        <p class="note">
            * Fares are computed automatically from the destination quarter.<br>
            You may override the fee manually if needed.
        </p>
    </div>
</div>

<script>
/* ═══════════════ FARE TABLE ═══════════════ */
const FARES = {
  // Centre-ville
  "akwa (sous-quartiers)":                     {km:0.5, mn:3},
  "akwa - carrefour soudanaise":               {km:0.1, mn:1},
  "akwa carrefour soudanaise":                 {km:0.1, mn:1},
  "akwa nord":                                 {km:0.8, mn:4},
  "akwa palace":                               {km:0.6, mn:3},
  "bonanjo - prefecture":                      {km:1.2, mn:5},
  "bonanjo - immeuble sic":                    {km:1.0, mn:4},
  "bonanjo - hotel akwa palace":               {km:0.7, mn:3},
  "bonanjo - ambassade france":                {km:1.5, mn:6},
  "bonanjo - cathedrale":                      {km:1.3, mn:5},
  "bonanjo port autonome":                     {km:1.8, mn:6},
  "bonanjo en general":                        {km:1.2, mn:5},
  "bali - marche":                             {km:1.5, mn:5},
  "bali - rond point deido":                   {km:2.0, mn:7},
  "deido marche":                              {km:2.2, mn:8},
  "deido plateau":                             {km:2.5, mn:8},
  "new-bell marche":                           {km:2.0, mn:7},
  "new-bell - gare routiere":                  {km:2.2, mn:8},
  "new-bell":                                  {km:2.0, mn:7},
  "village":                                   {km:3.0, mn:10},
  "nkongmondo":                                {km:2.8, mn:9},
  "cite cicam":                                {km:3.0, mn:10},
  // Bepanda / Ndokoti
  "ndokoti":                                   {km:3.5, mn:11},
  "ndokotti carrefour":                        {km:3.5, mn:11},
  "bepanda americain":                         {km:4.2, mn:13},
  "bepanda casmando":                          {km:4.0, mn:12},
  "bepanda double balle":                      {km:4.3, mn:13},
  "bepanda l'an 2000":                         {km:4.5, mn:14},
  "bepanda omnisport":                         {km:4.8, mn:15},
  "bepanda ominsport":                         {km:4.8, mn:15},
  "bepanda one to one":                        {km:4.0, mn:12},
  "bepanda peuple":                            {km:3.8, mn:12},
  "bepanda sans calecon":                      {km:4.2, mn:13},
  "bepanda tonnerre":                          {km:4.0, mn:12},
  "bepanda yong yong":                         {km:3.8, mn:11},
  "bepanda camtel":                            {km:4.5, mn:14},
  "nkolmitak":                                 {km:3.5, mn:10},
  "madagascar":                                {km:3.0, mn:9},
  "espoir":                                    {km:4.0, mn:12},
  "songkot":                                   {km:4.2, mn:13},
  "ancien abattoir":                           {km:3.5, mn:11},
  "benssengue gare camrail":                   {km:5.5, mn:15},
  "dernier poteau":                            {km:5.0, mn:14},
  "cite sic":                                  {km:3.5, mn:11},
  "cite de la paix":                           {km:4.0, mn:12},
  "transformateur":                            {km:3.8, mn:11},
  "forrestiere":                               {km:4.5, mn:13},
  "bois des singes":                           {km:5.0, mn:14},
  "sable":                                     {km:4.5, mn:13},
  // Makepe / Bonamoussadi
  "makepe missoke":                            {km:4.5, mn:14},
  "makepe missoke - abidjan":                  {km:5.0, mn:15},
  "makepe  saint tropez":                      {km:5.0, mn:15},
  "makepe saint tropez":                       {km:5.0, mn:15},
  "makepe bm":                                 {km:4.8, mn:15},
  "makepe bellavie":                           {km:5.2, mn:16},
  "makepe _mosque":                            {km:4.2, mn:13},
  "bonamoussadi village":                      {km:5.5, mn:16},
  "bonamoussadi - marche et environ":          {km:5.8, mn:17},
  "bonamoussadi - denver":                     {km:6.0, mn:18},
  "bonamoussadi - santa barbara":              {km:6.2, mn:18},
  "bonamoussadi - maetur":                     {km:6.5, mn:19},
  "bonamoussadi maman louise":                 {km:5.5, mn:16},
  "bonamoussadi petit terrain":                {km:5.8, mn:17},
  "ange raphael":                              {km:4.8, mn:15},
  "ange raphael sic cacao":                    {km:5.2, mn:16},
  "cite des palmiers - marche":                {km:5.5, mn:16},
  "cite des palmiers - mosque":                {km:5.3, mn:16},
  "cite des palmiers - carrefour lycee":       {km:5.2, mn:15},
  "cite des palmiers - carrefour express":     {km:5.5, mn:16},
  "cite des palmiers carrefour mosque":        {km:5.3, mn:16},
  "chococam - ucb - direction hysacam":        {km:5.2, mn:15},
  "chococam et environs":                      {km:5.0, mn:15},
  "rond point ccc":                            {km:4.5, mn:13},
  "bonaloka":                                  {km:5.5, mn:16},
  "lendi":                                     {km:4.0, mn:12},
  "lendi maison blanche":                      {km:4.2, mn:13},
  "ndogsimbi":                                 {km:3.5, mn:11},
  // Logbessou / Ndogbong
  "logbessou - crtv bar":                      {km:7.5, mn:20},
  "logbessou - carrefour tamkoua - entenne":   {km:7.8, mn:21},
  "logbessou - mexicain":                      {km:8.0, mn:22},
  "logbessou- derriere college simo - quartier dschang": {km:8.5, mn:23},
  "logbessou - plateau- ecole brikini":        {km:9.0, mn:25},
  "logbessou carrefour jusqu'ue bao":          {km:8.2, mn:22},
  "logbessou - temoin de jehovah":             {km:8.0, mn:22},
  "logbessou - entree grenier":                {km:7.6, mn:20},
  "logbessou - entree chefferie":              {km:7.5, mn:20},
  "ndogbong iut-10e-bel'air":                  {km:6.5, mn:18},
  "ndogbong camlait - socaver":                {km:6.8, mn:19},
  "ndogbong citadele - dauphine":              {km:6.5, mn:18},
  "ndogbong zachman":                          {km:6.8, mn:19},
  "ndogbong - bifaga":                         {km:7.0, mn:20},
  "ndogbong winner chapel":                    {km:7.0, mn:20},
  "ndogbong passi boutique":                   {km:6.6, mn:18},
  "ndogbong immeuble des officiers":           {km:6.5, mn:18},
  // Ndogpassi / Logpom / Kotto
  "ndogpassi-marche":                          {km:5.5, mn:16},
  "ndogpassi-chicago":                         {km:6.0, mn:17},
  "ndogpassi-sonel":                           {km:6.5, mn:18},
  "ndogpassi-entree borne 10":                 {km:7.0, mn:20},
  "ndogpassi-entree carriere":                 {km:6.0, mn:17},
  "ndogpassi-marche gabonais":                 {km:7.5, mn:21},
  "ndogpassi-14em":                            {km:7.8, mn:22},
  "ndogpassi-bon pasteur":                     {km:6.5, mn:18},
  "ndogpassi-bocom":                           {km:6.8, mn:19},
  "chefferie ndogpassi":                       {km:6.0, mn:17},
  "ndogpassi-bienvenue":                       {km:5.5, mn:16},
  "ndogpassi-afrique de sud":                  {km:6.0, mn:17},
  "ndogpassi-cite de la paix":                 {km:6.5, mn:18},
  "ndogpassi-ecole publique":                  {km:5.8, mn:16},
  "ndogpassi-tradex village":                  {km:6.5, mn:18},
  "ndogpassi-kogefer 1er entre":               {km:7.2, mn:20},
  "ndogpassi chapelle":                        {km:6.2, mn:17},
  "ndogpassi-maitre fotso":                    {km:5.8, mn:16},
  "ndogpassi-1em dange":                       {km:6.0, mn:17},
  "ndogpassi-2em dange":                       {km:6.2, mn:17},
  "ndogpassi-nyala kampo":                     {km:7.0, mn:20},
  "ndogpassi-petit bonadjo":                   {km:6.8, mn:19},
  "ndogpassi-jardin":                          {km:7.0, mn:20},
  "ndogpassi-1er entre borne 10":              {km:7.0, mn:20},
  "ndopassi-saint-nicolas":                    {km:6.5, mn:18},
  "saint nicolas ndogpassi":                   {km:6.5, mn:18},
  "sonel  ndogpassi":                          {km:6.5, mn:18},
  "quebec ndogpassi":                          {km:6.8, mn:19},
  "ndogpassi-quebec":                          {km:6.8, mn:19},
  "ndogpassi-champs d'ananas":                 {km:6.5, mn:18},
  "kotto bloc":                                {km:7.0, mn:20},
  "kotto chefferie":                           {km:7.5, mn:21},
  "kotto imeubles":                            {km:7.0, mn:20},
  "kotto mbangue college sofron":              {km:6.5, mn:18},
  "kotto mbangue-derriere petit voltaire":     {km:6.5, mn:18},
  "cheffrie kotto village":                    {km:7.5, mn:21},
  "kotto -village au lac":                     {km:10.0, mn:26},
  "logpom bassong":                            {km:5.0, mn:15},
  "logpom camara laye":                        {km:5.2, mn:15},
  "logpom montana city":                       {km:5.5, mn:16},
  "logpom hopital des soeur":                  {km:5.0, mn:15},
  "logpom college le nil":                     {km:5.3, mn:15},
  "logpom carrefour andem william":            {km:5.4, mn:16},
  "logpom njoya maison blanche":               {km:5.5, mn:16},
  "logbaba":                                   {km:5.0, mn:15},
  "ndogbati":                                  {km:3.5, mn:11},
  "ndogbassi":                                 {km:6.0, mn:17},
  "mbangue":                                   {km:6.0, mn:17},
  "barcelone":                                 {km:4.5, mn:13},
  "bilongue":                                  {km:5.5, mn:16},
  "saint michel":                              {km:3.5, mn:11},
  "saint thomas":                              {km:5.0, mn:15},
  // Bonaberi
  "bonaberi  tropicana":                       {km:7.5, mn:21},
  "bonaberi - apicam":                         {km:9.5, mn:26},
  "bonaberi - babenga - supermont":            {km:8.5, mn:23},
  "bonaberi - bondjongo jusqu'au agrochem":    {km:10.0, mn:27},
  "bonaberi - garage americain":               {km:9.5, mn:26},
  "bonaberi - stade dikolo":                   {km:6.5, mn:18},
  "bonaberi - zone industrielle":              {km:9.0, mn:25},
  "bonaberi -mabanda applicam":                {km:8.5, mn:23},
  "bonaberi 4 etages":                         {km:8.0, mn:22},
  "bonaberi bonandale petit paris":            {km:8.5, mn:23},
  "bonaberi centre equestre - garage americain":{km:9.0, mn:24},
  "bonaberi chateau":                          {km:8.0, mn:22},
  "bonaberi ferme suisse":                     {km:10.0, mn:28},
  "bonaberi grand baobab nouvelle rue en pave":{km:8.5, mn:23},
  "bonaberi total ndobo":                      {km:14.0, mn:38},
  "bonaberi-bekoko":                           {km:13.0, mn:35},
  "bonaberi-carrefour mutzic":                 {km:9.0, mn:24},
  "bonaberi-carrefour sapeur":                 {km:7.5, mn:21},
  "bonaberi-chefferie":                        {km:7.0, mn:20},
  "bonaberi-cibec":                            {km:12.0, mn:33},
  "bonaberi-derriere royal palace":            {km:8.0, mn:22},
  "bonaberi-direction des impots":             {km:8.0, mn:22},
  "bonaberi-ecole primaire roseraie":          {km:8.5, mn:23},
  "bonaberi-ecole publique groupe 1":          {km:8.0, mn:22},
  "bonaberi-ecole publique groupe 2":          {km:8.2, mn:22},
  "bonaberi-eglise uebc fin goudron":          {km:9.0, mn:24},
  "bonaberi-fin goudron teranova":             {km:9.5, mn:25},
  "bonaberi-grand baobab rue en paves":        {km:8.5, mn:23},
  "bonaberi-mabanda":                          {km:8.5, mn:23},
  "bonaberi-petit marche":                     {km:7.5, mn:20},
  "bonaberi-petit pont besse9ke":              {km:7.0, mn:19},
  "grand baobab":                              {km:8.5, mn:23},
  "bonamatoumbe":                              {km:7.5, mn:20},
  "centre equestre - dikolo village":          {km:7.0, mn:19},
  "stade dikolo":                              {km:6.5, mn:18},
  "dikolo -bonaberi":                          {km:6.5, mn:18},
  "bonedale":                                  {km:7.2, mn:20},
  "bonedale- abattoire":                       {km:7.5, mn:21},
  "bonedale- antenne orange":                  {km:7.3, mn:20},
  "bonedale- carrefour sergeo polo":           {km:7.2, mn:20},
  "bonedale- gendarmerie":                     {km:7.5, mn:21},
  "ngwelle -internat morther thereza":         {km:8.0, mn:22},
  "ngwelle- centre d'etat civil":              {km:8.0, mn:22},
  "mabanda":                                   {km:8.5, mn:23},
  "ndobo dans le quartier":                    {km:11.0, mn:30},
  "ndobo en route":                            {km:10.5, mn:28},
  "grand toh ndobo":                           {km:12.5, mn:34},
  "grand-toh  ndobo":                          {km:12.5, mn:34},
  "ecole leta ndobo  grand toh":               {km:12.0, mn:32},
  "sodiko village":                            {km:9.0, mn:23},
  // Airport / PK
  "aeroport international de douala":          {km:10.0, mn:25},
  "texaco aeroport":                           {km:10.5, mn:26},
  "fret aeroport de douala":                   {km:10.5, mn:26},
  "pk8 - bellavie - la roche":                 {km:7.0, mn:18},
  "pk 8 - entre la efc":                       {km:7.0, mn:18},
  "pk8 - entre eglise catholique et l'interieur":{km:7.2, mn:19},
  "pk8 - esg - renovation":                    {km:7.0, mn:18},
  "pk9 cogefar - bao":                         {km:8.0, mn:20},
  "pk 10 - genie militaire":                   {km:9.0, mn:23},
  "pk 10 colonel ndi - soeur dominicaine":     {km:9.2, mn:23},
  "pk 10 marche  pk12 entree lycee":           {km:9.5, mn:24},
  "pk 11 - bengue city":                       {km:10.0, mn:25},
  "pk 11 - saint louis":                       {km:10.0, mn:25},
  "pk 11 entree marie claire":                 {km:10.2, mn:26},
  "pk 12 - camp des officiers":                {km:11.5, mn:29},
  "pk 12 - kindo":                             {km:11.0, mn:28},
  "pk 12 - marche":                            {km:11.0, mn:28},
  "pk 12 - ngo ndjo futura":                   {km:11.5, mn:29},
  "pk 12 - ngo njoh 2 soudeurs":               {km:11.2, mn:28},
  "pk 12 - quartier bamoun - lycee ndoghem":   {km:11.0, mn:28},
  "pk 12 jardien paradisiaque":                {km:11.0, mn:28},
  "pk 12 lycee -vers cahette bar":             {km:11.5, mn:29},
  "pk 12 mandjap":                             {km:11.0, mn:28},
  "pk 13 bonamoutongo":                        {km:12.0, mn:30},
  "pk 13 commissariat":                        {km:12.0, mn:30},
  "pk 14 - papas - zone g":                    {km:13.0, mn:33},
  "pk 15 pk 17":                               {km:15.0, mn:38},
  "pk 17 vers chez le masseur":                {km:16.0, mn:40},
  "pk 18 pk19":                                {km:17.0, mn:43},
  "pk 21 - mangoule":                          {km:20.0, mn:50},
  "pk 21 - massoumbou":                        {km:20.0, mn:50},
  "pk 21 - pk 30":                             {km:25.0, mn:60},
  "pk12 pk 14 dans le quartier":               {km:12.0, mn:30},
  "zone industrielle bassa":                   {km:8.0, mn:20},
  "japoma rail village roger milla":           {km:13.5, mn:33},
  // Japoma / East
  "hopital de japoma":                         {km:15.0, mn:38},
  "japoma  carrefour lycee":                   {km:14.0, mn:35},
  "japouma carrefour grand bar":               {km:14.5, mn:36},
  "japouma carrefour matango":                 {km:13.5, mn:34},
  "japouma stade":                             {km:14.0, mn:35},
  "nyalla pariso - nkol mbong":                {km:13.0, mn:33},
  "nyalla quartie awoussa jusqu'au chateau":   {km:13.0, mn:33},
  "yassa non loin de la route":                {km:12.0, mn:30},
  "yassa plus de 1 km de la route":            {km:13.0, mn:33},
  "bojongo apres le marche":                   {km:11.0, mn:28},
  "bojongo derriere le lycee":                 {km:11.5, mn:29},
  "yatika derriere ecole":                     {km:12.5, mn:32},
  "yatika ucac":                               {km:12.5, mn:32},
  "ngodi bakoko carrefour ari":                {km:11.0, mn:28},
  "ngodi bakoko champ de tir":                 {km:11.5, mn:29},
  "ngodi bakoko cimetiere":                    {km:12.0, mn:30},
  "ngodi bakoko eniet et environs":            {km:11.0, mn:28},
  "ngodi bakoko lycee":                        {km:11.5, mn:29},
  "village saint nicolas":                     {km:10.0, mn:26},
  "village chefferie":                         {km:10.5, mn:27},
  "village -moko":                             {km:11.0, mn:28},
  "village quifferou - entre bille":           {km:12.0, mn:30},
  // Outer North / Dibamba
  "bonassama":                                 {km:8.5, mn:22},
  "bonassama carrefour  du marche":            {km:8.5, mn:22},
  "beedi - boulangerie saker":                 {km:9.0, mn:24},
  "beedi - haute tension":                     {km:8.8, mn:23},
  "beedi - marche":                            {km:9.0, mn:24},
  "beedi plateau":                             {km:9.5, mn:25},
  "malangue":                                  {km:13.0, mn:33},
  "grand mall bonadiwoto":                     {km:11.0, mn:28},
  "elf village":                               {km:14.0, mn:35},
  "mbanga bakoko":                             {km:18.0, mn:45},
  "mbouan mbanga bakoko":                      {km:18.0, mn:45},
  "mbanga pongo":                              {km:20.0, mn:50},
  "mbanga pongo petit robert":                 {km:20.5, mn:52},
  "bwang bakoko":                              {km:22.0, mn:55},
  "gwang bakoko":                              {km:22.0, mn:55},
  "dimbamba":                                  {km:19.0, mn:48},
  "leproserie de dibamba":                     {km:21.0, mn:53},
  "yansoki ucac":                              {km:14.5, mn:37},
  "nouvelle route":                            {km:8.0, mn:20},
  "messa presse zone portuaire":               {km:2.5, mn:8},
};

function calcFare(km, mn) {
    if (km <= 1.8 && mn <= 5) return 430;
    const f = 430 + Math.max(0, (km - 1.8)) * 90 + Math.max(0, (mn - 5)) * 25;
    return Math.ceil(f / 50) * 50;
}

function normalise(str) {
    return str.toLowerCase()
              .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
              .replace(/\s+/g, ' ').trim();
}

function getFareForName(name) {
    const key = normalise(name);
    if (FARES[key]) return FARES[key];
    for (const [k, v] of Object.entries(FARES)) {
        if (key.includes(k) || k.includes(key)) return v;
    }
    return null;
}

/* ═══════════════ DOM READY ═══════════════ */
$(document).ready(function () {
    $('.ch').chosen({ width: '100%' });

    /* ── Auto-fare on destination change ── */
    $('#destination_address_id').on('change', function () {
        const selectedOption = $(this).find('option:selected');
        const name = selectedOption.data('name') || selectedOption.text();
        const feeBox  = $('#fee-box');
        const feeInput = $('#fee');
        const hint    = $('#fee-hint');

        if (!name || name.startsWith('—')) {
            feeInput.val('');
            feeBox.removeClass('has-value');
            hint.removeClass('visible');
            return;
        }

        const data = getFareForName(name);
        if (data) {
            const fare = calcFare(data.km, data.mn);
            feeInput.val(fare);
            feeBox.addClass('has-value');
            hint.text('~' + data.km.toFixed(1) + ' km · ~' + data.mn + ' min from Akwa Soudanaise').addClass('visible');
        } else {
            feeInput.val('');
            feeBox.removeClass('has-value');
            hint.text('Quarter not in fare table — enter manually').addClass('visible');
        }
    });

    $('#destination_address_id').on('chosen:updated', function () {
        $(this).trigger('change');
    });

    /* ── Toggle delivery man selector ── */
    let driverSelectOpen = false;

    $('#toggle-driver-btn').on('click', function () {
        driverSelectOpen = !driverSelectOpen;

        if (driverSelectOpen) {
            // Show dropdown, disable hidden input so only select submits
            $('#driver-select-wrap').slideDown(180);
            $('#driver-hidden').prop('disabled', true);
            $('#driver-select').prop('disabled', false);
            $(this).text('✕ Cancel');
        } else {
            // Restore chip to selected value, re-enable hidden input
            $('#driver-select-wrap').slideUp(180);
            $('#driver-hidden').prop('disabled', false);
            $('#driver-select').prop('disabled', true);
            $(this).text('✎ Change');

            // Restore chip to whatever hidden value is
            const hiddenVal = $('#driver-hidden').val();
            const selOption = $('#driver-select').find('option[value="' + hiddenVal + '"]');
            if (selOption.length) {
                const name = selOption.data('name') || selOption.text().split('(')[0].trim();
                $('#driver-name').text(name);
                $('#driver-avatar').text(name.charAt(0).toUpperCase());
            }
        }
    });

    // When user picks a driver from the dropdown, update chip preview & hidden field
    $('#driver-select').on('change', function () {
        const opt     = $(this).find('option:selected');
        const name    = opt.data('name') || opt.text().split('(')[0].trim();
        const pending = opt.data('pending') ?? 0;

        $('#driver-name').text(name);
        $('#driver-avatar').text(name.charAt(0).toUpperCase());
        $('#driver-hidden').val(opt.val());
        // Update pending count in chip-sub
        $('#driver-chip .chip-sub').text(pending + ' pending deliveries');
    });

    // Start with dropdown disabled (chip mode)
    $('#driver-select').prop('disabled', true);
});
</script>
</body>
</html>
