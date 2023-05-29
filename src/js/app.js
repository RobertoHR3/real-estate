document.addEventListener('DOMContentLoaded', function() {
    eventListeners()
    darkMode()
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

const darkMode = () => {
    const buttonDarkMode = document.querySelector('.dark-mode-button')
    buttonDarkMode.addEventListener('click', changeColor)
}

const changeColor = () => {
    document.body.classList.toggle('dark-mode')
}