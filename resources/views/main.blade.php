<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Portfolio — Your Name</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet" />
<style>
  /* ── PALETTE: Slate Navy · Warm Ivory · White ── */
  :root {
    --navy:   #1B2340;
    --navy-mid: #2C3A5C;
    --navy-faint: #E8EBF3;
    --ivory:  #F7F5F0;
    --white:  #FFFFFF;
    --text-primary: #1B2340;
    --text-muted: #6B7488;
    --border: rgba(27,35,64,.1);
    --serif: 'DM Serif Display', Georgia, serif;
    --sans:  'DM Sans', system-ui, sans-serif;
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  html { scroll-behavior: smooth; }

  body {
    font-family: var(--sans);
    background: var(--white);
    color: var(--text-primary);
    font-size: 16px;
    line-height: 1.7;
    overflow-x: hidden;
  }

  /* ── SCROLLBAR ── */
  ::-webkit-scrollbar { width: 4px; }
  ::-webkit-scrollbar-track { background: var(--ivory); }
  ::-webkit-scrollbar-thumb { background: var(--navy-mid); border-radius: 2px; }

  /* ── NAV ── */
  nav {
    position: fixed;
    top: 0; left: 0; right: 0;
    z-index: 100;
    background: rgba(255,255,255,.92);
    backdrop-filter: blur(12px);
    border-bottom: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 6vw;
    height: 64px;
  }

  .nav-logo {
    font-family: var(--serif);
    font-size: 1.25rem;
    color: var(--navy);
    letter-spacing: -.01em;
    text-decoration: none;
  }

  .nav-links {
    display: flex;
    gap: 2.5rem;
    list-style: none;
  }

  .nav-links a {
    font-size: .875rem;
    font-weight: 400;
    color: var(--text-muted);
    text-decoration: none;
    letter-spacing: .04em;
    text-transform: uppercase;
    transition: color .2s;
  }

  .nav-links a:hover { color: var(--navy); }

  /* ── HERO ── */
  #hero {
    min-height: 100vh;
    background: var(--navy);
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
    padding: 0 6vw;
    position: relative;
    overflow: hidden;
  }

  /* decorative circles */
  #hero::before, #hero::after {
    content: '';
    position: absolute;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,.07);
    pointer-events: none;
  }
  #hero::before { width: 600px; height: 600px; right: -120px; bottom: -180px; }
  #hero::after  { width: 360px; height: 360px; right: 80px;  bottom: -60px; }

  .hero-text { position: relative; z-index: 2; }

  .hero-tag {
    display: inline-block;
    font-size: .75rem;
    font-weight: 500;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: rgba(255,255,255,.5);
    margin-bottom: 1.5rem;
    padding: .35rem .9rem;
    border: 1px solid rgba(255,255,255,.15);
    border-radius: 100px;
  }

  .hero-name {
    font-family: var(--serif);
    font-size: clamp(2.8rem, 5vw, 4.5rem);
    color: var(--white);
    line-height: 1.1;
    margin-bottom: 1rem;
    letter-spacing: -.02em;
  }

  .hero-name em {
    font-style: italic;
    color: rgba(255,255,255,.5);
  }

  .hero-desc {
    font-size: 1.05rem;
    color: rgba(255,255,255,.6);
    max-width: 480px;
    margin-bottom: 2.5rem;
    font-weight: 300;
  }

  .hero-cta {
    display: inline-flex;
    align-items: center;
    gap: .6rem;
    background: var(--white);
    color: var(--navy);
    font-family: var(--sans);
    font-size: .875rem;
    font-weight: 500;
    padding: .85rem 2rem;
    border-radius: 100px;
    text-decoration: none;
    letter-spacing: .02em;
    transition: opacity .2s, transform .2s;
  }
  .hero-cta:hover { opacity: .9; transform: translateY(-2px); }

  .hero-cta-ghost {
    display: inline-flex;
    align-items: center;
    gap: .6rem;
    color: rgba(255,255,255,.7);
    font-size: .875rem;
    font-weight: 400;
    padding: .85rem 1.5rem;
    text-decoration: none;
    border: 1px solid rgba(255,255,255,.2);
    border-radius: 100px;
    transition: border-color .2s, color .2s;
    margin-left: .75rem;
  }
  .hero-cta-ghost:hover { border-color: rgba(255,255,255,.5); color: var(--white); }

  .hero-right {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    position: relative;
    z-index: 2;
  }

  .hero-avatar {
    width: clamp(260px, 28vw, 420px);
    aspect-ratio: 3/4;
    background: var(--navy-mid);
    border-radius: 12px;
    overflow: hidden;
    display: flex;
    align-items: flex-end;
    justify-content: center;
    border: 1px solid rgba(255,255,255,.08);
  }

  .avatar-placeholder {
    width: 100%;
    height: 80%;
    background: linear-gradient(180deg, transparent, var(--navy-mid));
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .avatar-initials {
    font-family: var(--serif);
    font-size: clamp(4rem, 8vw, 7rem);
    color: rgba(255,255,255,.15);
    user-select: none;
  }

  /* ── SECTION BASE ── */
  section { padding: 7rem 6vw; }

  .section-label {
    font-size: .7rem;
    font-weight: 500;
    letter-spacing: .14em;
    text-transform: uppercase;
    color: var(--text-muted);
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: .6rem;
  }
  .section-label::before {
    content: '';
    display: block;
    width: 24px; height: 1px;
    background: var(--navy);
    opacity: .3;
  }

  .section-title {
    font-family: var(--serif);
    font-size: clamp(2rem, 3.5vw, 2.8rem);
    color: var(--navy);
    line-height: 1.15;
    letter-spacing: -.02em;
    margin-bottom: 1rem;
  }

  .section-title em { font-style: italic; color: var(--text-muted); }

  /* ── ABOUT ── */
  #about { background: var(--ivory); }

  .about-grid {
    display: grid;
    grid-template-columns: 1fr 1.4fr;
    gap: 5rem;
    align-items: start;
    margin-top: 3.5rem;
  }

  .about-body {
    font-size: 1.05rem;
    color: var(--text-muted);
    font-weight: 300;
    line-height: 1.85;
  }

  .about-body p + p { margin-top: 1.2rem; }

  .stat-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
    margin-top: 2.5rem;
  }

  .stat-card {
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 10px;
    padding: 1.4rem 1.5rem;
  }

  .stat-num {
    font-family: var(--serif);
    font-size: 2.2rem;
    color: var(--navy);
    line-height: 1;
    margin-bottom: .3rem;
  }

  .stat-label {
    font-size: .8rem;
    font-weight: 400;
    color: var(--text-muted);
    letter-spacing: .04em;
    text-transform: uppercase;
  }

  /* ── WORK / PROJECTS ── */
  #work { background: var(--white); }

  .work-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    margin-bottom: 3.5rem;
    flex-wrap: wrap;
    gap: 1rem;
  }

  .see-all {
    font-size: .875rem;
    color: var(--navy);
    text-decoration: none;
    font-weight: 500;
    border-bottom: 1px solid var(--navy);
    padding-bottom: 1px;
    transition: opacity .2s;
  }
  .see-all:hover { opacity: .6; }

  .projects-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
  }

  .project-card {
    border: 1px solid var(--border);
    border-radius: 10px;
    overflow: hidden;
    background: var(--white);
    transition: transform .25s, box-shadow .25s, border-color .25s;
    text-decoration: none;
    display: flex;
    flex-direction: column;
    padding: 2rem;
  }

  .project-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(27,35,64,.08);
    border-color: var(--navy);
  }

  .project-info { 
    display: flex;
    flex-direction: column;
  }

  .project-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--navy);
    line-height: 1.4;
    margin-bottom: .75rem;
  }

  .project-desc {
    font-size: .95rem;
    color: var(--text-muted);
    font-weight: 300;
    line-height: 1.6;
  }

  /* ── SKILLS ── */
  #skills { background: var(--navy); }

  #skills .section-label { color: rgba(255,255,255,.4); }
  #skills .section-label::before { background: rgba(255,255,255,.3); opacity: 1; }
  #skills .section-title { color: var(--white); }
  #skills .section-title em { color: rgba(255,255,255,.4); }

  .skills-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1px;
    border: 1px solid rgba(255,255,255,.07);
    border-radius: 12px;
    overflow: hidden;
    margin-top: 3.5rem;
  }

  .skill-cell {
    padding: 2rem 1.75rem;
    border-right: 1px solid rgba(255,255,255,.07);
    border-bottom: 1px solid rgba(255,255,255,.07);
    background: rgba(255,255,255,.02);
    transition: background .2s;
  }
  .skill-cell:hover { background: rgba(255,255,255,.05); }

  .skill-icon {
    font-size: 1.5rem;
    margin-bottom: .75rem;
    display: block;
  }

  .skill-name {
    font-size: .95rem;
    font-weight: 500;
    color: rgba(255,255,255,.85);
    margin-bottom: .3rem;
  }

  .skill-items {
    font-size: .8rem;
    color: rgba(255,255,255,.4);
    font-weight: 300;
    line-height: 1.6;
  }

  /* ── EXPERIENCE ── */
  #experience { background: var(--ivory); }

  .timeline {
    margin-top: 3.5rem;
    display: flex;
    flex-direction: column;
    gap: 0;
    max-width: 760px;
  }

  .timeline-item {
    display: grid;
    grid-template-columns: 140px 1fr;
    gap: 2rem;
    position: relative;
    padding-bottom: 2.5rem;
  }

  .timeline-item:last-child { padding-bottom: 0; }

  .timeline-item::before {
    content: '';
    position: absolute;
    left: 148px;
    top: 8px;
    bottom: 0;
    width: 1px;
    background: var(--border);
  }
  .timeline-item:last-child::before { display: none; }

  .timeline-item::after {
    content: '';
    position: absolute;
    left: 143px;
    top: 6px;
    width: 11px; height: 11px;
    border-radius: 50%;
    background: var(--white);
    border: 2px solid var(--navy);
  }

  .timeline-year {
    font-size: .8rem;
    font-weight: 400;
    color: var(--text-muted);
    letter-spacing: .04em;
    padding-top: 2px;
    text-align: right;
  }

  .timeline-body { padding-left: 1.5rem; }

  .timeline-role {
    font-family: var(--serif);
    font-size: 1.15rem;
    color: var(--navy);
    margin-bottom: .15rem;
  }

  .timeline-company {
    font-size: .875rem;
    font-weight: 500;
    color: var(--navy-mid);
    margin-bottom: .5rem;
  }

  .timeline-desc {
    font-size: .9rem;
    color: var(--text-muted);
    font-weight: 300;
    line-height: 1.7;
  }

  /* ── CONTACT ── */
  #contact { background: var(--white); }

  .contact-inner {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 5rem;
    align-items: start;
    margin-top: 3.5rem;
  }

  .contact-desc {
    font-size: 1.05rem;
    color: var(--text-muted);
    font-weight: 300;
    line-height: 1.85;
    margin-bottom: 2.5rem;
  }

  .contact-links { display: flex; flex-direction: column; gap: .6rem; }

  .contact-link {
    display: inline-flex;
    align-items: center;
    gap: .75rem;
    font-size: .9rem;
    color: var(--navy);
    text-decoration: none;
    font-weight: 400;
    transition: opacity .2s;
  }
  .contact-link:hover { opacity: .55; }

  .contact-link-icon {
    width: 36px; height: 36px;
    border-radius: 8px;
    border: 1px solid var(--border);
    display: flex; align-items: center; justify-content: center;
    font-size: .95rem;
  }

  /* form */
  .contact-form { display: flex; flex-direction: column; gap: 1rem; }

  .form-group { display: flex; flex-direction: column; gap: .4rem; }

  .form-group label {
    font-size: .75rem;
    font-weight: 500;
    letter-spacing: .08em;
    text-transform: uppercase;
    color: var(--text-muted);
  }

  .form-group input,
  .form-group textarea {
    font-family: var(--sans);
    font-size: .95rem;
    color: var(--text-primary);
    background: var(--ivory);
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: .8rem 1rem;
    outline: none;
    transition: border-color .2s;
    resize: none;
  }

  .form-group input:focus,
  .form-group textarea:focus {
    border-color: var(--navy);
  }

  .form-group textarea { min-height: 120px; }

  .btn-submit {
    align-self: flex-start;
    background: var(--navy);
    color: var(--white);
    font-family: var(--sans);
    font-size: .875rem;
    font-weight: 500;
    border: none;
    border-radius: 100px;
    padding: .85rem 2.2rem;
    cursor: pointer;
    letter-spacing: .02em;
    transition: opacity .2s, transform .2s;
  }
  .btn-submit:hover { opacity: .85; transform: translateY(-1px); }

  /* ── FOOTER ── */
  footer {
    background: var(--navy);
    padding: 2.5rem 6vw;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1rem;
  }

  .footer-logo {
    font-family: var(--serif);
    font-size: 1.1rem;
    color: rgba(255,255,255,.8);
    text-decoration: none;
  }

  .footer-copy {
    font-size: .8rem;
    color: rgba(255,255,255,.35);
    font-weight: 300;
  }

  /* ── ANIMATIONS ── */
  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(24px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .hero-text > * {
    opacity: 0;
    animation: fadeUp .7s ease forwards;
  }
  .hero-tag   { animation-delay: .1s; }
  .hero-name  { animation-delay: .25s; }
  .hero-desc  { animation-delay: .4s; }
  .hero-ctas  { animation-delay: .55s; }

  .hero-right {
    opacity: 0;
    animation: fadeUp .9s .35s ease forwards;
  }

  /* ── RESPONSIVE ── */
  @media (max-width: 900px) {
    #hero { grid-template-columns: 1fr; padding-top: 100px; padding-bottom: 5rem; min-height: auto; gap: 3rem; }
    .hero-right { justify-content: flex-start; }
    .about-grid { grid-template-columns: 1fr; gap: 2.5rem; }
    .projects-grid { grid-template-columns: 1fr 1fr; }
    .skills-grid { grid-template-columns: 1fr 1fr; }
    .contact-inner { grid-template-columns: 1fr; gap: 3rem; }
  }
  @media (max-width: 600px) {
    .nav-links { display: none; }
    .projects-grid { grid-template-columns: 1fr; }
    .skills-grid { grid-template-columns: 1fr 1fr; }
    .timeline-item { grid-template-columns: 1fr; }
    .timeline-item::before, .timeline-item::after { display: none; }
    .timeline-body { padding-left: 0; }
    .timeline-year { text-align: left; }
    .stat-grid { grid-template-columns: 1fr 1fr; }
  }
</style>
</head>
<body>

<!-- NAV -->
<nav>
  <a class="nav-logo" href="#hero">RDS</a>
  <ul class="nav-links">
    <li><a href="#about">About</a></li>
    <li><a href="#work">Work</a></li>
    <li><a href="#skills">Skills</a></li>
    <li><a href="#contact">Contact</a></li>
  </ul>
</nav>

<!-- HERO -->
<section id="hero">
  <div class="hero-text">
    <span class="hero-tag">Available for opportunities</span>
    <h1 class="hero-name">Rakko<br><em>Delos Santos</em></h1>
    <p class="hero-desc">Driven to contribute technical skills, problem-solving abilities, and hands-on experience to help organizations operate efficiently while continuously learning and growing in a professional environment.</p>
    <div class="hero-ctas">
      <a class="hero-cta" href="#work">View my work</a>
      <a class="hero-cta-ghost" href="#contact">Get in touch</a>
    </div>
  </div>
  <div class="hero-right">
    <div class="hero-avatar">
      <div class="avatar-placeholder">
        <span class="avatar-initials">YN</span>
      </div>
    </div>
  </div>
</section>

<!-- ABOUT -->
<section id="about">
  <span class="section-label">About me</span>
  <h2 class="section-title">A little bit<br>about <em>myself</em></h2>
  <div class="about-grid">
    <div>
      <div class="stat-grid">
        <div class="stat-card">
          <div class="stat-num">3+</div>
          <div class="stat-label">Years experience</div>
        </div>
        <div class="stat-card">
          <div class="stat-num">20+</div>
          <div class="stat-label">Projects completed</div>
        </div>
        <div class="stat-card">
          <div class="stat-num">15+</div>
          <div class="stat-label">Clients served</div>
        </div>
        <div class="stat-card">
          <div class="stat-num">100%</div>
          <div class="stat-label">Satisfaction rate</div>
        </div>
      </div>
    </div>
    <div class="about-body">
      <p>Write your introduction here. Tell your story — where you're from, what drives you, and what kind of work you're passionate about. Keep it honest and human rather than generic.</p>
      <p>Describe your approach to work, the problems you enjoy solving, or the industries you've worked in. This section is a chance to show personality beyond a list of skills.</p>
      <p>End with something forward-looking — what excites you about the future, what you're currently learning, or what kind of collaboration you're looking for.</p>
    </div>
  </div>
</section>

<!-- WORK -->
<section id="work">
  <div class="work-header">
    <div>
      <span class="section-label">Selected work</span>
      <h2 class="section-title">Projects I'm<br><em>proud of</em></h2>
    </div>
    <a class="see-all" href="https://github.com/Rakko-Delos-Santos" target="_blank">See all →</a>
  </div>
  <div class="projects-grid">
    @forelse($projects as $index => $project)
      <a class="project-card" href="{{ $project['url'] }}" target="_blank" rel="noopener noreferrer">
        <div class="project-info">
          <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 0.75rem;">
            <div class="project-title">{{ $project['name'] }}</div>
            @if($project['language'])
              <span style="font-size: 0.7rem; font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase; background: var(--navy-faint); color: var(--navy); padding: 0.35rem 0.75rem; border-radius: 20px; white-space: nowrap; margin-left: 0.75rem;">{{ $project['language'] }}</span>
            @endif
          </div>
          <div class="project-desc">{{ Str::limit($project['description'], 100) }}</div>
          @if(!empty($project['topics']))
            <div style="margin-top: 0.75rem; font-size: 0.8rem; color: var(--text-muted);">
              {{ implode(' • ', array_slice($project['topics'], 0, 3)) }}
            </div>
          @endif
        </div>
      </a>
    @empty
      <div style="grid-column: 1/-1; padding: 2rem; text-align: center; color: var(--text-muted);">
        <p>Loading projects from GitHub... Please try again later.</p>
      </div>
    @endforelse
  </div>
</section>

<!-- SKILLS -->
<section id="skills">
  <span class="section-label">What I do</span>
  <h2 class="section-title">Skills &amp; <em>expertise</em></h2>
  <div class="skills-grid">
    <div class="skill-cell">
      <span class="skill-icon">✦</span>
      <div class="skill-name">Design</div>
      <div class="skill-items">Figma · Illustrator<br>UI/UX · Prototyping</div>
    </div>
    <div class="skill-cell">
      <span class="skill-icon">⬡</span>
      <div class="skill-name">Frontend</div>
      <div class="skill-items">HTML · CSS · JS<br>React · Tailwind</div>
    </div>
    <div class="skill-cell">
      <span class="skill-icon">◈</span>
      <div class="skill-name">Backend</div>
      <div class="skill-items">Node.js · Python<br>REST APIs · SQL</div>
    </div>
    <div class="skill-cell">
      <span class="skill-icon">◎</span>
      <div class="skill-name">Strategy</div>
      <div class="skill-items">Research · Roadmaps<br>Product Thinking</div>
    </div>
    <div class="skill-cell">
      <span class="skill-icon">▲</span>
      <div class="skill-name">Motion</div>
      <div class="skill-items">CSS Animations<br>After Effects · Lottie</div>
    </div>
    <div class="skill-cell">
      <span class="skill-icon">◇</span>
      <div class="skill-name">Tools</div>
      <div class="skill-items">Git · Notion · Jira<br>VS Code · Vercel</div>
    </div>
    <div class="skill-cell">
      <span class="skill-icon">⊕</span>
      <div class="skill-name">Content</div>
      <div class="skill-items">Copywriting · SEO<br>Brand Voice</div>
    </div>
    <div class="skill-cell">
      <span class="skill-icon">❖</span>
      <div class="skill-name">Soft Skills</div>
      <div class="skill-items">Communication<br>Problem Solving</div>
    </div>
  </div>
</section>

<!-- CONTACT -->
<section id="contact">
  <span class="section-label">Let's connect</span>
  <h2 class="section-title">Get in <em>touch</em></h2>
  <div class="contact-inner">
    <div>
      <p class="contact-desc">Have a project in mind, a question, or just want to say hello? I'm always open to a good conversation. Reach out through any of the channels below or send a message directly.</p>
      <div class="contact-links">
        <a class="contact-link" href="mailto:hello@yourname.com">
          <span class="contact-link-icon">✉</span>
          hello@yourname.com
        </a>
        <a class="contact-link" href="https://linkedin.com/in/yourname" target="_blank" rel="noopener noreferrer">
          <span class="contact-link-icon">in</span>
          linkedin.com/in/yourname
        </a>
        <a class="contact-link" href="https://github.com/Rakko-Delos-Santos" target="_blank" rel="noopener noreferrer">
          <span class="contact-link-icon">gh</span>
          github.com/Rakko-Delos-Santos
        </a>
        <a class="contact-link" href="#">
          <span class="contact-link-icon">𝕏</span>
          @yourhandle
        </a>
      </div>
    </div>
    <form class="contact-form" id="contactForm">
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Your name" required />
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="your@email.com" required />
      </div>
      <div class="form-group">
        <label for="msg">Message</label>
        <textarea id="msg" name="message" placeholder="Tell me about your project…" required minlength="10"></textarea>
      </div>
      <div id="formMessage" style="display: none; padding: 1rem; border-radius: 8px; margin-bottom: 1rem; font-size: 0.9rem;"></div>
      <button class="btn-submit" type="submit" id="submitBtn">Send message →</button>
    </form>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <a class="footer-logo" href="#hero">RDS</a>
  <span class="footer-copy">© 2026 Rakko Delos Santos. All rights reserved.</span>
</footer>

<script>
document.getElementById('contactForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  
  const form = this;
  const submitBtn = document.getElementById('submitBtn');
  const formMessage = document.getElementById('formMessage');
  const originalText = submitBtn.textContent;
  
  // Show loading state
  submitBtn.disabled = true;
  submitBtn.textContent = 'Sending...';
  formMessage.style.display = 'none';
  
  try {
    const formData = new FormData(form);
    
    const response = await fetch('{{ route("contact.send") }}', {
      method: 'POST',
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
      },
      body: formData,
    });

    const data = await response.json();

    formMessage.style.display = 'block';
    
    if (data.success) {
      formMessage.style.backgroundColor = '#d4edda';
      formMessage.style.color = '#155724';
      formMessage.style.borderLeft = '4px solid #28a745';
      formMessage.textContent = data.message;
      form.reset();
      submitBtn.textContent = 'Message sent! ✓';
      setTimeout(() => {
        submitBtn.disabled = false;
        submitBtn.textContent = originalText;
        formMessage.style.display = 'none';
      }, 3000);
    } else {
      formMessage.style.backgroundColor = '#f8d7da';
      formMessage.style.color = '#721c24';
      formMessage.style.borderLeft = '4px solid #f5c6cb';
      formMessage.textContent = data.message || 'An error occurred. Please try again.';
      submitBtn.disabled = false;
      submitBtn.textContent = originalText;
    }
  } catch (error) {
    formMessage.style.display = 'block';
    formMessage.style.backgroundColor = '#f8d7da';
    formMessage.style.color = '#721c24';
    formMessage.style.borderLeft = '4px solid #f5c6cb';
    formMessage.textContent = 'An error occurred. Please try again.';
    submitBtn.disabled = false;
    submitBtn.textContent = originalText;
  }
});
</script>

</body>
</html>