<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Music | For My Love</title>
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
    <a href="gallery.php" class="nav-link">Gallery</a>
    <a href="message.php" class="nav-link">Message</a>
    <a href="reasons.php" class="nav-link">Reasons</a>
    <a href="music.php" class="nav-link active">Music</a>
  </nav>

  <main>
    <section class="section music-section">
      <h2 class="music-title">Music</h2>
      <p class="music-subtitle">This song reminds me of you.</p>

      <div class="music-card">
        <iframe
          data-testid="embed-iframe"
          style="border-radius:12px"
          src="https://open.spotify.com/embed/track/3NLnwwAQbbFKcEcV8hDItk?utm_source=generator"
          width="100%"
          height="352"
          frameBorder="0"
          allowfullscreen=""
          allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
          loading="lazy">
        </iframe>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <p>Made with love for MJ <span class="heart-icon">♥</span></p>
  </footer>

  <script src="script.js"></script>
</body>
</html>
