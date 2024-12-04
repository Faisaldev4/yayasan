
// Sembunyikan semua jawaban saat halaman dimuat
document.querySelectorAll('.answer').forEach(answer => {
    answer.style.display = "none"; // Atur display menjadi none
});

// Tambahkan event listener untuk setiap item FAQ
document.querySelectorAll('.faq-item').forEach(item => {
    item.addEventListener('click', () => {
        // Ambil jawaban yang terkait dengan item yang diklik
        const answer = item.nextElementSibling;

        // Toggle jawaban untuk item yang diklik
        if (answer.style.display === "block") {
            answer.style.display = "none"; // Sembunyikan jawaban jika sudah terbuka
            item.querySelector('i').classList.remove('fa-minus'); // Ganti ikon
            item.querySelector('i').classList.add('fa-plus'); // Ganti ikon
        } else {
            answer.style.display = "block"; // Tampilkan jawaban
            item.querySelector('i').classList.remove('fa-plus'); // Ganti ikon
            item.querySelector('i').classList.add('fa-minus'); // Ganti ikon
        }

        // Sembunyikan jawaban lainnya
        document.querySelectorAll('.answer').forEach(otherAnswer => {
            if (otherAnswer !== answer) {
                otherAnswer.style.display = "none"; // Sembunyikan jawaban lainnya
                otherAnswer.previousElementSibling.querySelector('i').classList.remove('fa-minus'); // Ganti ikon
                otherAnswer.previousElementSibling.querySelector('i').classList.add('fa-plus'); // Ganti ikon
            }
        });
    });
});




