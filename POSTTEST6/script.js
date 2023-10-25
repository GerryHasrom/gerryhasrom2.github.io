// Terdapat 3 DOM, 1 POP UP BOX yaitu Alert, dan 1 Event Listener

// Bagian Tombol toggle dark mode 
const darkModeToggleButton = document.getElementById('dark-mode-toggle');

// Fungsi untuk mengaktifkan/menonaktifkan mode dark
function toggleDarkMode() {
  document.body.classList.toggle('dark-mode');

  // Mengambil referensi ke elemen "Gerry Estate Official (GEO)"
  const geoElement = document.querySelector('.navbar-logo h1');

  // Memeriksa apakah dark mode aktif
  if (document.body.classList.contains('dark-mode')) {
    // Jika dark mode aktif, ubah warna teks "Gerry Estate Official (GEO)" menjadi orange
    geoElement.style.color = 'orange';
    // Ubah teks tombol menjadi "Light Mode" saat dark mode aktif
    darkModeToggleButton.textContent = 'Light Mode';
  } else {
    // Jika dark mode tidak aktif, kembalikan warna teks "Gerry Estate Official (GEO)" ke warna putih
    geoElement.style.color = 'white';
    // Ubah teks tombol menjadi "Dark Mode" saat dark mode tidak aktif
    darkModeToggleButton.textContent = 'Dark Mode';
  }
}

// Tambahkan event listener untuk tombol toggle dark mode
darkModeToggleButton.addEventListener('click', toggleDarkMode);

// Bagian jam untuk mengatur waktu sesuai jam pada laptop
setInterval(() => {
  let date = new Date();
  let clock = document.getElementById('clock');
  clock.innerHTML =
    date.getHours() + ':' +
    (date.getMinutes() < 10 ? '0' : '') + date.getMinutes() + ':' +
    (date.getSeconds() < 10 ? '0' : '') + date.getSeconds();
}, 1000);

// Fungsi untuk fitur pencarian rumah berdasarkan nama
function searchHouse() {
  // Ambil nilai input pencarian
  const searchTerm = document.getElementById('search').value.toLowerCase();

  // Ambil semua elemen kartu rumah
  const houseCards = document.querySelectorAll('.content-card');

  let found = false; 

  // Loop melalui setiap kartu rumah
  houseCards.forEach((card) => {
    const houseName = card.querySelector('h3').textContent.toLowerCase();

    // Periksa apakah nama rumah sesuai dengan pencarian
    if (houseName.includes(searchTerm)) {
      card.style.display = 'block'; 
      found = true; 
    } else {
      card.style.display = 'none'; 
    }
  });

  // Tampilkan pesan jika rumah tidak ditemukan menggunakan alert
  if (!found) {
    const customMessage = "Maaf, tidak ada rumah yang sesuai dengan pencarian Anda";
    alert(customMessage);
  }
}

// Fungsi untuk mengubah mode tampilan password
function togglePasswordVisibility() {
  const passwordInput = document.getElementById("password");
  const showPasswordCheckbox = document.getElementById("showPassword");

  passwordInput.type = showPasswordCheckbox.checked ? "text" : "password";
}

// Menambahkan event listener untuk checkbox
const showPasswordCheckbox = document.getElementById("showPassword");
showPasswordCheckbox.addEventListener("change", togglePasswordVisibility);

// Event listener untuk form login
const loginForm = document.getElementById('login-form');
loginForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const username = loginForm.username.value;
    const password = loginForm.password.value;
    // Add your login logic here
    alert(`Logged in as ${username}`);
});

// Event listener untuk checkbox pada form login
const showPasswordCheckboxLogin = document.getElementById("showPasswordLogin");
const passwordInputLogin = document.getElementById("passwordLogin");

showPasswordCheckboxLogin.addEventListener("change", () => {
  passwordInputLogin.type = showPasswordCheckboxLogin.checked ? "text" : "password";
});

// Event listener untuk DOMContentLoaded
document.addEventListener("DOMContentLoaded", function () {
  var showPasswordCheckbox = document.getElementById("showPassword");
  var passwordInput = document.getElementById("password");

  showPasswordCheckbox.addEventListener("change", function () {
    if (this.checked) {
      passwordInput.type = "text";
    } else {
      passwordInput.type = "password";
    }
  });
});

// Menambahkan event click ke tombol
document.getElementById("myButton").addEventListener("click", function() {
  // Arahkan ke halaman CRUD (Gantilah URL sesuai dengan yang Anda butuhkan)
  window.location.href = "halaman_crud.html";
});



