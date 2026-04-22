window.toggleMenu = function () {
    const menu = document.getElementById('mobile-menu')

    menu.classList.toggle('hidden')
}

window.toggleTheme = function () {
    const html = document.documentElement

    if (html.classList.contains('light')) {
        html.classList.remove('light')
        localStorage.setItem('theme', 'dark')
    } else {
        html.classList.add('light')
        localStorage.setItem('theme', 'light')
    }
}

document.addEventListener('DOMContentLoaded', () => {
    if (localStorage.getItem('theme') === 'light') {
        document.documentElement.classList.add('light')
    }
})

const track = document.getElementById("track");

document.getElementById("nextBtn").onclick = () => {
    track.scrollBy({
        left: 350,
        behavior: "smooth"
    });
};

document.getElementById("prevBtn").onclick = () => {
    track.scrollBy({
        left: -350,
        behavior: "smooth"
    });
};