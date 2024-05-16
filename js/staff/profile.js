const articlesCount = document.querySelector('#all-articles');
const btnForward = document.querySelector('#page-forward');
const btnBack = document.querySelector('#page-back');
const id = [+articlesCount.innerHTML];

articlesArrayPhp.forEach((article) => {
    article.authorsID = article.authorsID.split(',');
})

let articles = sortoincidenceOr(articlesArrayPhp, id);
articles = sortArticlesByYears(articles);
let page = 1;
showArticles(articles, 1);

btnBack.addEventListener('click', () => {
    page--;
    showArticles(articles, page);
    window.scrollTo(0, 0);
})

btnForward.addEventListener('click', () => {
    page++;
    showArticles(articles, page);
    window.scrollTo(0, 0);
})

document.querySelector('#firstPage').addEventListener('click', () => {
    page = 1;
    showArticles(articles, page);
    window.scrollTo(0, 0);
})

document.querySelector('#lastPage').addEventListener('click', () => {
    page = Math.ceil(articles.length / 50);
    showArticles(articles, page);
    window.scrollTo(0, 0);
})