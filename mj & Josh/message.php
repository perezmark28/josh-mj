<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Message | For My Love</title>
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
    <a href="message.php" class="nav-link active">Message</a>
    <a href="reasons.php" class="nav-link">Reasons</a>
    <a href="music.php" class="nav-link">Music</a>
  </nav>

  <main>
    <section class="section">
      <h2>Message <span class="heart-icon">♥</span></h2>
      <p class="section-text">Tap the envelope to open your letter.</p>

      <div class="envelope-container" id="envelopeContainer">
        <div class="envelope" id="envelope">
          <div class="envelope-back"></div>
          <div class="envelope-body"></div>
          <div class="envelope-flap" id="envelopeFlap">
            <div class="envelope-text">Happy Valentine's Day</div>
            <div class="envelope-heart">♥</div>
          </div>
          <div class="envelope-letter" id="envelopeLetter">
            <div class="letter-card">
              <div class="letter-card-inner">
                <div class="letter-header">
                  <span class="letter-tag">Love Letter</span>
                  <span class="letter-heart">♥</span>
                </div>

                <div class="letter-body">
            <p>Dear Mj,</p>

            <p>
              First of all, Happy Valentine’s Day! It’s weird na dalawang Valentine’s day na ang nagdaan sa relationship natin pero eto ang first time natin mag‑cecelebrate. Pakagat pa more sa lamok HAHAHA!
            </p>

            <p>
              Well anyway, we’re almost 2 years together and I can definitely say that these are the happiest days of my life. There were ups and downs, laughter, fights, but we were able to manage through it all.
            </p>

            <p>
              No need na sa mga long cheesy messages—basta ipapakita at ipaparamdam ko na lang sayo the best that I can.
            </p>

            <p>
              Happy Valentine’s Day, my love. To more adventures, gala, kain, and shopping to us!
            </p>

                <p class="letter-signoff">
                  Forever yours,<br>
                  <span class="letter-signature">Josh</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <p>Made with love for MJ <span class="heart-icon">♥</span></p>
  </footer>

  <script src="script.js"></script>
</body>
</html>
