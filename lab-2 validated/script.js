/**
 * 
 *              NAVIGATION TOGGLE
 * 
 */
 
const openNav = () => {
    const navToggle = document.querySelector('#nav-toggle');
    const links = document.querySelectorAll('.nav__link');
    const navItems = document.querySelectorAll('.nav__item');
    
    navToggle.addEventListener('click', () => {
        document.body.classList.toggle('nav-open');
        
         // animate the links
        navItems.forEach( (item, index) => {
            // if animation already exists, clear it
            if (item.style.animation){
                item.style.animation = '';
            }
            // if it doesn't, then run animation
            else {
                item.style.animation = `fadeLinks 250ms ease forwards ${index / 9 + 0.1}s`
            }
        });
    });
    
   

    // remove nav when a link is pushed
    links.forEach(link => {
        link.addEventListener('click', () => {
            document.body.classList.remove('nav-open');
            
            //clear animation of links when page is NOT reloaded (that is when #-link is pushed)
            if(link.parentElement.style.animation){
                navItems.forEach( item => {
                    item.style.animation = '';
                })
            }
        });
    });
}


/**
 * 
 *              CLOCK
 * 
 */
const hours = document.getElementById('hours');
const minutes = document.getElementById('minutes');


const updateClock = () => {
    const currentTime = new Date();
    
    const h = currentTime.getHours();
    const m = currentTime.getMinutes();

    hours.innerHTML = h < 10 ? '0' + h + ':' : h + ':';
    minutes.innerHTML = m <10 ? '0' + m : m;
}
setInterval(updateClock, 1000);


/**
 * 
 *             LIGHT / DARK MODE
 * 
 */

const nav = document.getElementById('nav');
const toggleIcon = document.getElementById('toggle-icon');
let isDarkMode =  false;
const logoImg = document.getElementById('logo-img');


const darkMode = () => {
    document.documentElement.setAttribute("data-theme", "dark");
    nav.style.backgroundColor = 'rgb(0 0 0 / 50%)';
    toggleIcon.classList.replace('fa-moon', 'fa-sun');
    logoImg.src = './img/logo_dark.png';
    localStorage.setItem('theme', 'dark');
    
};

const lightMode = () => {
    document.documentElement.setAttribute("data-theme", "light");
    nav.style.background = ' linear-gradient( var(--background) 72%,  rgba(255, 255, 255,0.8))';
    toggleIcon.classList.replace('fa-sun', 'fa-moon');
    logoImg.src = './img/logo_light.png';
    localStorage.setItem('theme', 'light');
};

const switchTheme = (event) => {
    console.log('Pushing button..!')
    if(!isDarkMode){
        darkMode();
        isDarkMode = true;
    }
    else {
        lightMode();
        isDarkMode = false;
    }
}

//add event listener
toggleIcon.addEventListener("click", switchTheme);

//load locally stored theme
const currentTheme = localStorage.getItem('theme');

//if there is no stored theme, set currentTheme to default
if(!currentTheme){
    localStorage.setItem('theme', 'light');
}
//set theme to the stored theme
//document.documentElement.setAttribute('data-theme', currentTheme);

if(currentTheme === 'dark'){
    isDarkMode = true;
    darkMode();
}
else {
    isDarkMode = false;
    lightMode();
}



/**
 * 
 *              RUNTIME
 * 
 */
openNav();
updateClock();