document.addEventListener('DOMContentLoaded', function() {
    eventListeners()
})

const eventListeners = () => {
    const mobileMenu = document.querySelector('.mobile-menu')
    mobileMenu.addEventListener('click', browsingResponsive)
}

const browsingResponsive = () => {
    const browsing = document.querySelector('.browsing')
    if (browsing.classList.contains('show')) {
        browsing.classList.remove('show')
    } else {
        browsing.classList.add('show')
    }
}
