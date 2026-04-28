<?php
    // Head
    loadPartial('head');
    // Navbar
    loadPartial('navbar');
?>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Cormorant+Garamond:ital,wght@0,300;0,600;1,300&display=swap');

  :root {
    --ink: #0e0e0e;
    --paper: #f5f0e8;
    --red: #d63a2f;
    --muted: #9a9084;
  }

  .error-section {
    background: var(--paper);
    min-height: calc(100vh - 64px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem;
    position: relative;
    overflow: hidden;
    font-family: 'Space Mono', monospace;
  }

  /* Subtle grid background */
  .error-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image:
      linear-gradient(var(--muted) 1px, transparent 1px),
      linear-gradient(90deg, var(--muted) 1px, transparent 1px);
    background-size: 40px 40px;
    opacity: 0.08;
    pointer-events: none;
  }

  .error-wrapper {
    position: relative;
    max-width: 680px;
    width: 100%;
  }

  /* Big stamp-like 404 */
  .error-stamp {
    font-family: 'Space Mono', monospace;
    font-weight: 700;
    font-size: clamp(6rem, 20vw, 12rem);
    line-height: 0.85;
    color: transparent;
    -webkit-text-stroke: 2px var(--ink);
    letter-spacing: -4px;
    user-select: none;
    position: relative;
    display: inline-block;
  }

  /* Glitch layers */
  .error-stamp::before,
  .error-stamp::after {
    content: '404';
    position: absolute;
    top: 0; left: 0;
    -webkit-text-stroke: 2px;
    animation: glitch 4s infinite;
  }
  .error-stamp::before {
    -webkit-text-stroke-color: var(--red);
    color: transparent;
    clip-path: polygon(0 20%, 100% 20%, 100% 45%, 0 45%);
    animation-delay: 0.1s;
  }
  .error-stamp::after {
    -webkit-text-stroke-color: #3a6fd6;
    color: transparent;
    clip-path: polygon(0 55%, 100% 55%, 100% 75%, 0 75%);
    animation-delay: 0.3s;
  }

  @keyframes glitch {
    0%, 88%, 100% { transform: translate(0); opacity: 0; }
    90% { transform: translate(-4px, 2px); opacity: 1; }
    92% { transform: translate(4px, -2px); opacity: 1; }
    94% { transform: translate(-2px, 0); opacity: 1; }
    96% { transform: translate(0); opacity: 0; }
  }

  /* Divider line */
  .error-rule {
    width: 100%;
    height: 1px;
    background: var(--ink);
    margin: 1.5rem 0;
    position: relative;
  }
  .error-rule::after {
    content: '■';
    position: absolute;
    right: 0;
    top: -7px;
    font-size: 0.65rem;
    color: var(--red);
  }

  /* Meta row */
  .error-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.65rem;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 1.5rem;
  }

  /* Main headline */
  .error-headline {
    font-family: 'Cormorant Garamond', serif;
    font-weight: 300;
    font-style: italic;
    font-size: clamp(2rem, 5vw, 3.2rem);
    line-height: 1.1;
    color: var(--ink);
    margin-bottom: 1.25rem;
  }
  .error-headline span {
    font-style: normal;
    font-weight: 600;
  }

  /* Body copy */
  .error-body {
    font-family: 'Space Mono', monospace;
    font-size: 0.78rem;
    line-height: 1.8;
    color: var(--muted);
    max-width: 420px;
    margin-bottom: 2.5rem;
  }

  /* Action row */
  .error-actions {
    display: flex;
    align-items: center;
    gap: 2rem;
    flex-wrap: wrap;
  }

  .btn-home {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: var(--ink);
    color: var(--paper);
    font-family: 'Space Mono', monospace;
    font-size: 0.72rem;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    text-decoration: none;
    padding: 0.85rem 1.75rem;
    border: none;
    cursor: pointer;
    position: relative;
    transition: all 0.2s;
  }
  .btn-home::after {
    content: '';
    position: absolute;
    bottom: -4px;
    right: -4px;
    width: 100%;
    height: 100%;
    border: 1px solid var(--ink);
    transition: all 0.2s;
  }
  .btn-home:hover {
    background: var(--red);
    transform: translate(-2px, -2px);
  }
  .btn-home:hover::after {
    transform: translate(4px, 4px);
  }

  .link-back {
    font-family: 'Space Mono', monospace;
    font-size: 0.72rem;
    letter-spacing: 0.08em;
    color: var(--muted);
    text-decoration: none;
    border-bottom: 1px solid transparent;
    transition: color 0.2s, border-color 0.2s;
  }
  .link-back:hover {
    color: var(--ink);
    border-color: var(--ink);
  }

  /* Corner decoration */
  .corner-mark {
    position: absolute;
    bottom: -2rem;
    right: 0;
    font-family: 'Cormorant Garamond', serif;
    font-style: italic;
    font-size: 0.7rem;
    color: var(--muted);
    opacity: 0.5;
    writing-mode: vertical-rl;
    letter-spacing: 0.1em;
  }

  /* Scan line animation on load */
  .error-wrapper {
    animation: fadeUp 0.6s ease both;
  }
  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
  }
</style>

<section class="error-section">
  <div class="error-wrapper">

    <div class="error-meta">
      <span>HTTP/1.1 — STATUS CODE</span>
      <span><?php echo date('Y · m · d'); ?></span>
    </div>

    <div class="error-stamp">404</div>

    <div class="error-rule"></div>

    <h1 class="error-headline">
      The page you're looking for<br>
      <span>doesn't exist.</span>
    </h1>

    <p class="error-body">
      It may have been moved, deleted, or perhaps it never existed at all.
      Check the URL for typos, or head back to familiar ground.
    </p>

    <div class="error-actions">
      <a href="/" class="btn-home">
        ← Return Home
      </a>
      <a href="javascript:history.back()" class="link-back">Go back</a>
    </div>

    <div class="corner-mark">page not found</div>
  </div>
</section>

<?php loadPartial('footer'); ?>


<!-- <?php
    // Head
   //  loadPartial('head');
    // Navbar
   //  loadPartial('navbar');
    // // Top Banner
    // loadPartial('topBanner');
?>
<section>
      <div class="container mx-auto p-4 mt-4">
         <div class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">404 Error</div>
         <p class="text-center text-2xl mb-4">
            This page does not exist
         </p>
      </div>
</section> -->