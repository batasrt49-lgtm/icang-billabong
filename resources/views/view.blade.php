{{-- resources/views/detail.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $data->nama }} — Icang Billabong</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="{{ asset('assets/image/favicon.png') }}">

    <meta name="theme-color" content="#9b1fd6">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Exo+2:wght@400;600;700;900&display=swap"
          rel="stylesheet">

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
    --glass:rgba(130,20,200,.15);
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    -webkit-tap-highlight-color:transparent;
}

body{
    overflow-x:hidden;
    font-family:'Exo 2',sans-serif;
    background:var(--bg-dark);
    color:var(--text-main);
    min-height:100vh;
}

#bg-canvas{
    position:fixed;
    inset:0;
    width:100%;
    height:100%;
    z-index:0;
}

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

.google-btn{
    display:flex;
    align-items:center;
    gap:10px;
    padding:10px 16px;
    border-radius:10px;
    border:1px solid var(--glass-border);
    background:var(--glass);
    color:var(--text-main);
    font-weight:600;
    text-decoration:none;
}

.google-btn img{
    width:18px;
}

.container{
    position:relative;
    z-index:1;
    min-height:80vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:40px 20px;
}

.grid{
    width:100%;
    max-width:520px;
}

.card{
    background:var(--bg-card);
    border-radius:20px;
    overflow:hidden;
    border:1px solid var(--glass-border);
    box-shadow:0 0 40px rgba(150,20,220,.25);
}

.card img{
    width:100%;
    aspect-ratio:16/10;
    object-fit:cover;
}

.card-body{
    padding:20px;
}

.card-body h1{
    font-family:'Bangers',cursive;
    font-size:24px;
    letter-spacing:1px;
    margin-bottom:10px;
}

.card-body p{
    font-size:13px;
    color:var(--text-muted);
}

.download-btn{
    width:100%;
    border:none;
    padding:16px;
    background:linear-gradient(135deg,var(--purple-dark),var(--magenta));
    color:white;
    font-family:'Bangers',cursive;
    font-size:20px;
    letter-spacing:3px;
    cursor:pointer;
    text-decoration:none;
    display:block;
    text-align:center;
}

.overlay{
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.85);
    display:none;
    justify-content:center;
    align-items:center;
    z-index:9999;
}

.popup{
    width:100%;
    max-width:340px;
    background:#13001f;
    border-radius:18px;
    padding:25px;
    border:1px solid var(--glass-border);
}

.popup h2{
    margin-bottom:20px;
    text-align:center;
    font-family:'Bangers',cursive;
    font-size:24px;
}

.password-box{
    position:relative;
}

.password-box input{
    width:100%;
    padding:12px 45px 12px 14px;
    background:#24003b;
    border:1px solid var(--glass-border);
    border-radius:10px;
    color:white;
    outline:none;
}

.toggle-password{
    position:absolute;
    right:14px;
    top:50%;
    transform:translateY(-50%);
    cursor:pointer;
}

#notif{
    margin:12px 0;
    color:#ff5d8f;
    font-size:13px;
}

.btn-confirm{
    width:100%;
    border:none;
    padding:14px;
    border-radius:10px;
    background:linear-gradient(135deg,var(--purple-dark),var(--magenta));
    color:white;
    font-family:'Bangers',cursive;
    font-size:18px;
    cursor:pointer;
}

.btn-cancel{
    width:100%;
    margin-top:10px;
    border:none;
    padding:12px;
    border-radius:10px;
    cursor:pointer;
}

</style>
</head>

<body>

<canvas id="bg-canvas"></canvas>

<header>
    <div class="topbar-inner">

        <div class="brand">
            ⚡ Icang Billabong
        </div>

        @guest

            <a class="google-btn" href="#">
                <img src="https://developers.google.com/identity/images/g-logo.png">
                Login Google
            </a>

        @else

            <div style="display:flex;align-items:center;gap:12px;">

                <a href="/" class="google-btn">
                    Beranda
                </a>

                <div style="display:flex;align-items:center;gap:10px;">

                    <span>
                        {{ auth()->user()->name }}
                    </span>

                    <img src="{{ auth()->user()->picture }}"
                         style="width:34px;height:34px;border-radius:50%;">

                </div>

            </div>

        @endguest

    </div>
