<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PopDelivery</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --blue:     rgba(3,3,270,0.85);
            --blue-dk:  rgba(8,18,131,1);
            --blue-lt:  rgba(3,3,270,0.08);
            --black:    #0a0a0a;
            --grey-bg:  #f4f5f8;
            --white:    #ffffff;
            --text-muted: #6b7280;
            --radius-sm: 10px;
            --radius-md: 18px;
            --radius-lg: 28px;
            --shadow-sm: 0 2px 12px rgba(0,0,0,0.07);
            --shadow-md: 0 8px 30px rgba(0,0,0,0.10);
            --shadow-lg: 0 20px 60px rgba(0,0,0,0.15);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--grey-bg);
            color: var(--black);
            margin-top: 72px;
        }

        /* ============================================================
           HEADER
        ============================================================ */
        .header {
            position: fixed;
            top: 0; left: 0; right: 0;
            height: 72px;
            background: rgba(255,255,255,0.97);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0,0,0,0.06);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            z-index: 999;
        }

        /* Logo block */
        .header-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }
        .header-brand img {
            width: 44px;
            height: 44px;
            object-fit: cover;
            border-radius: 10px;
        }
        .header-brand-name {
            font-size: 18px;
            font-weight: 700;
            color: var(--blue);
            letter-spacing: -0.3px;
        }
        .header-brand-name span { color: var(--black); }

        /* Nav */
        .header-nav {
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .nav-link {
            padding: 8px 18px;
            font-size: 14px;
            font-weight: 500;
            color: #444;
            border-radius: 50px;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
            text-decoration: none;
            border: none;
            background: none;
            font-family: 'Poppins', sans-serif;
        }
        .nav-link:hover, .nav-link.active {
            background: var(--blue-lt);
            color: var(--blue);
        }

        /* Header CTA buttons */
        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .btn-outline {
            padding: 9px 20px;
            font-size: 13px;
            font-weight: 600;
            border: 1.5px solid rgba(0,0,0,0.75);
            border-radius: 50px;
            background: transparent;
            color: var(--black);
            cursor: pointer;
            transition: 0.25s;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
        }
        .btn-outline:hover { background: var(--black); color: var(--white); }

        .btn-solid {
            padding: 9px 22px;
            font-size: 13px;
            font-weight: 600;
            border: 1.5px solid var(--blue);
            border-radius: 50px;
            background: var(--blue);
            color: var(--white);
            cursor: pointer;
            transition: 0.25s;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
        }
        .btn-solid:hover { background: var(--blue-dk); border-color: var(--blue-dk); }

        /* Auth info */
        .auth-logout-form {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .auth-logout-form button {
            padding: 9px 18px;
            font-size: 13px;
            font-weight: 600;
            border: 1.5px solid #e5e7eb;
            border-radius: 50px;
            background: transparent;
            color: #444;
            cursor: pointer;
            transition: 0.25s;
            font-family: 'Poppins', sans-serif;
        }
        .auth-logout-form button:hover { border-color: red; color: red; }

        /* Hamburger */
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 5px;
            padding: 6px;
        }
        .hamburger span {
            display: block;
            width: 24px;
            height: 2px;
            background: #333;
            border-radius: 2px;
            transition: 0.3s;
        }
        .nav-open .hamburger span:nth-child(1) { transform: rotate(45deg) translate(5px,5px); }
        .nav-open .hamburger span:nth-child(2) { opacity: 0; }
        .nav-open .hamburger span:nth-child(3) { transform: rotate(-45deg) translate(5px,-5px); }

        @media (max-width: 900px) {
            .header { padding: 0 20px; }
            .hamburger { display: flex; }
            .header-nav, .header-actions { display: none; }
            /* Mobile dropdown */
            .header-mobile-menu {
                display: none;
                position: absolute;
                top: 72px;
                left: 0; right: 0;
                background: var(--white);
                border-bottom: 1px solid rgba(0,0,0,0.06);
                flex-direction: column;
                padding: 16px 24px 24px;
                gap: 8px;
                box-shadow: var(--shadow-md);
                z-index: 998;
            }
            .header-mobile-menu.open { display: flex; }
            .header-mobile-menu .nav-link { display: block; text-align: left; }
            .header-mobile-menu .btn-outline,
            .header-mobile-menu .btn-solid { display: block; text-align: center; margin-top: 4px; }
        }

        /* ============================================================
           HERO
        ============================================================ */
        .hero {
            position: relative;
            min-height: 620px;
            background-image: url('/images/new.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(105deg, rgba(8,18,131,0.18) 0%, rgba(3,3,200,0.08) 60%, transparent 100%);
        }
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 680px;
            margin-left: clamp(30px, 12vw, 180px);
            padding: 80px 20px;
        }
        .hero-eyebrow {
            display: inline-block;
            background: rgba(255,255,255,0.85);
            color: var(--blue);
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 6px 16px;
            border-radius: 50px;
            margin-bottom: 22px;
        }
        .hero-title {
            font-size: clamp(38px, 6.5vw, 84px);
            font-weight: 800;
            line-height: 1.06;
            color: var(--black);
            letter-spacing: -1.5px;
            margin-bottom: 20px;
        }
        .hero-title em { font-style: normal; color: var(--blue); }
        .hero-sub {
            font-size: clamp(15px, 2vw, 20px);
            font-weight: 300;
            color: rgba(10,10,10,0.75);
            margin-bottom: 36px;
            line-height: 1.6;
        }
        .hero-btns { display: flex; flex-wrap: wrap; gap: 12px; }
        .hero-btn-primary {
            padding: 14px 28px;
            font-size: 13px;
            font-weight: 700;
            background: var(--blue);
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            letter-spacing: 0.5px;
            transition: 0.25s;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
        }
        .hero-btn-primary:hover { background: var(--blue-dk); }
        .hero-btn-ghost {
            padding: 14px 28px;
            font-size: 13px;
            font-weight: 700;
            background: rgba(255,255,255,0.9);
            color: var(--black);
            border: 1.5px solid rgba(0,0,0,0.7);
            border-radius: 50px;
            cursor: pointer;
            letter-spacing: 0.5px;
            transition: 0.25s;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
        }
        .hero-btn-ghost:hover { background: var(--black); color: white; border-color: var(--black); }

        @media (max-width: 768px) {
            .hero-content { margin-left: 24px; padding: 60px 16px; }
            .hero-btns { flex-direction: column; }
        }

        /* ============================================================
           SERVICES CARDS
        ============================================================ */
        .services-wrap {
            max-width: 1200px;
            margin: -80px auto 80px;
            padding: 0 24px;
            position: relative;
            z-index: 3;
        }
        .services-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 40px 36px;
            box-shadow: var(--shadow-lg);
        }
        .section-label {
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--blue);
            margin-bottom: 10px;
        }
        .section-title {
            font-size: clamp(22px, 4vw, 40px);
            font-weight: 800;
            margin-bottom: 36px;
            letter-spacing: -0.5px;
        }
        .services-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        .svc-box {
            background: var(--grey-bg);
            border-radius: var(--radius-md);
            padding: 28px 20px;
            text-align: center;
            transition: 0.35s cubic-bezier(.4,0,.2,1);
            cursor: pointer;
            border: 1.5px solid transparent;
        }
        .svc-box:hover {
            background: var(--black);
            color: white;
            border-color: var(--black);
            transform: translateY(-6px);
            box-shadow: var(--shadow-md);
        }
        .svc-box img { width: 100px; height: 100px; object-fit: cover; margin-bottom: 16px; }
        .svc-title { font-weight: 700; font-size: 15px; margin-bottom: 8px; }
        .svc-desc { font-size: 13px; color: var(--text-muted); line-height: 1.5; }
        .svc-box:hover .svc-desc { color: rgba(255,255,255,0.7); }

        @media (max-width: 900px) { .services-grid { grid-template-columns: 1fr 1fr; } }
        @media (max-width: 500px) { .services-grid { grid-template-columns: 1fr; } }

        /* ============================================================
           COUNTERS
        ============================================================ */
        .counter-all {
            background: linear-gradient(135deg, var(--blue-dk) 0%, var(--blue) 100%);
            padding: 70px 20px;
        }
        .counter-inner {
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
        }
        .counter-headline {
            font-size: clamp(22px, 3.5vw, 36px);
            font-weight: 700;
            color: white;
            margin-bottom: 56px;
            letter-spacing: -0.3px;
        }
        .counter-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0;
        }
        .counter-item {
            padding: 10px 20px;
            position: relative;
        }
        .counter-item:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0; top: 10%; bottom: 10%;
            width: 1px;
            background: rgba(255,255,255,0.25);
        }
        .counter-num {
            font-size: clamp(40px, 5vw, 64px);
            font-weight: 800;
            color: white;
            letter-spacing: -2px;
            line-height: 1;
            margin-bottom: 10px;
        }
        .counter-label {
            font-size: 13px;
            font-weight: 500;
            color: rgba(255,255,255,0.7);
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        @media (max-width: 700px) {
            .counter-grid { grid-template-columns: 1fr 1fr; gap: 30px; }
            .counter-item::after { display: none; }
        }
        @media (max-width: 400px) {
            .counter-grid { grid-template-columns: 1fr; }
        }

        /* ============================================================
           BENTO GRID
        ============================================================ */
        .bento-section {
            max-width: 1200px;
            margin: 90px auto;
            padding: 0 24px;
        }
        .bento-header {
            text-align: center;
            margin-bottom: 48px;
        }
        .bento-header .section-title { margin-bottom: 12px; }
        .bento-header p { color: var(--text-muted); font-size: 15px; max-width: 500px; margin: 0 auto; }

        .bento-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            grid-template-rows: auto;
            gap: 18px;
        }

        /* Card spans */
        .bc-1 { grid-column: span 4; grid-row: span 2; }
        .bc-2 { grid-column: span 8; grid-row: span 1; }
        .bc-3 { grid-column: span 4; grid-row: span 1; }
        .bc-4 { grid-column: span 4; grid-row: span 2; }
        .bc-5 { grid-column: span 4; grid-row: span 1; }
        .bc-6 { grid-column: span 4; grid-row: span 1; }

        .bento-card {
            background: var(--white);
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            display: flex;
            flex-direction: column;
            transition: box-shadow 0.3s, transform 0.3s;
            min-height: 220px;
        }
        .bento-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-3px);
        }

        /* Card internals */
        .bento-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        .bento-img-wrap {
            flex: 1;
            overflow: hidden;
            min-height: 140px;
        }
        .bento-body {
            padding: 22px 24px;
        }
        .bento-tag {
            display: inline-block;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--blue);
            background: var(--blue-lt);
            padding: 4px 10px;
            border-radius: 50px;
            margin-bottom: 10px;
        }
        .bento-title {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 8px;
            letter-spacing: -0.3px;
            line-height: 1.3;
        }
        .bento-desc {
            font-size: 13px;
            color: var(--text-muted);
            line-height: 1.6;
        }

        /* Card 1: tall — image top, text bottom */
        .bc-1 .bento-img-wrap { min-height: 200px; }

        /* Card 2: wide — side-by-side */
        .bc-2 { flex-direction: row; align-items: stretch; }
        .bc-2 .bento-body { flex: 1; display: flex; flex-direction: column; justify-content: center; padding: 32px; }
        .bc-2 .bento-img-wrap { width: 38%; min-height: unset; }

        /* Card 4: tall — image bottom */
        .bc-4 .bento-img-wrap { order: 2; min-height: 200px; }
        .bc-4 .bento-body { order: 1; }

        /* Cards 5,6: compact */
        .bc-5, .bc-6 { flex-direction: row; align-items: center; }
        .bc-5 .bento-img-wrap, .bc-6 .bento-img-wrap { width: 38%; min-height: 140px; }
        .bc-5 .bento-body, .bc-6 .bento-body { flex: 1; padding: 20px 22px; }
        .bc-5 .bento-img-wrap { border-radius: 0 0 0 var(--radius-md); }

        /* Card 3: accent color */
        .bc-3 {
            background: linear-gradient(135deg, var(--blue) 0%, var(--blue-dk) 100%);
            color: white;
        }
        .bc-3 .bento-body { height: 100%; display: flex; flex-direction: column; justify-content: center; }
        .bc-3 .bento-tag { background: rgba(255,255,255,0.15); color: white; }
        .bc-3 .bento-title { font-size: 22px; color: white; }
        .bc-3 .bento-desc { color: rgba(255,255,255,0.75); font-size: 14px; }

        @media (max-width: 960px) {
            .bento-grid { grid-template-columns: 1fr 1fr; }
            .bc-1, .bc-2, .bc-3, .bc-4, .bc-5, .bc-6 {
                grid-column: span 1;
                grid-row: span 1;
            }
            .bc-2 { flex-direction: column; }
            .bc-2 .bento-img-wrap { width: 100%; min-height: 180px; }
        }
        @media (max-width: 600px) {
            .bento-grid { grid-template-columns: 1fr; }
            .bc-5, .bc-6 { flex-direction: column; }
            .bc-5 .bento-img-wrap, .bc-6 .bento-img-wrap { width: 100%; min-height: 160px; }
        }

        /* ============================================================
           HOW TO BECOME A DELIVERY DRIVER
        ============================================================ */
        .driver-section {
            max-width: 1200px;
            margin: 0 auto 100px;
            padding: 0 24px;
        }
        .driver-wrap {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        /* Left: visual */
        .driver-visual {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 480px;
        }
        .driver-blob {
            position: absolute;
            width: 85%;
            height: 85%;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 42% 56% 72% 28% / 42% 42% 56% 48%;
            background: linear-gradient(135deg, var(--blue) 0%, var(--blue-dk) 100%);
            animation: morphBlob 4s ease-in-out infinite;
            z-index: 0;
        }
        @keyframes morphBlob {
            0%,100% { border-radius: 42% 56% 72% 28% / 42% 42% 56% 48%; }
            33%      { border-radius: 72% 28% 48% 48% / 28% 28% 72% 72%; }
            66%      { border-radius: 100% 56% 56% 100% / 100% 100% 56% 56%; }
        }
        .driver-img {
            position: relative;
            z-index: 2;
            width: 58%;
            border-radius: var(--radius-md);
            object-fit: cover;
            aspect-ratio: 4/5;
        }

        /* Floating badges */
        .driver-badge {
            position: absolute;
            background: var(--white);
            border-radius: var(--radius-sm);
            box-shadow: var(--shadow-md);
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            z-index: 10;
        }
        .driver-badge-icon { font-size: 26px; }
        .driver-badge-text { font-size: 12px; font-weight: 600; line-height: 1.3; }
        .driver-badge-text span { display: block; font-size: 18px; font-weight: 800; color: var(--blue); }

        .badge-top { top: 10%; left: -2%; animation: floatY 2s ease-in-out infinite; }
        .badge-bottom { bottom: 12%; right: -4%; animation: floatX 2s ease-in-out infinite; }
        .badge-corner { top: 12%; right: -2%; background: var(--black); color: white; animation: floatY 2.5s ease-in-out infinite reverse; }
        .badge-corner .driver-badge-text { color: white; }
        .badge-corner .driver-badge-text span { color: white; }

        @keyframes floatY { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-14px); } }
        @keyframes floatX { 0%,100% { transform: translateX(0); } 50% { transform: translateX(14px); } }

        /* Right: content */
        .driver-content {}
        .driver-content .section-label { margin-bottom: 8px; }
        .driver-content .section-title { margin-bottom: 18px; }
        .driver-lead {
            font-size: 15px;
            color: var(--text-muted);
            margin-bottom: 32px;
            line-height: 1.7;
        }
        .driver-steps { display: flex; flex-direction: column; gap: 0; }
        .driver-step {
            display: flex;
            gap: 20px;
            padding: 22px 0;
            border-bottom: 1px solid rgba(0,0,0,0.07);
        }
        .driver-step:last-child { border-bottom: none; }
        .step-num {
            flex-shrink: 0;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: var(--blue-lt);
            color: var(--blue);
            font-weight: 800;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .step-body {}
        .step-title { font-weight: 700; font-size: 15px; margin-bottom: 5px; }
        .step-desc { font-size: 13px; color: var(--text-muted); line-height: 1.6; }

        @media (max-width: 860px) {
            .driver-wrap { grid-template-columns: 1fr; gap: 40px; }
            .driver-visual { min-height: 340px; order: 2; }
            .driver-content { order: 1; }
        }

        /* ============================================================
           FAQ
        ============================================================ */
        .faq-section {
            background: var(--black);
            padding: 90px 24px;
        }
        .faq-inner {
            max-width: 860px;
            margin: 0 auto;
        }
        .faq-header {
            margin-bottom: 56px;
        }
        .faq-header .section-label { color: rgba(255,255,255,0.5); }
        .faq-header .section-title {
            font-size: clamp(30px, 5vw, 56px);
            color: white;
            letter-spacing: -1px;
            margin-bottom: 0;
        }

        .faq-list { display: flex; flex-direction: column; gap: 0; }
        .faq-item {
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .faq-item:first-child { border-top: 1px solid rgba(255,255,255,0.1); }

        .faq-question {
            width: 100%;
            background: none;
            border: none;
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 600;
            padding: 24px 0;
            text-align: left;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            transition: color 0.2s;
        }
        .faq-question:hover { color: rgba(3,3,200,0.9); }
        .faq-icon {
            flex-shrink: 0;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 1.5px solid rgba(255,255,255,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: rgba(255,255,255,0.7);
            transition: 0.3s;
        }
        .faq-item.open .faq-icon {
            background: var(--blue);
            border-color: var(--blue);
            color: white;
            transform: rotate(45deg);
        }
        .faq-answer {
            overflow: hidden;
            max-height: 0;
            transition: max-height 0.4s ease, padding 0.3s ease;
        }
        .faq-answer-inner {
            padding: 0 0 24px;
            font-size: 14px;
            color: rgba(255,255,255,0.6);
            line-height: 1.8;
        }

        /* ============================================================
           REVIEWS SLIDER
        ============================================================ */
        .slider-section { padding: 70px 0; background: var(--grey-bg); overflow: hidden; }
        .slider-heading {
            text-align: center;
            font-size: clamp(22px, 3.5vw, 36px);
            font-weight: 700;
            margin-bottom: 40px;
            letter-spacing: -0.5px;
        }
        .slider-track-wrap {
            overflow: hidden;
            position: relative;
        }
        .slider-track-wrap::before,
        .slider-track-wrap::after {
            content: '';
            position: absolute;
            top: 0; bottom: 0;
            width: 80px;
            z-index: 2;
            pointer-events: none;
        }
        .slider-track-wrap::before { left: 0; background: linear-gradient(to right, var(--grey-bg), transparent); }
        .slider-track-wrap::after  { right: 0; background: linear-gradient(to left, var(--grey-bg), transparent); }

        .slide-track {
            display: flex;
            width: max-content;
            animation: scroll 40s linear infinite;
            gap: 20px;
            padding: 10px 0;
        }
        .slide-track:hover { animation-play-state: paused; }
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .review-card {
            width: 340px;
            background: var(--white);
            border-radius: var(--radius-md);
            padding: 24px;
            box-shadow: var(--shadow-sm);
            flex-shrink: 0;
        }
        .review-stars { font-size: 14px; color: #f59e0b; margin-bottom: 12px; }
        .review-text {
            font-size: 13px;
            color: #555;
            line-height: 1.7;
            font-style: italic;
            margin-bottom: 16px;
        }
        .review-footer {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: var(--text-muted);
        }
        .review-name { font-weight: 600; color: var(--black); }

        /* ============================================================
           FOOTER
        ============================================================ */
        .site-footer {
            background: var(--white);
            font-family: 'Poppins', sans-serif;
        }

        .footer-cta-wrap {
            padding: 0 40px;
        }
        .footer-cta {
            background: linear-gradient(135deg, var(--blue) 0%, var(--blue-dk) 100%);
            border-radius: var(--radius-lg);
            padding: 50px 64px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transform: translateY(-56px);
            color: white;
            flex-wrap: wrap;
            gap: 24px;
            box-shadow: 0 20px 50px rgba(3,3,200,0.3);
        }
        .footer-cta-text h2 {
            font-size: clamp(20px, 3vw, 30px);
            font-weight: 700;
            margin-bottom: 6px;
        }
        .footer-cta-text p { font-size: 14px; opacity: 0.75; }
        .footer-cta-btn {
            padding: 14px 32px;
            font-size: 14px;
            font-weight: 700;
            border: 2px solid white;
            border-radius: 50px;
            background: transparent;
            color: white;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            transition: 0.25s;
            white-space: nowrap;
        }
        .footer-cta-btn:hover { background: white; color: var(--blue); }

        .footer-main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px 60px;
            display: grid;
            grid-template-columns: 2.2fr 1fr 1fr 1.3fr;
            gap: 48px;
        }
        .footer-brand-logo {
            font-size: 24px;
            font-weight: 800;
            color: var(--blue);
            margin-bottom: 16px;
            letter-spacing: -0.5px;
        }
        .footer-brand-logo span { color: var(--black); }
        .footer-brand-desc {
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.7;
            margin-bottom: 24px;
            max-width: 280px;
        }

        /* Social icons */
        .social-row { display: flex; gap: 10px; }
        .social-btn {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            border: 1.5px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #555;
            transition: 0.25s;
            cursor: pointer;
            background: none;
            text-decoration: none;
        }
        .social-btn svg { width: 16px; height: 16px; fill: currentColor; }
        .social-btn:hover { background: var(--blue); border-color: var(--blue); color: white; }

        .footer-col-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--black);
            margin-bottom: 22px;
        }
        .footer-col-link {
            display: block;
            font-size: 14px;
            color: var(--text-muted);
            text-decoration: none;
            margin-bottom: 12px;
            transition: 0.2s;
        }
        .footer-col-link:hover { color: var(--blue); padding-left: 4px; }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 14px;
            font-size: 14px;
            color: var(--text-muted);
        }
        .contact-icon {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
            margin-top: 2px;
            color: var(--blue);
        }
        .contact-icon svg { width: 100%; height: 100%; fill: currentColor; }

        .footer-bottom {
            max-width: 1200px;
            margin: 0 auto;
            padding: 24px 40px;
            border-top: 1px solid #f0f0f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            font-size: 13px;
            color: var(--text-muted);
        }
        .footer-legal a {
            color: var(--text-muted);
            text-decoration: none;
            margin-left: 20px;
            transition: color 0.2s;
        }
        .footer-legal a:hover { color: var(--blue); }

        /* WhatsApp FAB */
        .whatsapp-fab {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: #25d366;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            text-decoration: none;
            box-shadow: 0 4px 20px rgba(37,211,102,0.45);
            transition: transform 0.25s;
        }
        .whatsapp-fab:hover { transform: scale(1.1); }
        .whatsapp-fab svg { width: 28px; height: 28px; fill: white; }

        @media (max-width: 900px) {
            .footer-cta-wrap { padding: 0 20px; }
            .footer-cta { padding: 36px 32px; flex-direction: column; text-align: center; }
            .footer-main { grid-template-columns: 1fr 1fr; padding: 0 20px 40px; }
        }
        @media (max-width: 550px) {
            .footer-main { grid-template-columns: 1fr; }
            .footer-bottom { flex-direction: column; text-align: center; }
            .footer-legal a { margin: 0 10px; }
        }
    </style>
