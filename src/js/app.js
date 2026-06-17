document.addEventListener('DOMContentLoaded', function() {
    eventListeners();
    darkMode();
    designInteractions();
});

function darkMode() {
    const botonDarkMode = document.querySelector('.dark-mode-boton');
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    function sincronizarModo() {
        document.body.classList.toggle('dark-mode', prefiereDarkMode.matches);
    }

    sincronizarModo();
    prefiereDarkMode.addEventListener('change', sincronizarModo);

    if(botonDarkMode) {
        botonDarkMode.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
        });
    }
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');
    if(mobileMenu) {
        mobileMenu.addEventListener('click', navegacionResponsive);
    }

    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', seleccionarMetodo));
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');
    const siteNav = document.querySelector('[data-nav]');

    if(navegacion) {
        navegacion.classList.toggle('mostrar');
    }

    if(siteNav) {
        siteNav.classList.toggle('is-open');
    }
}

function seleccionarMetodo(e) {
    const contactoDiv = document.querySelector('#contacto');
    if(!contactoDiv) return;

    if(e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
            <label for="telefono">Telefono</label>
            <input type="tel" placeholder="Tu Telefono" id="telefono"  name="contacto[telefono]" required>

            <label for="fecha">Fecha Llamada:</label>
            <input type="date" id="fecha"  name="contacto[fecha]" required>

            <label for="hora">Hora Llamada:</label>
            <input type="time" id="hora" min="09:00" max="18:00"  name="contacto[hora]" required>
        `;
    } else {
        contactoDiv.innerHTML = `
            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu Email" id="email" name="contacto[email]" required>
        `;
    }
}

function designInteractions() {
    const header = document.querySelector('[data-header]');

    function updateHeader() {
        if(!header) return;
        header.classList.toggle('is-scrolled', window.scrollY > 24);
    }

    updateHeader();
    window.addEventListener('scroll', updateHeader, { passive: true });

    const reveals = document.querySelectorAll('.reveal');
    if('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if(entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.14 });

        reveals.forEach((el) => observer.observe(el));
    } else {
        reveals.forEach((el) => el.classList.add('is-visible'));
    }

    const adminSearch = document.querySelector('[data-admin-search]');
    if(adminSearch) {
        adminSearch.addEventListener('input', function(e) {
            const term = e.target.value.toLowerCase().trim();
            document.querySelectorAll('.responsive-table tbody tr').forEach((row) => {
                row.hidden = term !== '' && !row.textContent.toLowerCase().includes(term);
            });
        });
    }
}