</header>

<div class="container">

    <div class="grid">

        <div class="card">

            <img src="{{ asset('image/' . $data->gambar) }}"
                 alt="{{ $data->nama }}">

            <div class="card-body">

                <h1>
                    {{ $data->nama }}
                </h1>

                <p>
                    <i class="fa-regular fa-calendar"></i>

                    {{ \Carbon\Carbon::parse($data->date)->format('d-m-Y') }}
                </p>

            </div>

            @if(empty($data->password))

                <a href="{{ $data->link }}"
                   target="_blank"
                   class="download-btn">

                    ⚡ DOWNLOAD

                </a>

            @else

                <button class="download-btn"
                        onclick="openPasswordModal('{{ $data->id_unik }}')">

                    ⚡ DOWNLOAD

                </button>

            @endif

        </div>

    </div>

</div>

<div id="passwordOverlay" class="overlay">

    <div class="popup">

        <h2>🔐 Masukkan Password</h2>

        <div class="password-box">

            <input type="password"
                   id="passwordInput"
                   placeholder="Masukkan password...">

            <span class="toggle-password"
                  onclick="togglePassword()">

                <i class="fa-regular fa-eye"></i>

            </span>

        </div>

        <p id="notif"></p>

        <button class="btn-confirm"
                onclick="cekPassword()">

            ⚡ MASUK

        </button>

        <button class="btn-cancel"
                onclick="closeModal()">

            Batal

        </button>

    </div>

</div>

<script>

const canvas = document.getElementById('bg-canvas');
const ctx = canvas.getContext('2d');

function resize(){
    canvas.width = innerWidth;
    canvas.height = innerHeight;
}

resize();

addEventListener('resize', resize);

const particles = [];

for(let i=0;i<60;i++){
    particles.push({
        x:Math.random()*innerWidth,
        y:Math.random()*innerHeight,
        r:Math.random()*2+1,
        dx:(Math.random()-.5)*.5,
        dy:(Math.random()-.5)*.5
    });
}

function animate(){

    ctx.clearRect(0,0,canvas.width,canvas.height);

    particles.forEach(p=>{

        p.x += p.dx;
        p.y += p.dy;

        if(p.x<0 || p.x>canvas.width) p.dx*=-1;
        if(p.y<0 || p.y>canvas.height) p.dy*=-1;

        ctx.beginPath();
        ctx.arc(p.x,p.y,p.r,0,Math.PI*2);
        ctx.fillStyle='rgba(220,40,255,.7)';
        ctx.fill();

    });

    requestAnimationFrame(animate);

}

animate();

let currentId = "";

function openPasswordModal(id){

    currentId = id;

    document.getElementById("passwordOverlay").style.display = "flex";

    document.getElementById("passwordInput").value = "";

    document.getElementById("notif").innerText = "";

}

function closeModal(){

    document.getElementById("passwordOverlay").style.display = "none";

}

function cekPassword(){

    let password = document.getElementById("passwordInput").value;

    fetch("{{ route('cek.password') }}",{

        method:"POST",

        headers:{
            "Content-Type":"application/x-www-form-urlencoded",
            "X-CSRF-TOKEN":"{{ csrf_token() }}"
        },

        body:
            "id=" + currentId +
            "&password=" + encodeURIComponent(password)

    })

    .then(res=>res.json())

    .then(data=>{

        if(data.status === "success"){

            window.open(data.link, "_blank");

            closeModal();

        }else{

            document.getElementById("notif").innerText =
                "❌ Password salah";

        }

    })

    .catch(()=>{

        document.getElementById("notif").innerText =
            "⚠️ Terjadi error";

    });

}

function togglePassword(){

    const input = document.getElementById("passwordInput");

    const icon =
        document.querySelector('.toggle-password i');

    if(input.type === "password"){

        input.type = "text";

        icon.className =
            "fa-regular fa-eye-slash";

    }else{

        input.type = "password";

        icon.className =
            "fa-regular fa-eye";

    }

}

document.getElementById("passwordOverlay")
.addEventListener("click", function(e){

    if(e.target === this){

        closeModal();

    }

});

</script>

</body>
</html>