</head>
<body>

    <!-- ==================== HEADER ==================== -->
    <header class="header" id="mainHeader">
        <a class="header-brand" href="{{ route('landing.page.home') }}">
            <img src="{{ url('/icons/bik4.png') }}" alt="PopDelivery logo">
            <span class="header-brand-name">Pop<span>Delivery</span></span>
        </a>

        <!-- Desktop nav -->
        <nav class="header-nav">
            <a href="{{ route('landing.page.home') }}" class="nav-link active">Home</a>
            <a href="#services" class="nav-link">Services</a>
            <a href="#features" class="nav-link">Features</a>
            <a href="#how-it-works" class="nav-link">How It Works</a>
            <a href="#faq" class="nav-link">FAQ</a>
        </nav>

        <!-- Desktop actions -->
        <div class="header-actions">
            @if(Auth::guard('deliveryMan')->check())
                <a href="{{ route('deliveryMan.myDeliveries') }}" class="btn-outline">My Deliveries</a>
                <form method="POST" action="{{ route('logout') }}" class="auth-logout-form">
                    @csrf
                    <button type="submit">Logout ({{ Auth::guard('deliveryMan')->user()->name }})</button>
                </form>
            @elseif(Auth::guard('customer')->check())
                <a href="{{ route('customer.schedule') }}" class="btn-solid">Schedule</a>
                <form method="POST" action="{{ route('logout') }}" class="auth-logout-form">
                    @csrf
                    <button type="submit">Logout ({{ Auth::guard('customer')->user()->name }})</button>
                </form>
            @else
                <a href="{{ route('customer.login') }}" class="btn-outline">Log In</a>
                <a href="{{ route('login') }}" class="btn-solid">Get Started</a>
            @endif
        </div>

        <!-- Hamburger -->
        <div class="hamburger" onclick="toggleNav()" id="hamburgerBtn">
            <span></span><span></span><span></span>
        </div>
    </header>

    <!-- Mobile dropdown -->
    <div class="header-mobile-menu" id="mobileMenu">
        <a href="{{ route('landing.page.home') }}" class="nav-link">Home</a>
        <a href="#services" class="nav-link">Services</a>
        <a href="#features" class="nav-link">Features</a>
        <a href="#how-it-works" class="nav-link">How It Works</a>
        <a href="#faq" class="nav-link">FAQ</a>
        @if(Auth::guard('deliveryMan')->check())
            <a href="{{ route('deliveryMan.myDeliveries') }}" class="btn-outline">My Deliveries</a>
        @elseif(Auth::guard('customer')->check())
            <a href="{{ route('customer.schedule') }}" class="btn-solid">Schedule</a>
        @else
            <a href="{{ route('customer.login') }}" class="btn-outline">Log In</a>
            <a href="{{ route('login') }}" class="btn-solid">Get Started</a>
        @endif
    </div>


    <!-- ==================== HERO ==================== -->
    <section class="hero">
        <div class="hero-content">
            {{-- <span class="hero-eyebrow">🚀 Fast · Reliable · Trackable</span> --}}
            <h1 class="hero-title">
                Experience<br>More Than<br><em>Just a Delivery</em>
            </h1>
            <p class="hero-sub">Get it delivered in no time — straight to your door, with full live tracking every step of the way.</p>
            <div class="hero-btns">
                <a href="{{ route('login') }}" class="hero-btn-primary">COMMANDER UNE LIVRAISON</a>
                <a href="{{ route('login') }}" class="hero-btn-ghost">POSTULER EN TANT QUE LIVREUR</a>
            </div>
        </div>
    </section>


    <!-- ==================== SERVICES ==================== -->
    <div class="services-wrap" id="services">
        <div class="services-card">
            <p class="section-label">What We Offer</p>
            <h2 class="section-title">Our Delivery Services</h2>
            <div class="services-grid">
                <div class="svc-box">
                    <img src="{{ url('/illustrations/4867780-removebg-preview.png') }}" alt="Time-Saving">
                    <p class="svc-title">Time-Saving</p>
                    <p class="svc-desc">Order what you need; let the app handle the rest.</p>
                </div>
                <div class="svc-box">
                    <img src="{{ url('/illustrations/20945974.jpg') }}" alt="Real-Time Tracking">
                    <p class="svc-title">Real-Time Tracking</p>
                    <p class="svc-desc">See your order on a live map, from pickup to your door.</p>
                </div>
                <div class="svc-box">
                    <img src="{{ url('/illustrations/2295967-removebg-preview.png') }}" alt="Fair Earnings">
                    <p class="svc-title">Fair Earnings</p>
                    <p class="svc-desc">You get paid for every delivery you complete.</p>
                </div>
                <div class="svc-box">
                    <img src="{{ url('/illustrations/3895360-removebg-preview (1).png') }}" alt="Flexible Schedule">
                    <p class="svc-title">Flexible Schedule</p>
                    <p class="svc-desc">Drivers can choose their own hours for ultimate freedom.</p>
                </div>
            </div>
        </div>
    </div>


    <!-- ==================== COUNTERS ==================== -->
    <section class="counter-all">
        <div class="counter-inner">
            <h2 class="counter-headline">Impact your bottom line with same-day delivery</h2>
            <div class="counter-grid">
                <div class="counter-item">
                    <div class="counter-num"><span data-count="186">0</span></div>
                    <div class="counter-label">Deliveries Completed</div>
                </div>
                <div class="counter-item">
                    <div class="counter-num"><span data-count="127">0</span></div>
                    <div class="counter-label">Clients Satisfied</div>
                </div>
                <div class="counter-item">
                    <div class="counter-num"><span data-count="91">0</span>%</div>
                    <div class="counter-label">Success Rate</div>
                </div>
                <div class="counter-item">
                    <div class="counter-num"><span data-count="2">0</span>+</div>
                    <div class="counter-label">Years Experience</div>
                </div>
            </div>
        </div>
    </section>


    <!-- ==================== BENTO GRID ==================== -->
    <section class="bento-section" id="features">
        <div class="bento-header">
            <p class="section-label">Features</p>
            <h2 class="section-title">PopDelivery Features</h2>
            <p>Everything you need for seamless, stress-free deliveries — for senders and drivers alike.</p>
        </div>

        <div class="bento-grid">

            <!-- Card 1: tall — Live Tracking -->
            <div class="bento-card bc-1">
                <div class="bento-img-wrap">
                    <img class="bento-img" src="{{ url('/images/trackImg.png') }}" alt="Live Tracking">
                </div>
                <div class="bento-body">
                    <span class="bento-tag">Tracking</span>
                    <h3 class="bento-title">Live Tracking</h3>
                    <p class="bento-desc">Real-time maps, dynamic ETAs, and full transparency from pickup to drop-off.</p>
                </div>
            </div>

            <!-- Card 2: wide — Pick Your Trip -->
            <div class="bento-card bc-2">
                <div class="bento-body">
                    <span class="bento-tag">For Drivers</span>
                    <h3 class="bento-title">Pick Your Trip</h3>
                    <p class="bento-desc">Take control of your trips. Select the deliveries that work for you and earn on your own schedule — no pressure, just freedom.</p>
                </div>
                <div class="bento-img-wrap">
                    <img class="bento-img" src="{{ url('/images/young-adult-traveling-using-sustainable-mobility-removebg-preview.png') }}" alt="Pick Your Trip">
                </div>
            </div>

            <!-- Card 3: accent — Alerts -->
            <div class="bento-card bc-3">
                <div class="bento-body">
                    <span class="bento-tag">Notifications</span>
                    <h3 class="bento-title">Proactive Delivery Alerts</h3>
                    <p class="bento-desc">Stay in the loop with automated notifications at every stage of your delivery journey.</p>
                </div>
            </div>

            <!-- Card 4: tall — Postulate -->
            <div class="bento-card bc-4">
                <div class="bento-body">
                    <span class="bento-tag">Join Us</span>
                    <h3 class="bento-title">Become a Delivery Driver</h3>
                    <p class="bento-desc">Deliver on your own terms. Choose your orders and set your schedule for ultimate flexibility and control.</p>
                </div>
                <div class="bento-img-wrap">
                    <img class="bento-img" src="{{ url('/images/african-american-female-deliverer-carrying-packages-talking-mobile-phone-city-removebg-preview (1)-pica.png') }}" alt="Delivery Driver">
                </div>
            </div>

            <!-- Card 5: Freshness -->
            <div class="bento-card bc-5">
                <div class="bento-img-wrap">
                    <img class="bento-img" src="{{ url('/images/happy-client-with-their-box-delivered (1).jpg') }}" alt="Freshness">
                </div>
                <div class="bento-body">
                    <span class="bento-tag">Quality</span>
                    <h3 class="bento-title">Freshness Guaranteed</h3>
                    <p class="bento-desc">Dispatched the moment your order is ready — delivered hot and fast.</p>
                </div>
            </div>

            <!-- Card 6: Cost-Efficient -->
            <div class="bento-card bc-6">
                <div class="bento-img-wrap">
                    <img class="bento-img" src="{{ url('/images/close-up-hourglass-with-dollar-signs-falling-inside-it-isolated-white-wall_339569-381.jpg') }}" alt="Cost Efficient">
                </div>
                <div class="bento-body">
                    <span class="bento-tag">Pricing</span>
                    <h3 class="bento-title">Cost-Efficient</h3>
                    <p class="bento-desc">Smart routing optimizations. No hidden fees — ever.</p>
                </div>
            </div>

        </div>
    </section>


    <!-- ==================== HOW TO BECOME A DRIVER ==================== -->
    <section class="driver-section" id="how-it-works">
        <div class="driver-wrap">

            <!-- Left: Visual -->
            <div class="driver-visual">
                <div class="driver-blob"></div>
                <img class="driver-img"
                     src="{{ url('/images/pleased-young-afro-american-delivery-man-holding-cardboard-box-clipboard-isolated-orange-wall-with-copy-space.png') }}"
                     alt="Delivery Driver">

                <div class="driver-badge badge-top">
                    <img src="{{ url('/images/icons8-trophy-50.png') }}" alt="Trophy" style="width:30px;height:30px;object-fit:contain;">
                    <div class="driver-badge-text">
                        <span>Top Driver</span>
                        Reward earned
                    </div>
                </div>

                <div class="driver-badge badge-bottom">
                    <img src="{{ url('/images/icons8-truck-100.png') }}" alt="Truck" style="width:30px;height:30px;object-fit:contain;">
                    <div class="driver-badge-text">
                        <span>+186</span>
                        Deliveries done
                    </div>
                </div>

                <div class="driver-badge badge-corner">
                    <div class="driver-badge-text">
                        <span>3+</span>
                        Years experience
                    </div>
                </div>
            </div>

            <!-- Right: Steps -->
            <div class="driver-content">
                <p class="section-label">Join the Team</p>
                <h2 class="section-title">How to Become a<br>Delivery Driver?</h2>
                <p class="driver-lead">Sign up in minutes. Start delivering on your schedule and earn on your terms — it's that simple.</p>

                <div class="driver-steps">
                    <div class="driver-step">
                        <div class="step-num">1</div>
                        <div class="step-body">
                            <p class="step-title">Enter Your Personal Information</p>
                            <p class="step-desc">Name, email, password, address, mobile number and ID number. Plus front & back photos of your ID card, and a selfie holding your ID.</p>
                        </div>
                    </div>
                    <div class="driver-step">
                        <div class="step-num">2</div>
                        <div class="step-body">
                            <p class="step-title">Add Your Vehicle Details</p>
                            <p class="step-desc">License number, license class, vehicle type, and plate number — so we can verify and onboard you safely.</p>
                        </div>
                    </div>
                    <div class="driver-step">
                        <div class="step-num">3</div>
                        <div class="step-body">
                            <p class="step-title">Get Approved & Start Earning</p>
                            <p class="step-desc">Once verified, you're live. Pick trips, set your hours, and get paid for every delivery you complete.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- ==================== FAQ ==================== -->
    <section class="faq-section" id="faq">
        <div class="faq-inner">
            <div class="faq-header">
                <p class="section-label">Got Questions?</p>
                <h2 class="section-title">Frequently Asked<br>Questions</h2>
            </div>
            <div class="faq-list">

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        How do I create an account?
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-inner">
                            Click the "Get Started" button in the header and fill out the registration form. It only takes a few minutes, and you'll be ready to schedule your first delivery right away.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        How can I track my order?
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-inner">
                            You can track your order in real time on the "My Orders" page. Once your driver is on the way, you'll see their live location on the map alongside a dynamic ETA.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        How much does a delivery cost?
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-inner">
                            Pricing is calculated based on distance and package size with no hidden fees. You'll always see the exact price before confirming your order.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        How do I apply as a delivery driver?
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-inner">
                            Click "POSTULER EN TANT QUE LIVREUR" on the homepage, complete the registration with your personal info and vehicle details, and our team will review and approve your application within 24–48 hours.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ==================== REVIEWS SLIDER ==================== -->
    <section class="slider-section">
        <h2 class="slider-heading">What Our Customers Say</h2>
        <div class="slider-track-wrap">
            <div class="slide-track">
                @for($i = 0; $i < 2; $i++)
                    @foreach([
                        ["Really happy with PopDelivery overall. Just a few hiccups here and there on delayed shipments, but nothing that ruined the experience.", "Anonymous", "Réexpédition", "13/05/2025"],
                        ["The live tracking is phenomenal. I always know exactly where my package is — it feels like magic!", "Sophie K.", "Livraison express", "20/04/2025"],
                        ["Applied as a driver and got approved super fast. The flexible schedule is a game changer for me.", "Jean-Pierre M.", "Driver", "02/05/2025"],
                        ["No hidden fees, fast delivery, friendly driver. Can't ask for more. Will use again!", "Aminata T.", "Standard", "28/04/2025"],
                    ] as $review)
                    <div class="review-card">
                        <div class="review-stars">★★★★★</div>
                        <p class="review-text">"{{ $review[0] }}"</p>
                        <div class="review-footer">
                            <span class="review-name">{{ $review[1] }}</span>
                            <span>{{ $review[2] }} · {{ $review[3] }}</span>
                        </div>
                    </div>
                    @endforeach
                @endfor
            </div>
        </div>
    </section>


    <!-- ==================== FOOTER ==================== -->
    <footer class="site-footer">
        <div class="footer-cta-wrap">
            <div class="footer-cta">
                <div class="footer-cta-text">
                    <h2>Ready to get started?</h2>
                    <p>Join over 1,000+ businesses growing with us.</p>
                </div>
                <button class="footer-cta-btn">Contact Us Now</button>
            </div>
        </div>

        <div class="footer-main">
            <!-- Brand col -->
            <div>
                <div class="footer-brand-logo">Pop<span>Delivery</span></div>
                <p class="footer-brand-desc">Crafting seamless delivery experiences with a focus on speed, reliability, and user-centric design.</p>

                <!-- Social icons with SVGs -->
                <div class="social-row">
                    <!-- Facebook -->
                    <a href="#" class="social-btn" aria-label="Facebook">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <!-- Instagram -->
                    <a href="#" class="social-btn" aria-label="Instagram">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <!-- Twitter / X -->
                    <a href="#" class="social-btn" aria-label="Twitter">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Platform -->
            <div>
                <p class="footer-col-title">Platform</p>
                <a href="#services" class="footer-col-link">Our Services</a>
                <a href="#" class="footer-col-link">Pricing</a>
                <a href="#how-it-works" class="footer-col-link">Procedure</a>
                <a href="#faq" class="footer-col-link">FAQ</a>
            </div>

            <!-- Company -->
            <div>
                <p class="footer-col-title">Company</p>
                <a href="#" class="footer-col-link">About Us</a>
                <a href="#" class="footer-col-link">Careers</a>
                <a href="#" class="footer-col-link">News</a>
                <a href="#" class="footer-col-link">Contact</a>
            </div>

            <!-- Contact -->
            <div>
                <p class="footer-col-title">Contact</p>
                <div class="contact-item">
                    <span class="contact-icon">
                        <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                    </span>
                    guifoverdiane@gmail.com
                </div>
                <div class="contact-item">
                    <span class="contact-icon">
                        <svg viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                    </span>
                    +237 674 38 79 44
                </div>
                <div class="contact-item">
                    <span class="contact-icon">
                        <svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                    </span>
                    Cameroon, Douala
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2026 PopDelivery. Built with passion.</p>
            <div class="footer-legal">
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
            </div>
        </div>
    </footer>

    <!-- WhatsApp FAB -->
    <a href="https://wa.me/237674387944" target="_blank" class="whatsapp-fab" aria-label="WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>


    <script>
        /* ── Hamburger ── */
        function toggleNav() {
            const menu   = document.getElementById('mobileMenu');
            const burger = document.getElementById('hamburgerBtn');
            menu.classList.toggle('open');
            burger.parentElement.classList.toggle('nav-open');
        }

        /* ── FAQ accordion ── */
        function toggleFaq(btn) {
            const item   = btn.parentElement;
            const answer = item.querySelector('.faq-answer');
            const isOpen = item.classList.contains('open');

            // Close all
            document.querySelectorAll('.faq-item.open').forEach(el => {
                el.classList.remove('open');
                el.querySelector('.faq-answer').style.maxHeight = null;
            });

            if (!isOpen) {
                item.classList.add('open');
                answer.style.maxHeight = answer.scrollHeight + 'px';
            }
        }

        /* ── Counter animation ── */
        const counterSpans = document.querySelectorAll('.counter-grid span[data-count]');
        const counterSection = document.querySelector('.counter-all');
        let countersTriggered = false;

        function runCounters() {
            counterSpans.forEach(span => {
                const target = parseInt(span.dataset.count);
                let current = 0;
                const step = Math.ceil(target / 60);
                const timer = setInterval(() => {
                    current = Math.min(current + step, target);
                    span.textContent = current;
                    if (current >= target) clearInterval(timer);
                }, 16);
            });
        }

        window.addEventListener('scroll', () => {
            if (!countersTriggered) {
                const rect = counterSection.getBoundingClientRect();
                if (rect.top < window.innerHeight - 100) {
                    countersTriggered = true;
                    runCounters();
                }
            }
        });
    </script>

</body>
</html>
