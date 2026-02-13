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
            <p>My Love,</p>

            <p>
              I wanted to take a moment today to sit down and actually put into words what you mean to me. Sometimes life moves so fast that I forget to stop and tell you that you are the best thing that has ever happened to me.
            </p>

            <p>
              I still remember [mention a small detail from when you first met, e.g., the first time we talked / what you were wearing / how nervous I was]. Back then, I knew you were special, but I had no idea how much you would come to define my world. You aren't just my girlfriend; you're the person I want to tell every bit of news to, the first person I want to see when I wake up, and the peace I look forward to at the end of a long day.
            </p>

            <p>
              I love the way you [mention a specific quirk, e.g., scrunch your nose when you laugh / handle things with such grace / always know how to make me feel better]. It's the little things—the way we can sit in silence and it's never awkward, or the way we have a whole language of inside jokes that nobody else understands. You make me want to be a better version of myself, not because you ask me to, but because you deserve the absolute best.
            </p>

            <p>
              Thank you for choosing me every day. Thank you for your patience, your kindness, and your heart. I don't know exactly what the future holds, but as long as you're in it, I know it's going to be incredible.
            </p>

            <p>
              Happy Valentine's Day, beautiful. I love you more than I can put into this letter.
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
