<?php
// Mulai sesi
session_start();


// Memuat autoloader Composer
require 'vendor/autoload.php';
require 'config/database.php';


if (isset($_SESSION['user_id'])) {
    $showLoginButton = false;
} else {
    $showLoginButton = true;
}


// Memuat file .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Menggunakan kelas Database
use config\database;

// Menginisialisasi koneksi database
try {
    // Mendapatkan koneksi database
    $db = Database::getInstance()->getConnection();
    
    // Mengambil data dari tabel accreditation_info
    $stmt_accreditation = $db->query("SELECT * FROM accreditation_info LIMIT 1");
    $accreditation = $stmt_accreditation->fetch(PDO::FETCH_ASSOC);
    
    // Mengambil pengumuman terbaru
    $stmt_announcement = $db->query("SELECT title, description FROM announcements ORDER BY created_at DESC LIMIT 1");
    $announcement = $stmt_announcement->fetch(PDO::FETCH_ASSOC);
    
    // Mengambil data berita
    $stmt_news = $db->query("SELECT title, date, time, content FROM news ORDER BY date DESC");
    $newsItems = $stmt_news->fetchAll(PDO::FETCH_ASSOC);
   
   
    
    // Mengambil berita dari database
    $stmt_article = $db->query("SELECT title, date, content, image FROM article ORDER BY date DESC LIMIT 6");
    $con_article = $stmt_article->fetchAll(PDO::FETCH_ASSOC);
    
   
   
   
       // Mengambil data berita
    $stmt_container_news = $db->query("SELECT title, date, time, content FROM
    ContainerNews ORDER BY date DESC");
    $news_container = $stmt_container_news->fetchAll(PDO::FETCH_ASSOC);
   
   
   
   
  
    // Mengambil tombol
    $stmt_buttons = $db->query("SELECT label, link FROM buttons");
    $buttons = $stmt_buttons->fetchAll(PDO::FETCH_ASSOC);
    
} catch (Exception $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// Mengatur header
header('Content-Type: text/html; charset=utf-8');

// Autoloading file kelas (jika ada)
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});

// Routing sederhana
$requestUri = $_SERVER['REQUEST_URI'];

