const filter = document.querySelector('.bibliography__filter');
const filterCurtain = document.querySelector('.bibliography__filter-curtain');
const filterBtnOpn = document.querySelector('#filter-button-open');
const filterBtnCls = document.querySelector('#filter-button-close');
const authorsList = document.querySelector('.bibliography__filter-authors-list');
const periodList = document.querySelector('.bibliography__filter-period-list');
const periodStartYear = document.querySelector('#start-year');
const periodEndYear = document.querySelector('#end-year');
const checkerCitied = document.querySelector('#citied');
const btnForward = document.querySelector('#page-forward');
const btnBack = document.querySelector('#page-back');
const articlesCount = document.querySelector('#all-articles');
filter.addEventListener('click', () => {})

let articles = articlesArrayPhp;

articles.forEach((article) => {
    article.authorsID = article.authorsID.split(',');
})

let page = 1;
articles = sortArticlesByYears(articles);
let filteredArticles = sortArticlesByYears(articles);


showArticles(filteredArticles, page);

filterBtnOpn.addEventListener('click', openFilter);
filterBtnCls.addEventListener('click', closeFilter);
filterCurtain.addEventListener('click', closeFilter);

periodEndYear.setAttribute('placeholder', `${new Date().getFullYear()}`);

function openFilter() {
    filter.classList.add('bibliography__filter-active');
    filterCurtain.style.display = 'block';
    filterBtnCls.style.left = '0%';
}

function closeFilter() {
    const authorsCheck = document.querySelectorAll('.checkbox');
    // let proverka = 0;
    // authorsCheck.forEach((checker) => {
    //     if (checker.checked) {
    //         proverka = 1;
    //     }
    // })
    // if (!proverka) {
    //     document.querySelector('.bibliography__filter-authors-list').classList.add('input-error');
    // } else 
    if (+periodStartYear.value > +periodEndYear.value || +periodStartYear.value < 0 || +periodEndYear.value < 0) {
        periodEndYear.classList.add('input-error');
        periodStartYear.classList.add('input-error');
    } else {
        document.querySelector('.bibliography__filter-authors-list').classList.remove('input-error');
        filter.classList.remove('bibliography__filter-active');
        filterCurtain.style.display = 'none';
        filterBtnCls.style.left = '100%';
        useFilter();
    }
}

function useFilter() {
    filteredArticles = [];
    let authorsId = [];
    let period = [];
    const authorsCheck = document.querySelectorAll('.checkbox');
    periodEndYear.classList.remove('input-error');
    periodStartYear.classList.remove('input-error');
    let sortCitied = checkerCitied.checked;
    authorsCheck.forEach((checker) => {
        if (checker.checked) {
            authorsId.push(+checker.dataset.authorId);
        }
    })
    period[0] = +periodStartYear.value;
    period[1] = +periodEndYear.value;

    if (!period[0]) {
        period[0] = 1994;
    }

    if (!period[1]) {
        period[1] = new Date().getFullYear();
    }

    filteredArticles = sortPeriod(articles, period);

    let proverka = 0;
    authorsCheck.forEach((checker) => {
        if (checker.checked) {
            proverka = 1;
        }
    })
    if (proverka) {
        if (document.querySelector('#I').checked) {
            filteredArticles = sortoincidenceAnd(filteredArticles, authorsId);
    
        } else {
            filteredArticles = sortoincidenceOr(filteredArticles, authorsId);
        }
    }

    if (sortCitied) {
        filteredArticles = sortArticlesByCitied(filteredArticles);
    }

    page = 1;
    showArticles(filteredArticles, page);
}

btnBack.addEventListener('click', () => {
    page--;
    showArticles(filteredArticles, page);
    window.scrollTo(0, 0);
})

btnForward.addEventListener('click', () => {
    page++;
    showArticles(filteredArticles, page);
    window.scrollTo(0, 0);
})

document.querySelector('#firstPage').addEventListener('click', () => {
    page = 1;
    showArticles(filteredArticles, page);
    window.scrollTo(0, 0);
})

document.querySelector('#lastPage').addEventListener('click', () => {    
    page = Math.ceil(filteredArticles.length/50);
    showArticles(filteredArticles, page);
    window.scrollTo(0, 0);
})