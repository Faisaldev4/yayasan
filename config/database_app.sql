
CREATE TABLE accreditation_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    quote TEXT NOT NULL
);

INSERT INTO accreditation_info (title, content, quote) VALUES
('Terakreditasi', 'Alhamdulillah, pada bulan Robiul Awal 1443 H / Oktober 2021
Pondok Pesantren Rajasinga telah meraih Akreditasi Buper. Dengan demikian,
ijazah Pondok Pesantren Rajasinga secara resmi diakui.', 'إن الحمد لله نستعينه
ونستغفره ونعوذ بالله من شرور أنفسنا وسيئات أعمالنا فمن يهده الله فلا مضل له ومن
يضلل فلا هادي له وأشهد أن لا إله إلا الله وأشهد أن محمدا عبده ورسوله. وبعد
Alhamdulillah dengan izin Allah dan taufiq dari-Nya telah berdiri sebuah lembaga
pendidikan islam di kampung Rocek, kecamatan Cimanuk, kabupaten Pandeglang,
Banten bernama yayasan pondok pesantren Rajasinga yang bergelut di bidang
pendidikan islam secara formal.');


CREATE TABLE announcements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE buttons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(255) NOT NULL,
    link VARCHAR(255) NOT NULL
);

INSERT INTO announcements (title, description) VALUES 
('Segera Dibuka Pendaftaran Santri Baru T.A 2025/2026', 'Segera Dibuka Pendaftaran Santri Baru Ponpes Rajasinga Terisi T.A 2025/2026');

INSERT INTO buttons (label, link) VALUES 
('Profil', '#'),
('Visi Misi', '#');



CREATE TABLE news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    time VARCHAR(50),
    content TEXT NOT NULL
);


INSERT INTO news (title, date, time, content) 
VALUES 
    ('Judul Berita Kedua', '2023-10-02', '11:00', 'Ini adalah konten berita kedua.'),
    ('Judul Berita Ketiga', '2023-10-03', '12:00', 'Ini adalah konten berita ketiga.'),
    ('Judul Berita Keempat', '2023-10-04', '13:00', 'Ini adalah konten berita keempat.');



CREATE TABLE ContainerNews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    time VARCHAR(50),
    content TEXT NOT NULL
);


INSERT INTO ContainerNews (title, date, time, content) 
VALUES 
    ('Judul Berita Kedua', '2023-10-02', '11:00', 'Ini adalah konten berita kedua.'),
    ('Judul Berita Ketiga', '2023-10-03', '12:00', 'Ini adalah konten berita ketiga.'),
    ('Judul Berita Keempat', '2023-10-04', '13:00', 'Ini adalah konten berita keempat.');




CREATE TABLE article (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(255) DEFAULT 'assets/images/news.jpg' -- Menyimpan URL gambar
);

INSERT INTO article (title, date, content, image) VALUES
('PENERIMAAN SANTRI BARU', '2024-08-21', 'Deskripsi tentang penerimaan santri baru.', 'assets/images/news1.jpg'),
('Ketika Kamu Bilang, "Aku Hanya Punya ..."', '2023-11-04', 'Deskripsi tentang artikel ini.', 'assets/images/news2.jpg'),
('Merasa Sudah Mengamalkan Al-Qur\an', '2023-10-15', 'Deskripsi tentang pengamalan Al-Qur\an.', 'assets/images/news3.jpg'),
('2 Hal Yang Mengundang Adzab', '2023-10-15', 'Deskripsi tentang hal-hal yang mengundang adzab.', 'assets/images/news4.jpg'),
('ISTIMEWANYA KONSISTEN', '2023-10-14', 'Deskripsi tentang pentingnya konsisten.', 'assets/images/news5.jpg'),
('Banyak Penceramah Sedikitnya Ulama', '2023-08-07', 'Deskripsi tentang penceramah dan ulama.', 'assets/images/news6.jpg');






