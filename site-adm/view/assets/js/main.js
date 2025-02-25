console.log('js foi carregado');

// Marca o menu ativo
document
	.querySelector('#nav-items')
	.querySelectorAll('.nav-link')
    .forEach((navLink) => {
        const uriAtual = window.location.pathname
        if (navLink.href.includes(uriAtual)) {
            navLink.classList.add('active')
        }
    })

const mobileMenu = document.querySelector('#menu-mobile')
const sidebar = document.querySelector('#sidebar')
mobileMenu.addEventListener('click', () => {
    sidebar.classList.toggle('open')
})