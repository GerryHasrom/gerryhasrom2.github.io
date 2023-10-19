<!-- Bagian Contact -->
<section id="contact" class="contact-container">
  <div class="contact-card">
    <h1>Contact Us</h1>
    <form id="contact-form" action="process.php" method="POST">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </div>
      <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" min="1" required>
      </div>
      <div class="form-group">
        <label for="occupation">Occupation:</label>
        <input type="text" id="occupation" name="occupation" required>
      </div>
      <div class="form-group">
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <label for="show-password" class="show-password-label">
          <input type="checkbox" id="showPassword"> Tampilkan Password
        </label>
      </div>
      <div class="form-group">
        <label for="comment">Kirim pesan anda!:</label>
        <textarea id="comment" name="comment" rows="4" required></textarea>
      </div>      
      <button type="submit" onclick="saveContactData()">Submit</button>
    </form>
  </div>
</section>

<script>
function saveContactData() {
  // Ambil nilai dari formulir
  var name = document.getElementById("name").value;
  var gender = document.getElementById("gender").value;
  var age = document.getElementById("age").value;
  var occupation = document.getElementById("occupation").value;
  var location = document.getElementById("location").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  var comment = document.getElementById("comment").value;

  // Buat objek data
  var contactData = {
    name: name,
    gender: gender,
    age: age,
    occupation: occupation,
    location: location,
    email: email,
    password: password
  };

  // Ubah objek data menjadi JSON
  var jsonData = JSON.stringify(contactData);

  // Simpan data ke Local Storage
  localStorage.setItem("contactData", jsonData);

  // Konfirmasi penyimpanan data
  alert("Data kontak telah disimpan.");

  // Anda juga dapat mengirimkan data ke server di sini jika diperlukan
}
</script>

