<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home | For My Love</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
  <div class="hearts-bg" aria-hidden="true"></div>

  <nav class="nav">
    <a href="home.php" class="nav-link active">Home</a>
    <a href="memories.php" class="nav-link">Memories</a>
    <a href="gallery.php" class="nav-link">Gallery</a>
    <a href="message.php" class="nav-link">Message</a>
    <a href="reasons.php" class="nav-link">Reasons</a>
    <a href="music.php" class="nav-link">Music</a>
  </nav>

  <main>
    <section class="section hero">
      <h1 class="welcome">Welcome, MJ <span class="heart-icon">♥</span></h1>
      <p class="intro">
        This website is for our memories in every month we spent together, and how we surpassed every problem we encountered. Through ups and downs, we're still together, always stronger.
      </p>
      <blockquote class="quote">
        "Love isn't about how many days or months you've been together, it's about how much you love each other every single day." <span class="heart-icon">♥</span>
      </blockquote>
      <p class="sign-off">Forever and Always, Yours <span class="heart-icon">♥</span></p>
      <button type="button" class="home-cta-btn" id="openValentinePopup">Click Here</button>
    </section>
  </main>

  <div class="valentine-modal" id="valentineModal" aria-hidden="true">
    <div class="valentine-card">
      <h3>Hey Cutie!</h3>
      <img
        src="valentine-cat.gif"
        alt="Cute cat holding a flower"
        class="valentine-gif">
      <p>Will you be my Valentine?</p>
      <div class="valentine-actions">
        <button type="button" class="valentine-yes">Yes</button>
        <button type="button" class="valentine-no" id="valentineNoBtn">No</button>
      </div>
    </div>
  </div>

  <div class="valentine-modal" id="valentineConfirmModal" aria-hidden="true">
    <div class="valentine-card">
      <h3>Wait...</h3>
      <img
        src="valentine-bear.gif"
        alt="Cute bear asking are you sure"
        class="valentine-gif">
      <p>Are you sure?</p>
      <div class="valentine-actions">
        <button type="button" class="valentine-yes">Yes</button>
        <button type="button" class="valentine-no" id="closeValentineConfirm">No</button>
      </div>
    </div>
  </div>

  <div class="valentine-modal" id="valentineYayModal" aria-hidden="true">
    <div class="valentine-card">
      <h3>YAY! Happy Valentine's Day!</h3>
      <img
        src="valentine-hug.gif"
        alt="Cute hugging bears with hearts"
        class="valentine-gif">
      <p>I love you so much! <span class="heart-icon">♥</span></p>
      <div class="valentine-actions">
        <button type="button" class="valentine-yes" id="valentineYayContinue">Continue</button>
      </div>
    </div>
  </div>

  <footer class="site-footer">
    <p>Made with love for MJ <span class="heart-icon">♥</span></p>
  </footer>

  <script src="script.js"></script>
</body>
</html>