// Contoh routing
if ($requestUri == '/') {
    // Tampilkan halaman utama
    ?>






<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TESTING WEBPAGE PONPES</title>
    
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link
  href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap"
  rel="stylesheet"/>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet"
    href="resources/views/layouts/layout_style/style_header.css">
</head>
<body>
  



<?php include 'resources/views/layouts/header.php'; ?>


    <div class="welcome-section">
        <h1>Selamat Datang di Official Website</h1>
        <h2>معهد ديني رجاسنجا مفتاح المعارف</h2>
        <h3>PONDOK PESANTREN MIFTAHUL MAARIF</h3>
        <h3>Rajasinga - Terisi - Indramayu</h3>
        <div class="search-section">
            <input placeholder="Search ..." type="text"/>
            <button>
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>











    <div class="program-section">
      
        <div class="container3" style="background-color: transparent;">
            <div class="title">Program Pendidikan</div>
            <button class="button" onclick="window.location.href='login.php';">
                Lainnya
                <i class="fas fa-qrcode"></i>
            </button>
            
        </div>







        <div class="programs">
            <div class="program">
                <img alt="Icon for PAUD/TK" height="80" src="assets/images/logo899.png" width="80"/>
                <p>PAUD/TK</p>
            </div>
            <div class="program">
                <img alt="Icon for STQ" height="80" src="assets/images/logo899.png" width="80"/>
                <p>STQUuU</p>
            </div>
            <div class="program">
                <img alt="Icon for SMP-IT" height="80" src="assets/images/logo899.png" width="80"/>
                <p>SMP</p>
            </div>
            <div class="program">
                <img alt="Icon for SMA" height="80" src="assets/images/logo899.png" width="80"/>
                <p>SMA</p>
            </div>
            <div class="program">
                <img alt="Icon for Daar Syari'ah" height="80" src="assets/images/logo899.png" width="80"/>
                <p>99999</p>
            </div>
            <div class="program">
                <img alt="Icon for Huffazh" height="80" src="assets/images/logo899.png" width="80"/>
                <p>Huff</p>
            </div>
        </div>
    </div>
    








    <div id="hal2">
      
      
      
        <div class="akre">
            <h1><?php echo htmlspecialchars($accreditation['title']); ?></h1>
        </div>
        <div class="accreditation">
            
            <div class="text">Pondok</div>

            <div class="text ban">BANSoOs</div>
        </div>
        <div class="content">
            <p><?php echo nl2br(htmlspecialchars($accreditation['content'])); ?></p>
        </div>
        <div class="quote">
            <i class="fas fa-quote-left"></i>
            <h2>Selayang Pandang</h2>
            <p><?php echo nl2br(htmlspecialchars($accreditation['quote'])); ?></p>
        </div>










        <div class="headerNews">
            <hr/>
         </div>  
        
        <div class="buttons">
            <?php foreach ($buttons as $button): ?>
                <a class="button" href="<?php echo htmlspecialchars($button['link']); ?>">
                    <?php echo htmlspecialchars($button['label']); ?>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="announcement">
            <h2><?php echo htmlspecialchars($announcement['title']); ?></h2>
            <p><?php echo htmlspecialchars($announcement['description']); ?></p>
            <a class="daftar-button" href="#">
                Daftar
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        
      










      
            <div class="news-section">
        <h2>Kabar Pondok</h2>

        <?php if (!empty($newsItems)): ?>
            <?php foreach ($newsItems as $news): ?>
                <div class="news-item1">
                    <img alt="Image of people distributing food supplies"
                    height="250" src="assets/images/ContainerNews.jpg" width="200"/>
                    <div class="news-title"><?php echo htmlspecialchars($news['title']); ?></div>
                    <div class="news-date">
                        <i class="fas fa-calendar-alt"></i>
                        <?php echo htmlspecialchars(date('d F Y', strtotime($news['date']))); ?>
                    </div>
                    <div class="news-time">
                        <i class="fas fa-clock"></i>
                        <?php echo htmlspecialchars($news['time']); ?>
                    </div>
                    <p><?php echo htmlspecialchars($news['content']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada berita yang tersedia.</p>
        <?php endif; ?>
    </div>








  
<div class="containerNews">
    <?php foreach ($news_container as $ContainerNews): ?>
        <div class="news-item">
            <img alt="Gambar berita" height="80" src="assets/images/berita.jpg" width="80"/>
            <div class="news-content">
                <div class="news-title">
                    <?php echo htmlspecialchars($ContainerNews['title']); ?>
                </div>
                <div class="news-description">
                    <?php echo htmlspecialchars($ContainerNews['content']); ?>
                </div>
                <div class="news-meta">
                    <div class="category">
                        <?php // Anda bisa mengganti ini dengan kategori yang sesuai ?>
                        Uncategorized
                    </div>
                    <div class="time">
                        <i class="far fa-clock"></i>
                        <?php 
                        // Menghitung selisih waktu dari tanggal berita
                        $dateDiff = (new DateTime())->diff(new DateTime($ContainerNews['date']));
                        echo $dateDiff->m . ' month' . ($dateDiff->m > 1 ? 's' : '') . ' ago'; 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<a class="view-all" href="#">
    Lihat Semua
</a>















<div class="container">
    <?php foreach ($con_article as $article): ?>
        <div class="article-card">
            <img alt="<?php echo htmlspecialchars($article['title']); ?>" height="400"
            src="<?php echo htmlspecialchars
            ($article['image']); ?>" width="600"/>
            <div class="article-content">
                <div class="article-title">
                    <?php echo htmlspecialchars($article['title']); ?>
                </div>
                <div class="article-meta">
                    <span>
                        <i class="fas fa-calendar-alt" style="color: #00a99d;"></i>
                        <?php echo date('d F Y', strtotime($article['date'])); ?>
                    </span>
                    <span>
                        <i class="fas fa-bullhorn" style="color: #00a99d;"></i>
                        Artikel
                    </span>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <a class="view-all" href="#">
        Lihat Semua
    </a>
</div>
  






      <div class="container2">
        <h1>Pertanyaan Yang Sering Diajukan</h1>
        <div class="underline"></div>
        <p class="description">
            Seiring berjalan dan berkembangnya Pondok Pesantren Rajasinga, banyak para Orang Tua baik dari dalam dan luar negeri yang ingin tahu lebih banyak informasi terkait Pondok Pesantren Rajasinga. Berikut pertanyaan yang sering diajukan oleh para Orang Tua ke Pondok Pesantren Rajasinga.
        </p>

    <div class="faq-item question-1">
        <i class="fas fa-plus"></i>
        <span>Kapan Penerimaan Peserta Santri Baru dibuka?</span>
    </div>
    <div class="answer answer-1">
        <p>Penerimaan peserta santri baru biasanya dibuka setiap tahun pada bulan Mei.</p>
    </div>

    <div class="faq-item question-2">
        <i class="fas fa-plus"></i>
        <span>Berapa biaya pendaftaran santri baru?</span>
    </div>
    <div class="answer answer-2">
        <p>Biaya pendaftaran santri baru adalah Rp 1.000.000.</p>
    </div>

    <div class="faq-item question-3">
        <i class="fas fa-plus"></i>
        <span>Apa saja syarat untuk mendaftar?</span>
    </div>
    <div class="answer answer-3">
        <p>Syarat untuk mendaftar adalah mengisi formulir dan melampirkan fotokopi akta kelahiran.</p>
    </div>

    <div class="faq-item question-4">
        <i class="fas fa-plus"></i>
        <span>Apakah ada tes masuk?</span>
    </div>
    <div class="answer answer-4">
        <p>Ya, ada tes masuk yang harus diikuti oleh calon santri.</p>
    </div>

    <div class="faq-item question-5">
        <i class="fas fa-plus"></i>
        <span>Bagaimana cara menghubungi pihak sekolah?</span>
    </div>
    <div class="answer answer-5">
        <p>Anda dapat menghubungi pihak sekolah melalui email di info@sekolah.com atau telepon di 021-12345678.</p>
    </div>

    <div class="faq-item question-6">
        <i class="fas fa-plus"></i>
        <span>Apakah ada program beasiswa?</span>
    </div>
    <div class="answer answer-6">
        <p>Ya, kami menyediakan program beasiswa untuk santri berprestasi. Silakan cek website kami untuk informasi lebih lanjut.</p>
    </div>
    




</div>





<div class="header15">
        <h1> Lembaga</h1>
        <hr/>
    </div>
    <div class="logos" id="logos">
        <img alt="Logo of IPAI 1961" height="150" src="assets/images/logo899.png" width="150"/>
        <img alt="Logo of an institution with a shield and star" height="150"
        src="assets/images/logo899.png" width="150"/>
        <img alt="Logo of Universitas Mercu Buana" height="150" src="assets/images/logo899.png" width="150"/>
        <!-- Salinan gambar untuk efek infinity -->
        <img alt="Logo of IPAI 1961" height="150" src="assets/images/logo899.png" width="150"/>
        <img alt="Logo of an institution with a shield and star" height="150" src="assets/images/logo899.png" width="150"/>
        <img alt="Logo of Universitas Mercu Buana" height="150" src="assets/images/logo899.png" width="150"/>
    </div>
    <div class="footer15">
        <p>Pondok Pesantren DEMAK BEH DIKIT © All Rights Reserved</p>
    </div>

  

  
    </div>





    <script src="resources/views/layouts/layout_script/header.js"></script>
    <script src="assets/js/script-faq.js"></script>
</body>
</html>

    <?php
} elseif ($requestUri == '/about') {
    // Include about.php here
} else {
    // Include 404.php here
}