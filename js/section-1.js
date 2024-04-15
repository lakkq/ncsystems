const SMIArticles = document.querySelectorAll('.SMI-article');
const News = document.querySelectorAll('.article');
const NewsTrigger = document.querySelector('#NewsTrigger');
const SMITrigger = document.querySelector('#SMITrigger');

const observerNews = new IntersectionObserver(entries => {
    let delayNews = 0;
    // перебор записей
    entries.forEach(entry => {
        // если элемент появился
        if (entry.isIntersecting) {
            // добавить ему CSS-класс
            News.forEach((article) => {
                article.classList.add('showNews');
                article.style.animationDelay = `${delayNews}ms`;
                delayNews += 200;
            })
        }
    });
});

const observerSMI = new IntersectionObserver(entries => {
    let delaySMI = 0;
    // перебор записей
    entries.forEach(entry => {
        // если элемент появился
        if (entry.isIntersecting) {
            // добавить ему CSS-класс
            SMIArticles.forEach((article) => {
                article.classList.add('showSMI');
                article.style.animationDelay = `${delaySMI}ms`;
                delaySMI += 200;
            })
        }
    });
});

observerNews.observe(NewsTrigger);
observerSMI.observe(SMITrigger);

if (window.innerWidth < 495) {
    News[3].style.display = 'none';
    News[2].style.display = 'none';
    SMIArticles[3].style.display = 'none';
    SMIArticles[4].style.display = 'none';
}