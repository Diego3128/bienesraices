document.addEventListener('DOMContentLoaded', function () {
    eventListeners();
    userPreferences();
});


function userPreferences() {
    // check if the user has already declare a mode, otherwise use their system preferences
    if (localStorage.getItem('colorMode')) {
        const colorMode = localStorage.getItem('colorMode');
        document.body.classList.add(colorMode);
        return;
    }

    const changeMode = (e) => {
        //console.log(e);//MediaQueryListEvent
        if (e.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
            document.body.classList.add('light-mode');
        }
    }
    // check system preferences
    const darkModeQuery = window.matchMedia('(prefers-color-scheme: dark)');
    darkModeQuery.addEventListener('change', changeMode);
    // call right away to check the current state || if it matches dark then apply the style
    changeMode(darkModeQuery);
}

function darkMode() {
    // toggle class 'dark-mode' to the body element
    document.body.classList.toggle('dark-mode');
    //save the setting in the locol storage to future check with userPreferences function..
    localStorage.setItem('colorMode', document.body.classList.contains('dark-mode') ? 'dark-mode' : 'light-mode');
}

function burguerMenu() {
    const navigation = document.querySelector('.bar .navigation');
    const burguerMenuElement = document.querySelector('.burguer-icon');

    navigation.classList.toggle('show')
    burguerMenuElement.classList.toggle('rotate');
}
function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');
    const darkModeIcon = document.querySelector('.dark-mode-btn');

    mobileMenu.addEventListener('click', burguerMenu);
    darkModeIcon.addEventListener('click', darkMode);
}