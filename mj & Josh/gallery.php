<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery | For My Love</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
  <div class="hearts-bg" aria-hidden="true"></div>

  <nav class="nav">
    <a href="home.php" class="nav-link">Home</a>
    <a href="memories.php" class="nav-link">Memories</a>
    <a href="gallery.php" class="nav-link active">Gallery</a>
    <a href="message.php" class="nav-link">Message</a>
    <a href="reasons.php" class="nav-link">Reasons</a>
    <a href="music.php" class="nav-link">Music</a>
  </nav>

  <main>
    <section class="section">
      <h2>Gallery <span class="heart-icon">♥</span></h2>
      <p class="section-text">Six favorite moments of us, framed together forever.</p>
      
      <div class="fixed-gallery-frame">
        <div class="frame-slot"><img src="photos/photo1.jpg" alt="Photo 1"></div>
        <div class="frame-slot"><img src="photos/photo2.jpg" alt="Photo 2"></div>
        <div class="frame-slot"><img src="photos/photo3.jpg" alt="Photo 3"></div>
        <div class="frame-slot"><img src="photos/photo4.jpg" alt="Photo 4"></div>
        <div class="frame-slot"><img src="photos/photo5.jpg" alt="Photo 5"></div>
        <div class="frame-slot"><img src="photos/photo6.jpg" alt="Photo 6"></div>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <p>Made with love for MJ <span class="heart-icon">♥</span></p>
  </footer>

  <script src="script.js"></script>
</body>
</html>
