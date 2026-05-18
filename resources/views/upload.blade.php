<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Upload Mod — Icang Billabong</title>

<link rel="icon" type="image/png" href="{{ asset('assets/image/favicon.png') }}">
<meta name="theme-color" content="#9b1fd6">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Bangers&family=Exo+2:wght@400;600;700;900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

:root{
    --purple:#8b2be2;
    --purple-dark:#5a0fa0;
    --pink:#e0259a;
    --pink-bright:#ff2eb8;
    --magenta:#c41f8a;
    --bg-dark:#0a0010;
    --bg-card:rgba(20,0,35,.88);
    --glass-border:rgba(180,60,255,.3);
    --text-main:#f0e0ff;
    --text-muted:#b89ed0;
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Exo 2',sans-serif;
    background:var(--bg-dark);
    color:var(--text-main);
    min-height:100vh;
    overflow-x:hidden;
}

/* BACKGROUND */

#bg-canvas{
    position:fixed;
    inset:0;
    z-index:0;
}

.bg-gradient-overlay{
    position:fixed;
    inset:0;
    z-index:0;

    background:
    radial-gradient(circle at top left,rgba(130,20,200,.25),transparent 40%),
    radial-gradient(circle at bottom right,rgba(255,30,180,.15),transparent 40%);
}

/* HEADER */

header{
    position:sticky;
    top:0;
    z-index:100;

    background:rgba(8,0,18,.82);
    backdrop-filter:blur(20px);

    border-bottom:1px solid var(--glass-border);
}

.topbar-inner{
    max-width:1280px;
    margin:auto;
    padding:14px 20px;

    display:flex;
    align-items:center;
    justify-content:space-between;
}

