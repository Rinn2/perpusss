<?php
include "inc/koneksi.php";
session_start();

if (isset($_POST['btnLogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM tb_pengguna WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['ses_id'] = $row['id'];
        $_SESSION['ses_nama'] = $row['nama'];
        $_SESSION['ses_username'] = $row['username'];
        $_SESSION['ses_level'] = $row['level'];

        header("Location: index.php");
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en"> 
  <head>
  	<link rel="icon" href="assets/images/about.png">


    </style>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">

    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
      rel="stylesheet"
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

    <title>Sistem Informasi</title>
  </head>
  <body>
    <nav>
      <div class="container nav-container">
        <a href="index.html" class="logo">Sistem Informasi</span></a>
        <ul class="navlist">
          <li><a href="#about">about</a></li>
          <li><a href="#fasilitas">Fasilitas</a></li>
          <li><a href="#daftar">Daftar Buku</a></li>
          <li><a href="#Kritik">Kritik & Saran </a></li>
          <li><a href="#contact">contact</a></li>
          <li><a href="#loginModal" onclick="openModal('loginModal')">Login</a></li>
          <li id="userIcon" style="display: none;">
            <i class="bi bi-person" onclick="toggleDropdown()"></i>
            <div id="dropdownContent" class="dropdown-content" style="display: none;">
              <a href="#" onclick="handleLogout()">Logout</a>
            </div>
          </li>
          
        </ul>
        <div class="nav-icons">
          <div id="theme-btn" class="ri-moon-line"></div>
          <div id="menu-btn" class="ri-menu-line"></div>
        </div>
      </div>
    </nav>
    <section class="home" id="home">
      <div class="container home-container">
        <div class="left">
          <h3>Selamat Datang Di</h3>
          <h1><span>Perpustakaan Sistem Informasi</span></h1>
          <h3>For The <span class="multiple-text"></span></h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius placeat autem, possimus iure qui neque expedita. Deleniti quidem eos dignissimos veniam ab delectus amet quo error maiores sunt Ipsum, provident.
          </p>
          <div class="social-icons-container">
            <div class="social-icons">
            <a href="https://www.instagram.com/si_unjani/" target="_blank">
    <i class="ri-instagram-line"></i>
</a>              <a href=""><i class="bi bi-whatsapp"></i></a>
            </div>

          </div>
        </div>
        <div class="right">
          <img src="assets/images/about.png" alt="" />
        </div>
      </div>
    </section>
    
    <section class="about" id="about">
      <div class="container about-container">
        <div class="left">
          <img src="assets/images/profile.png" alt="" />
        </div>
        <div class="right">
          <div class="title">
            <h2>About <span>Me</span></h2>
          </div>
          <h3>
            Your hub for Information Systems knowledge. Explore, learn, and thrive with us!
          </h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo beatae similique tenetur voluptate! Tempore quos alias porro voluptatem autem est animi aspernatur eius, velit in, minus libero illum quod dolore.
          </p>
          <button class="btn overlay">
          </button>
          
    </section>
    <section class="fasilitas" id="fasilitas">
      <div class="title">
        <h2> <span>Fasilitas</span></h2>
      </div>
      <div class="container fasilitas-container">
        <div class="box overlay content-1">
          <div class="content ">
            <i class="bi bi-pc-display-horizontal"></i>
            <h4>Komputer</h4>
            <button class="btn"></button>
          </div>
        </div>
  
        <div class="box overlay content-2">
          <div class="content ">
            <i class="bi bi-badge-wc"></i>
            <h4>Toilet</h4>
            <button class="btn"></button>
          </div>
        </div>

        <div class="box overlay content-2">
          <div class="content ">
            <i class="bi bi-battery-charging"></i>
            <h4>Charger Area</h4>
            <button class="btn"></button>
          </div>
        </div>
        <div class="box overlay content-2">
          <div class="content ">
            <i class="bi bi-shop"></i>
            <h4>Mushola</h4>
            <button class="btn"></button>
          </div>
        </div>
          <div class="box overlay content-2">
            <div class="content ">
              <i class="bi bi-wifi"></i>
              <h4>WiFi</h4>
              <button class="btn"></button>
            </div>
          </div>
          <div class="box overlay content-2">
            <div class="content ">
              <i class="bi bi-printer-fill"></i>
              <h4>Printer</h4>
              <button class="btn"></button>
            </div>
          </div>
        </div>
      </div>
      
      
    </section>
  
    <section class="daftar" id="daftar">
      <div class="title">
          <h2>Daftar <span>Buku</span></h2>
      </div>
      <div class="container daftar-container">
          <div class="daftar-buttons">
              <button class="btn daftar-tab active" onclick="tabOpen('all', this)">
                  All
              </button>
              <button class="btn daftar-tab" onclick="tabOpen('sistemInformasi', this)">
                  Sistem Informasi
              </button>
              <button class="btn daftar-tab" onclick="tabOpen('manajemen', this)">
                  Manejemen
              </button>
              <button class="btn daftar-tab" onclick="tabOpen('bisnis', this)">
                  Bisnis
              </button>
          </div>
          <div class="tab-content active-content" id="all">
              <div class="image"><img src="assets/images/Bis.png" alt=""><h5 style="text-align: center;">Manajemen Strategik & Bisnis</h5></div>
              <div class="image"><img src="assets/images/SI1.png" alt=""><h5 style="text-align: center;">Konsep Sistem Informasi</h4></div>
              <div class="image"><img src="assets/images/Bis2.png" alt=""><h5 style="text-align: center;">Pemahaman strategi bisnis & kewirausahaan</h4></div>
              <div class="image"><img src="assets/images/SI2.png" alt=""><h5 style="text-align: center;">Pengantar SIstem Informasi</h4></div>
              <div class="image"><img src="assets/images/Man.png" alt=""><h5 style="text-align: center;">Konsep Sistem Informasi</h4></div>
              <div class="image"><img src="assets/images/Man2.png" alt=""><h5 style="text-align: center;">Konsep Sistem Informasi</h4></div>
          </div>
          <div class="tab-content" id="sistemInformasi">
              <div class="image"><img src="assets/images/SI1.png" alt=""><h5 style="text-align: center;">Konsep Sistem Informasi</h5></div>
              <div class="image"><img src="assets/images/SI2.png" alt=""><h5 style="text-align: center;">Pengantar SIstem Informasi</h5></div>

          </div>
          <div class="tab-content" id="manajemen">
              <div class="image"><img src="assets/images/Man.png" alt=""><h5 style="text-align: center;"> Pengantar Manajemen</h5></div>
              <div class="image"><img src="assets/images/Man2.png" alt=""><h5 style="text-align: center;"> Prinsi Prinsip Manajemen</h5></div>
          </div>
          <div class="tab-content" id="bisnis">
            <div class="image"><img src="assets/images/Bis2.png" alt=""><h5 style="text-align: center;">Pemahaman strategi bisnis & kewirausahaan</h4></div>
            <div class="image"><img src="assets/images/Bis.png" alt=""><h5 style="text-align: center;">Manajemen Strategik & Bisnis</h5></div>

          </div>
      </div>
  </section>
  
 
   <section class="Kritik" id="Kritik">
    <div class="title">
        <h2>Saran <span>& Masukan</span></h2>
    </div>
    <div class="main-container">    
        <div class="container Kritik-container scrollbar">
            <div class="card">
                <img src="assets/imaes/t (1).jpg" alt="">
                <div class="info">
                    <h3>Micky</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus ipsum rem, adipisci suscipit ab, laborum debitis nisi accusamus, velit harum reprehenderit!</p>
                </div>
            </div>
            <div class="card">
                <img src="assets/imaes/t (2).jpg" alt="">
                <div class="info">
                    <h3>Raihan</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus ipsum rem, adipisci suscipit ab, laborum debitis nisi accusamus, velit harum reprehenderit!</p>
                </div>
            </div>
            <div class="card">
                <img src="asets/images/t (3).jpg" alt="">
                <div class="info">
                    <h3>Very</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus ipsum rem, adipisci suscipit ab, laborum debitis nisi accusamus, velit harum reprehenderit!</p>
                </div>
            </div>
            <div class="card">
                <img src="assets/image/t (4).jpg" alt="">
                <div class="info">
                    <h3>Sofyan</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus ipsum rem, adipisci suscipit ab, laborum debitis nisi accusamus, velit harum reprehenderit!</p>
                </div>
            </div>
        </div>
    </div>
   </section>
 
   <section class="contact" id="contact">
    <div class="title">
        <h2>Contact <span>Me</span></h2>
    </div>
    <div class="contact-content">
        <div class="row">
          <div class="box">
              <div class="box-icon">
                  <i class="ri-home-line"></i>
              </div>
              <div class="box-info">
                  <h4>Address</h4>
                  <span>Cimahi , Jawa Barat - Indonesia</span>
              </div>
          </div>
          <div class="box">
              <div class="box-icon">
                  <i class="ri-phone-line"></i>
              </div>
              <div class="box-info">
                  <h4>Phone Number</h4>
                  <span>+085183023002</span>
              </div>
          </div>
          <div class="box">
              <div class="box-icon">
                  <i class="ri-mail-line"></i>
              </div>
              <div class="box-info">
                  <h4>Email Address</h4>
                  <span>SistemInformasi2022@gmail.com</span>
              </div>
          </div>
        </div>
        <div class="row">
            <form action="mailto:agusirvan27@gmail.com" method="get"class="contact-form">
                <div class="form-box">
                    <input type="text" placeholder="Enter Your Name" required>
                </div>
                <div class="form-box">
                    <input type="email" name="email" placeholder="Enter Your Email" required>
                </div>
                <div class="form-box">
                    <input name="subject"type="text" placeholder="Email Subject" required>
                </div>
                <div class="form-box">
                    <textarea name="body" id="" cols="10" rows="10" placeholder="Your Message"></textarea>
                </div>
                <button type="submit" class="btn overlay">
                    <span>Send Message</span>
                </button>
            </form>
        </div>
    </div>
   </section>
   <div class="copyright">
    <p>Copyright &copy; 2024 by SistemInformasi | All right Reserved.</p>
   </div>
 <!-- Login Modal -->
 <div id="loginModal" class="modal">
      <div class="login-card">
        <div class="avatar">
          <img src="assets/images/user.png" alt="User">
        </div>
        <form method="POST">
          <div class="input-container">
            <i class="fa fa-user"></i>
            <input type="text" name="username" placeholder="Username" required />
          </div>
          <div class="input-container">
            <i class="fa fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required />
          </div>
          <button type="submit" name="btnLogin" class="login-btn">LOGIN</button>
          <p>Don't have an account? <a href="#createAccountModal" onclick="switchModal('loginModal', 'createAccountModal')">Create Account</a></p>
        </form>
      </div>
    </div>

    <div id="createAccountModal" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeModal('createAccountModal')">&times;</span>
        <h2>Create Account</h2>
        <form method="POST">
          <div class="form-box">
            <input type="text" name="fullname" placeholder="Full Name" required />
          </div>
          <div class="form-box">
            <input type="text" name="nim" placeholder="NIM" required />
          </div>
          <div class="form-box">
            <input type="text" name="username" placeholder="Username" required />
          </div>
          <div class="form-box">
            <input type="password" name="password" placeholder="Password" required />
          </div>
          <div class="form-box">
            <input type="email" name="email" placeholder="Email Addr`ess" required />
          </div>
          <button type="submit" name="btnCreateAccount" class="create-account-btn">Create Account</button>
        </form>
      </div>
    </div>


    <script src="https://unpkg.com/scrollreveal"></script>
 
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
   
    <script src="assets/js/script.js"></script>

  </body>
</html>
