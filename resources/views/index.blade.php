{{-- resources/views/home.blade.php --}}

<!DOCTYPE html>
<html lang="en">

<head>
    {{-- ================= META ================= --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- ================= TITLE ================= --}}
    <title>ICANG BILLABONG</title>

    {{-- ================= FAVICON ================= --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/image/favicon.png') }}">
    <meta name="theme-color" content="#9b1fd6">

    {{-- ================= GOOGLE FONT ================= --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Bangers&family=Exo+2:wght@400;600;700;900&display=swap"
        rel="stylesheet">

    {{-- ================= FONT AWESOME ================= --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

/* =========================================================
   ROOT VARIABLES
========================================================= */

:root {
    --purple: #8b2be2;
    --purple-dark: #5a0fa0;
    --pink: #e0259a;
    --pink-bright: #ff2eb8;
    --magenta: #c41f8a;
    --bg-dark: #0a0010;
    --bg-card: rgba(20, 0, 35, 0.85);
    --bg-card-hover: rgba(35, 0, 55, 0.95);
    --border-glow: rgba(180, 30, 220, 0.5);
    --text-main: #f0e0ff;
    --text-muted: #b89ed0;
    --accent-lightning: #ff3de0;
    --glass: rgba(130, 20, 200, 0.15);
    --glass-border: rgba(180, 60, 255, 0.3);
}

/* =========================================================
   RESET
========================================================= */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Exo 2', sans-serif;
    background: var(--bg-dark);
    color: var(--text-main);
    min-height: 100vh;
    overflow-x: hidden;
}

/* =========================================================
   BACKGROUND
========================================================= */

#bg-canvas {
    position: fixed;
    inset: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
    pointer-events: none;
}

.bg-gradient-overlay {
    position: fixed;
    inset: 0;
    z-index: 0;
    pointer-events: none;

    background:
        radial-gradient(ellipse 80% 50% at 10% 20%, rgba(130,20,200,0.25) 0%, transparent 60%),
        radial-gradient(ellipse 60% 40% at 90% 80%, rgba(220,30,150,0.2) 0%, transparent 60%),
        radial-gradient(ellipse 50% 60% at 50% 50%, rgba(80,0,140,0.15) 0%, transparent 70%);
}

/* =========================================================
   HEADER
========================================================= */

header {
    position: sticky;
    top: 0;
    z-index: 100;

    background: rgba(8, 0, 18, 0.8);

    backdrop-filter: blur(20px);
    border-bottom: 1px solid var(--glass-border);
}

.topbar-inner {
    max-width: 1280px;
    margin: auto;

    padding: 14px 20px;

    display: flex;
    align-items: center;
    justify-content: space-between;
}

.brand {
    font-family: 'Bangers', cursive;
    font-size: 26px;
    letter-spacing: 2px;

    background: linear-gradient(
        135deg,
        #c060ff 0%,
        #ff30cc 50%,
        #ff6090 100%
    );

    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* =========================================================
   BUTTON
========================================================= */

.google-btn {
    display: flex;
    align-items: center;
    gap: 10px;

    padding: 10px 16px;

    border-radius: 10px;
    border: 1px solid var(--glass-border);

    background: var(--glass);
    color: var(--text-main);

    text-decoration: none;
    font-weight: 600;

    transition: .3s;
}

.google-btn:hover {
    background: rgba(150, 30, 220, 0.3);
}

/* =========================================================
   CONTAINER
========================================================= */

.container {
    position: relative;
    z-index: 1;

    max-width: 1280px;
    margin: auto;

    padding: 28px 16px 120px;

    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* =========================================================
   CATEGORY
========================================================= */

.category {
    background: var(--bg-card);

    border-radius: 20px;
    overflow: hidden;

    border: 1px solid var(--glass-border);

    backdrop-filter: blur(10px);
}

.category-btn {
    width: 100%;

    padding: 18px 52px 18px 20px;

    border: none;
    background: transparent;

    display: flex;
    align-items: center;
    justify-content: space-between;

    cursor: pointer;

    color: var(--text-main);

    font-size: 16px;
    font-weight: 700;
}

.category-left {
    display: flex;
    align-items: center;
    gap: 10px;
}

.category-count {
    min-width: 26px;
    height: 26px;

    padding: 0 8px;

    border-radius: 999px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: rgba(140,40,220,0.4);
}

.category-icon {
    width: 28px;
    height: 28px;

    border-radius: 50%;

    background: linear-gradient(
        135deg,
        var(--purple),
        var(--pink)
    );

    display: flex;
    align-items: center;
    justify-content: center;

    color: white;
}

.category-content {
    overflow: hidden;
    height: 0;

    opacity: 0;

    transition: .4s;
}

.category.active .category-content {
    opacity: 1;
}

/* =========================================================
   ABOUT
========================================================= */

.about-me {
    padding: 20px 24px;

    line-height: 1.8;
    color: var(--text-muted);
}

/* =========================================================
   GRID
========================================================= */

.grid {
    padding: 22px;

    display: grid;
    gap: 18px;

    grid-template-columns: 1fr;
}

@media (min-width: 640px) {
    .grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 900px) {
    .grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (min-width: 1200px) {
    .grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

/* =========================================================
   CARD
========================================================= */

.card {
    background: rgba(15, 0, 28, 0.9);

    border-radius: 16px;
    overflow: hidden;

    border: 1px solid var(--glass-border);

    display: flex;
    flex-direction: column;

    transition: .3s;
}

.card:hover {
    transform: translateY(-4px);
}

.card img {
    width: 100%;
    aspect-ratio: 16/10;

    object-fit: cover;
}

.card-body {
    padding: 14px 16px;
}

.card-body h1 {
    font-size: 14px;
    margin-bottom: 4px;
}

.card-body p {
    font-size: 11px;
    color: var(--text-muted);
}

.card a {
    display: block;

    text-align: center;

    padding: 13px;

    background: linear-gradient(
        135deg,
        var(--purple-dark),
        var(--magenta)
    );

    color: white;
    text-decoration: none;

    font-family: 'Bangers', cursive;
    letter-spacing: 2px;
}

/* =========================================================
   USER
========================================================= */

.right-panel {
    display: flex;
    align-items: center;
    gap: 12px;
}

.user-box {
    position: relative;

    display: flex;
    align-items: center;
    gap: 10px;

    cursor: pointer;
}

.user-box img {
    width: 30px;
    height: 30px;

    border-radius: 50%;
}

.user-dropdown {
    position: absolute;

    top: 44px;
    right: 0;

    display: none;
    flex-direction: column;

    min-width: 160px;

    padding: 12px 16px;

    border-radius: 14px;

    background: rgba(10, 0, 25, 0.97);
    border: 1px solid var(--glass-border);
}

/* =========================================================
   FOOTER
========================================================= */

footer {
    position: fixed;
    bottom: 0;

    width: 100%;
    height: 70px;

    z-index: 100;

    display: flex;
    align-items: center;
    justify-content: space-around;

    background: rgba(6, 0, 15, 0.95);

    border-top: 1px solid var(--glass-border);
}

.social-m {
    display: flex;
    gap: 18px;
}

.social-m a {
    color: var(--text-muted);
    font-size: 22px;
}

</style>

</head>

<body>

{{-- ========================================================
     BACKGROUND
======================================================== --}}

<canvas id="bg-canvas"></canvas>
<div class="bg-gradient-overlay"></div>

{{-- ========================================================
     HEADER
======================================================== --}}

<header>

    <div class="topbar-inner">

        <div class="brand">
            ⚡ Icang Billabong
        </div>

        @guest

            <a class="google-btn" href="{{ route('google.login') }}">

                <img
                    src="https://developers.google.com/identity/images/g-logo.png"
                    width="18">

                Login Google

            </a>

        @else

            <div class="right-panel">

                @if(auth()->user()->role == 'admin')

                    <a href="{{ url('input-data') }}" class="google-btn">
                        Upload Mod
                    </a>

                    <a href="{{ url('list') }}" class="google-btn">
                        Daftar File
                    </a>

                @endif

                <div class="user-box" id="userBox">

                    <span>
                        {{ Auth::user()->name }}
                    </span>

                    <img
                        src="{{ Auth::user()->picture }}"
                        alt="Profile">

                    <div class="user-dropdown" id="userDropdown">

                        <span>
                            {{ Auth::user()->name }}
                        </span>

                        <a href="{{ route('logout') }}">
                            Logout
                        </a>

                    </div>

                </div>

            </div>

        @endguest

    </div>

</header>

{{-- ========================================================
     CONTENT
======================================================== --}}

<div class="container">

    {{-- ================= ABOUT ================= --}}

    <div class="category">

        <button class="category-btn">

            <span class="category-left">

                Tentang Kami

                <i class="fa-solid fa-circle-info"></i>

            </span>

            <span class="category-icon">
                +
            </span>

        </button>

        <div class="category-content">

            <div class="about-me">

                Icang Billabong adalah website tempat saya membagikan berbagai mod untuk game GTA San Andreas dari berbagai kategori.

            </div>

        </div>

    </div>

    {{-- ================= CATEGORY ================= --}}

    @foreach ($dataKategori as $kategori => $items)

    <div class="category">

        <button class="category-btn">

            <span class="category-left">

                {{ $kategori }}

                <span class="category-count">

                    {{ $items->count() }}

                </span>

            </span>

            <span class="category-icon">
                +
            </span>

        </button>

        <div class="category-content">

            <div class="grid">

                @foreach ($items as $row)

                <div class="card"

                    data-gambar="{{ asset('storage/uploads' . $row->gambar) }}"

                    data-caption="{{ $row->nama }}"

                    data-content="{{ \Carbon\Carbon::parse($row->date)->format('d M Y') }}">

                    <img
                        src="{{ asset('image/' . $row->gambar) }}"
                        loading="lazy">

                    <div class="card-body">

                        <h1>
                            {{ $row->nama }}
                        </h1>

                        <p>
                            {{ \Carbon\Carbon::parse($row->date)->format('d M Y') }}
                        </p>

                    </div>

                    <a href="{{ url('view/' . $row->id_unik) }}">

                        ⚡ DOWNLOAD

                    </a>

                </div>

                @endforeach

            </div>

        </div>

    </div>

    @endforeach

</div>

{{-- ========================================================
     FOOTER
======================================================== --}}

<footer>

    <p>
        © 2026 Icang Billabong
    </p>

    <div class="social-m">

        <a href="https://www.youtube.com/@icang227" target="_blank">
            <i class="fa-brands fa-youtube"></i>
        </a>

        <a href="https://www.instagram.com/ihsanf27__" target="_blank">
            <i class="fa-brands fa-square-instagram"></i>
        </a>

        <a href="mailto:batasrt49@gmail.com">
            <i class="fa-solid fa-envelope"></i>
        </a>

        <a href="https://www.tiktok.com/@snazone009" target="_blank">
            <i class="fa-brands fa-tiktok"></i>
        </a>

    </div>

</footer>

{{-- ========================================================
     SCRIPT
======================================================== --}}

<script>

/* =========================================================
   CANVAS BACKGROUND
========================================================= */

const canvas = document.getElementById('bg-canvas');
const ctx = canvas.getContext('2d');

function resizeCanvas() {

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

}

resizeCanvas();

window.addEventListener('resize', resizeCanvas);

/* =========================================================
   PARTICLES
========================================================= */

const particles = [];

function rand(min, max) {

    return min + Math.random() * (max - min);

}

class Particle {

    constructor() {

        this.reset();

    }

    reset() {

        this.x = rand(0, canvas.width);
        this.y = rand(0, canvas.height);

        this.size = rand(0.5, 2.5);

        this.speedX = rand(-0.3, 0.3);
        this.speedY = rand(-0.5, -0.1);

        this.opacity = rand(0.1, 0.6);

    }

    update() {

        this.x += this.speedX;
        this.y += this.speedY;

        this.opacity -= 0.001;

        if (this.opacity <= 0) {

            this.reset();

        }

    }

    draw() {

        ctx.beginPath();

        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);

        ctx.fillStyle = `rgba(255,30,180,${this.opacity})`;

        ctx.fill();

    }

}

for (let i = 0; i < 60; i++) {

    particles.push(new Particle());

}

function animate() {

    ctx.clearRect(0, 0, canvas.width, canvas.height);

    particles.forEach(p => {

        p.update();
        p.draw();

    });

    requestAnimationFrame(animate);

}

animate();

/* =========================================================
   ACCORDION
========================================================= */

document.querySelectorAll('.category-btn').forEach(button => {

    button.addEventListener('click', () => {

        const category = button.parentElement;
        const content = category.querySelector('.category-content');

        if (category.classList.contains('active')) {

            content.style.height = content.scrollHeight + 'px';

            requestAnimationFrame(() => {

                content.style.height = '0px';

            });

            category.classList.remove('active');

        } else {

            category.classList.add('active');

            content.style.height = content.scrollHeight + 'px';

            content.addEventListener('transitionend', function e() {

                content.style.height = 'auto';

                content.removeEventListener('transitionend', e);

            });

        }

    });

});

/* =========================================================
   USER DROPDOWN
========================================================= */

document.addEventListener('DOMContentLoaded', () => {

    const userBox = document.getElementById('userBox');
    const userDropdown = document.getElementById('userDropdown');

    if (userBox && userDropdown) {

        userBox.addEventListener('click', e => {

            e.stopPropagation();

            userDropdown.style.display =
                userDropdown.style.display === 'flex'
                ? 'none'
                : 'flex';

        });

        document.addEventListener('click', () => {

            userDropdown.style.display = 'none';

        });

    }

});

</script>

</body>
</html>