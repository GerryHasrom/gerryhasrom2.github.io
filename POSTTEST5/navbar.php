<!-- Bagian Navbar -->
<nav class="navbar">
    <div class="navbar-logo">
      <h1 id="navbar-logo">Gerry Estate Official (GEO) </h1>
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
  
    <!-- pencarian nama rumah -->
    <div class="navbar-search">
      <input type="text" id="search" oninput="searchHouse()" placeholder="Cari rumah...">
      <label for="search" class="search-label">
        <i class="fas fa-search"></i>
      </label>
    </div>
</nav>