.brand{
    font-family:'Bangers',cursive;
    font-size:26px;
    letter-spacing:2px;

    background:linear-gradient(135deg,#c060ff,#ff30cc,#ff6090);

    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

/* BUTTON */

.admin-button{
    display:flex;
    align-items:center;
    justify-content:center;

    height:36px;
    padding:0 16px;

    border-radius:10px;

    text-decoration:none;
    color:white;

    font-weight:700;
    font-size:13px;

    background:linear-gradient(135deg,var(--purple-dark),var(--magenta));

    border:1px solid rgba(255,60,220,.3);

    transition:.3s;
}

.admin-button:hover{
    transform:translateY(-2px);
    box-shadow:0 0 20px rgba(255,30,180,.3);
}

/* CONTAINER */

.page-wrap{
    position:relative;
    z-index:1;

    max-width:620px;
    margin:auto;

    padding:30px 16px 60px;
}

/* CARD */

.form-card{
    background:var(--bg-card);

    border:1px solid var(--glass-border);

    border-radius:22px;

    padding:28px;

    backdrop-filter:blur(16px);

    box-shadow:0 0 30px rgba(150,20,220,.2);
}

.form-title{
    text-align:center;

    font-family:'Bangers',cursive;

    font-size:28px;
    letter-spacing:2px;

    margin-bottom:24px;

    background:linear-gradient(135deg,#c060ff,#ff30cc);

    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

form{
    display:flex;
    flex-direction:column;
    gap:16px;
}

.form-label{
    font-size:12px;
    font-weight:700;

    letter-spacing:1px;
    text-transform:uppercase;

    color:var(--text-muted);

    display:flex;
    align-items:center;
    gap:8px;
}

/* INPUT */

input[type=text],
input[type=password],
select{
    width:100%;

    padding:13px 14px;

    border-radius:12px;

    border:1px solid var(--glass-border);

    background:rgba(25,0,45,.7);

    color:var(--text-main);

    outline:none;

    transition:.3s;
}

input:focus,
select:focus{
    border-color:var(--pink-bright);
    box-shadow:0 0 14px rgba(255,46,184,.2);
}

select option{
    background:#1a0030;
}

/* FILE */

.file-input-label{
    display:flex;
    align-items:center;
    gap:12px;

    padding:14px 16px;

    border-radius:12px;

    border:1px dashed var(--glass-border);

    background:rgba(25,0,45,.5);

    cursor:pointer;

    transition:.3s;
}

.file-input-label:hover{
    border-color:var(--pink-bright);
}

input[type=file]{
    display:none;
}

/* PREVIEW */

.preview{
    display:none;

    overflow:hidden;

    border-radius:14px;

    border:1px solid var(--glass-border);
}

.preview img{
    width:100%;
    max-height:260px;

    object-fit:cover;

    display:block;
}

/* BUTTON */

.submit-btn{
    margin-top:10px;

    width:100%;

    padding:15px;

    border:none;

    border-radius:14px;

    cursor:pointer;

    color:white;

    font-family:'Bangers',cursive;

    font-size:22px;
    letter-spacing:3px;

    background:linear-gradient(135deg,var(--purple-dark),var(--magenta));

    transition:.3s;
}

.submit-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 0 24px rgba(255,46,184,.4);
}

/* RESPONSIVE */

@media(max-width:480px){

    .form-card{
        padding:22px 16px;
    }

}
.success-box{
    background: rgba(0,255,120,0.12);
    border: 1px solid rgba(0,255,120,0.3);
    color: #7dffb0;
    padding: 14px;
    border-radius: 12px;
    margin-bottom: 16px;
    font-weight: 600;
}

.error-box{
    background: rgba(255,0,80,0.12);
    border: 1px solid rgba(255,0,80,0.3);
    color: #ff8eb1;
    padding: 14px;
    border-radius: 12px;
    margin-bottom: 16px;
    font-weight: 600;
}
</style>
</head>

<body>

<canvas id="bg-canvas"></canvas>
<div class="bg-gradient-overlay"></div>

<header>
    <div class="topbar-inner">

        <div class="brand">
            ⚡ Icang Billabong
        </div>

        <a href="/" class="admin-button">
            ⬅ Beranda
        </a>

    </div>
</header>

<div class="page-wrap">

    <div class="form-card">

        <div class="form-title">
            ⚡ Upload Mod
        </div>

        @if(session('success'))
            <div class="success-box">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="error-box">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="error-box">
                {{ $errors->first() }}
            </div>
        @endif
        <form action="{{ route('upload.store') }}"
            method="POST"
            enctype="multipart/form-data"
            autocomplete="off">

            @csrf

            <label class="form-label">
                <i class="fa-solid fa-image"></i>
                Thumbnail
            </label>

            <label class="file-input-label" for="gambarInput">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                <span id="fileLabel">Pilih gambar...</span>
            </label>

            <input type="file" name="gambar" id="gambarInput" accept="image/*" required>

            <div class="preview" id="previewBox">
                <img id="previewImg">
            </div>

            <label class="form-label">
                <i class="fa-solid fa-tag"></i>
                Nama Mod
            </label>

            <input type="text" name="nama" required>

            <label class="form-label">
                <i class="fa-solid fa-link"></i>
                Link Download
            </label>

            <input type="text" name="link" required>

            <label class="form-label">
                <i class="fa-solid fa-layer-group"></i>
                Kategori
            </label>

            <input type="text" name="kategori">

            <label class="form-label">
                <i class="fa-solid fa-lock"></i>
                Password
            </label>

            <input type="password" name="password">

            <button type="submit" class="submit-btn">
                ⚡ UPLOAD
            </button>

        </form>

    </div>

</div>

<script>

/* PREVIEW IMAGE */

const input = document.getElementById('gambarInput');

input.addEventListener('change', function(){

    const file = this.files[0];

    if(file){

        document.getElementById('previewImg').src = URL.createObjectURL(file);

        document.getElementById('previewBox').style.display = 'block';

        document.getElementById('fileLabel').textContent = file.name;
    }

});

/* BACKGROUND */

const canvas = document.getElementById('bg-canvas');
const ctx = canvas.getContext('2d');

function resize(){
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}

resize();

window.addEventListener('resize',resize);

function rand(a,b){
    return a + Math.random() * (b - a);
}

class Particle{

    constructor(){
        this.reset();
    }

    reset(){

        this.x = rand(0,canvas.width);
        this.y = rand(0,canvas.height);

        this.size = rand(1,3);

        this.speedY = rand(.2,.8);

        this.opacity = rand(.2,.8);
    }

    update(){

        this.y -= this.speedY;

        if(this.y < -10){

            this.y = canvas.height + 10;
            this.x = rand(0,canvas.width);
        }
    }

    draw(){

        ctx.beginPath();

        ctx.arc(this.x,this.y,this.size,0,Math.PI*2);

        ctx.fillStyle = `rgba(255,30,180,${this.opacity})`;

        ctx.fill();
    }

}

const particles = Array.from({length:70},()=>new Particle());

function animate(){

    ctx.clearRect(0,0,canvas.width,canvas.height);

    particles.forEach(p=>{

        p.update();
        p.draw();

    });

    requestAnimationFrame(animate);
}

animate();

</script>

</body>
</html>