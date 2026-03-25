// ================================================
// 1. FITUR DARK MODE (LocalStroge & DOM)
// ================================================

const btnTheme = document.getElementById('btn-theme');
const body = document.body;

if (localStorage.getItem('theme') === 'dark') {
    body    .classList.add('dark-mode');
    btnTheme.textContent = "☀️";
}

btnTheme.addEventListener('click', () => {
    body.classList.toggle('dark-mode');
    
    // Menyimpan tema ke localStorage
    if (body.classList.contains('dark-mode')) {
        localStorage.setItem('theme', 'dark');
        btnTheme.textContent = '☀️';
    } else {
        localStorage.setItem('theme', 'light');
        btnTheme.textContent = '🌙';
    }    
});

// ================================================
// 2. Fitur Pengelolaan Stok Cabin
// ================================================
const tombolBooking = document.querySelectorAll('.btn-booking');

tombolBooking.forEach(function(button) {

    button.addEventListener('click', function() {
        const card = this.closest('.card');        
        const stokElement = card.querySelector('.stok');

        // untuk mengambil nilai stok dan mengubahnya menjadi angka
        let stok = parseInt(stokElement.textContent);

        if (stok > 0) {
            const konfirmasi = confirm('Apakah Anda yakin ingin memesan cabin ini?');
            if (konfirmasi) {
                stok--;
                stokElement.textContent = stok;
                alert('Cabin berhasil dipesan!');
            } else {
                alert('Pemesanan dibatalkan.');
            }
        } else {
            alert('Maaf, stok cabin ini sudah habis.');
        }
    }); 

})    

// ================================================
// 3. Fitur Wishlist (Session Storage & DOM)
// ================================================

const tombolWishlist = document.querySelectorAll('.btn-wishlist');

function updateWishlistCount() {
    const wishlist = JSON.parse(sessionStorage.getItem('wishlist')) || [];
    document.getElementById('wishlistCount').textContent = wishlist.length;
}

tombolWishlist.forEach(button => {

    const card = button.closest('.card');
    const namaCabin = card.querySelector('.card-title').innerText;

    let wishlist = JSON.parse(sessionStorage.getItem('wishlist')) || [];

    if (wishlist.includes(namaCabin)) {
        button.classList.replace('btn-outline-warning', 'btn-danger');
        button.innerText = "❤️ Disimpan";
    }

    button.addEventListener('click', () => {

        let wishlist = JSON.parse(sessionStorage.getItem('wishlist')) || [];

        if (!wishlist.includes(namaCabin)) {

            wishlist.push(namaCabin);

            button.classList.add('active');
            button.innerText = "❤️ Disimpan";
            alert(namaCabin + " berhasil ditambahkan ke wishlist!");

        } else {

            wishlist = wishlist.filter(item => item !== namaCabin);

            button.classList.remove('active');
            button.innerText = "⭐ Wishlist";

        }

        sessionStorage.setItem('wishlist', JSON.stringify(wishlist));
        updateWishlistCount();

    });

});

updateWishlistCount();

// ================================================
// 4. Menampilkan wishlist di modal 
// ================================================

function tampilkanWishlist() {

    const daftar = document.getElementById('daftar-wishlist');
    daftar.innerHTML = '';

    wishlist = JSON.parse(sessionStorage.getItem('wishlist')) || [];

    wishlist.forEach(function(item) {

        const li = document.createElement('li');
        li.className = 'list-group-item d-flex justify-content-between align-items-center';
        li.innerHTML = `
                        ${item} 
                        <button class="btn btn-sm btn-danger" onclick="hapusItemWishlist('${item}')">
                            Hapus
                        </button>
                        `;
        daftar.appendChild(li);
    });

}

// ================================================
// 6. Menghapus item tertentu dari wishlist
// ================================================
function hapusItemWishlist(namaCabin) {

    let wishlist = JSON.parse(sessionStorage.getItem('wishlist')) || [];

    wishlist = wishlist.filter(item => item !== namaCabin);

    sessionStorage.setItem('wishlist', JSON.stringify(wishlist));

    updateTombolWishlist();
    tampilkanWishlist();
    updateWishlistCount();
    

}


// ================================================
// 5. Menghapus semua daftar wishlist
// ================================================

function hapusWishlist(item) {

    sessionStorage.removeItem('wishlist');
    wishlist = [];
    tampilkanWishlist();
    updateWishlistCount();
    updateTombolWishlist();
    
}

// ================================================
// 5. fungsi update tombol wishlist
// ================================================

function updateTombolWishlist() {
    const tombolWishlist = document.querySelectorAll('.btn-wishlist');
    const wishlist = JSON.parse(sessionStorage.getItem('wishlist')) || [];

    tombolWishlist.forEach(button => {
        const card = button.closest('.card');
        const namaCabin = card.querySelector('.card-title').innerText;

        if (wishlist.includes(namaCabin)) {
            button.classList.replace('btn-outline-warning', 'btn-danger');
            button.innerText = "❤️ Disimpan";
        } else {
            button.classList.replace('btn-danger', 'btn-outline-warning');
            button.innerText = "⭐ Wishlist";
        }
    })
}


//bagian untuk menjalankan saat halaman pertama kali dibuka
updateWishlistCount();
updateTombolWishlist();

// ================================================
// ================================================
function toggleMenu() {
    const menu = document.getElementById("dropdownMenu");

    if (menu.style.display === "block") {
        menu.style.display = "none";
    } else {
        menu.style.display = "block";
    }
}