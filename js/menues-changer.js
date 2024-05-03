const menuesBtn = document.querySelector('#menues__button');
const teachingMenu = document.querySelector('.teaching');
const bibliographyMenu = document.querySelector('.bibliography');

function changeBibliographyMenues() {
    teachingMenu.classList.toggle('active-menues');
    bibliographyMenu.classList.toggle('active-menues');
    bibliographyMenu.style.left = '0';
    menuesBtn.style.cssText = `
    right: 100%;
    transform: translate(100%, 0) scale(-1, 1);
    background-color: rgb(25, 33, 94);
    `;
    setTimeout(() => {
        document.querySelector('.menues__btn-title').textContent = 'Библиография';
        document.querySelector('.menues__btn-title').style.transform = 'rotate(-90deg) scale(-1, 1) translate(0, 55px)';
        document.querySelector('.menues__btn-title').style.left = 'auto';
        document.querySelector('.menues__btn-title').style.right = '0';
        if (window.innerWidth < 1024) {
            document.querySelector('.menues__btn-title').style.transform = 'rotate(-90deg) scale(-1, 1) translate(0, 10px)';
        }
    }, 300);


    setTimeout(() => {
        teachingMenu.style.transform = 'translate(-100%, 0)';
    }, 1000)
    menuesBtn.removeEventListener('click', changeBibliographyMenues);
    menuesBtn.addEventListener('click', changeTeachingMenues);
}

function changeTeachingMenues() {
    teachingMenu.classList.toggle('active-menues');
    bibliographyMenu.classList.toggle('active-menues');
    menuesBtn.style.cssText = `
    right: 0;
    transform: none;
    background-color: rgb(130, 0, 28);
    `;
    teachingMenu.style.transform = 'translate(0, 0)';
    setTimeout(() => {
        document.querySelector('.menues__btn-title').textContent = 'Обучение';
        document.querySelector('.menues__btn-title').style.transform = 'rotate(-90deg) scale(1, 1)';
        document.querySelector('.menues__btn-title').style.left = '0';
        document.querySelector('.menues__btn-title').style.right = 'auto';
        if (window.innerWidth < 1024) {
            document.querySelector('.menues__btn-title').style.transform = 'rotate(-90deg) scale(1, 1)';
        }
    }, 300);


    setTimeout(() => {
        bibliographyMenu.style.left = '100%';
    }, 1000)
    menuesBtn.removeEventListener('click', changeTeachingMenues);
    menuesBtn.addEventListener('click', changeBibliographyMenues);
}

menuesBtn.addEventListener('click', changeBibliographyMenues);