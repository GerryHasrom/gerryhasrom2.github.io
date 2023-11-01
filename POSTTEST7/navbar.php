<!-- Bagian Navbar -->
<nav class="navbar">
    <div class="navbar-logo">
        <h1 id="navbar-logo">Gerry Estate Official (GEO)</h1>
    </div>
    <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About Me</a></li>
        <li><a href="#content">Content</a></li>
        <li><a href="#contact">Contact Us</a></li>
    </ul>

    <!-- Jam -->
    <div class="mode-toggle">
        <button id="dark-mode-toggle">
            Dark Mode
        </button>
        <div id="clock" class="clock">00:00:00</div>
    </div>

    <!-- login -->
    <div class="navbar-login">
        <a href="CRUD/login.php" style="text-decoration: none; color: #fff;">
            <button id="login-button" style="background-color: #303030; color: #fff; border: none; border-radius: 5px; padding: 10px 20px; font-size: 16px; cursor: pointer;">
                Login
            </button>
        </a>
    </div>

    <!-- Pencarian Nama Rumah -->
    <div class="navbar-search">
        <input type="text" id="search" oninput="searchHouse()" placeholder="Cari rumah..." style="margin-left: 50px;">
        <label for="search" class="search-label">
            <i class="fas fa-search"></i>
        </label>
    </div>
</div>
</nav>

