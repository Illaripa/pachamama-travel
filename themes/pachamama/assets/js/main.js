// Nav
const nav = document.getElementById('nav');
window.addEventListener('scroll', () => nav.classList.toggle('scrolled', window.scrollY > 50));

// Mobile menu
const menuToggle = document.getElementById('menuToggle');
const navLinks = document.getElementById('navLinks');
menuToggle.addEventListener('click', () => navLinks.classList.toggle('open'));
navLinks.querySelectorAll('a').forEach(link =>
    link.addEventListener('click', () => navLinks.classList.remove('open'))
);

// FAQ
document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', () => {
        const item = btn.parentElement;
        const wasActive = item.classList.contains('active');
        document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('active'));
        if (!wasActive) item.classList.add('active');
    });
});

// Reveal
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

// Form
function handleSubmit(e) {
    e.preventDefault();
    const btn = e.target.querySelector('.btn-submit');
    const original = btn.innerHTML;
    btn.innerHTML = '<span class="icon"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span> Enviado — te contactaremos pronto';
    btn.style.background = 'var(--forest)';
    btn.disabled = true;
    setTimeout(() => {
        btn.innerHTML = original;
        btn.style.background = '';
        btn.disabled = false;
        e.target.reset();
    }, 3000);
}
