function sortArticlesByCitied(articles) {
    let citied = {};
    for (let i = 0; i < articles.length; i++) {
        articles[i].citiedByCount = +articles[i].citiedByCount;
        if (!(articles[i].citiedByCount in citied)) {
            citied[articles[i].citiedByCount] = [];
            citied[articles[i].citiedByCount].push(articles[i]);
        }
        else {
            citied[articles[i].citiedByCount].push(articles[i]);
        }
    }
    let newArticles = [];
    keys = Object.keys(citied).reverse();
    keys.forEach((key) => {
        if (key !== 'не указано') {
            citied[key].forEach((article) => {
                newArticles.push(article);
            })
        }
    })
    if ('не указано' in citied) {
        citied['не указано'].forEach((article) => {
            newArticles.push(article);
        })
    }
    return newArticles;
}

function sortArticlesByYears(articles) {
    let years = {};
    for (let i = 0; i < articles.length; i++) {
        articles[i].year = +articles[i].year;
        if (!(articles[i].year in years)) {
            years[articles[i].year] = [];
            years[articles[i].year].push(articles[i]);
        }
        else {
            years[articles[i].year].push(articles[i]);
        }
    }
    let newArticles = [];
    keys = Object.keys(years).reverse();
    keys.forEach((key) => {
        if (key !== 'не указано') {
            years[key].forEach((article) => {
                newArticles.push(article);
            })
        }
    })
    return newArticles;
}

function sortoincidenceAnd(articles, authorsID) {
    let sortedArticles = [];
    articles.forEach((article) => {
        let proverka2 = 0;
        for (let j = 0; j < authorsID.length; j++) {
            let proverka = 0;
            for (let k = 0; k < article.authorsID.length; k++) {
                if (authorsID[j] === +article.authorsID[k]) {
                    proverka = 1;
                    break;
                }
            }
            if (!proverka) {
                proverka2 = 1;
                break;
            }
        }
        if (!proverka2) {
            sortedArticles.push(article);
        }
    })
    return sortedArticles;
}

function sortoincidenceOr(articles, authorsID) {
    let sortedArticles = [];
    articles.forEach((article) => {
        let proverka = 0;
        for (let j = 0; j < authorsID.length; j++) {
            for (let k = 0; k < article.authorsID.length; k++) {
                if (`${authorsID[j]}` === article.authorsID[k]) {
                    sortedArticles.push(article);
                    proverka = 1;
                    break;
                }
            }
            if (proverka) {
                break;
            }
        }
    })
    return sortedArticles;
}

function sortPeriod(articles, period) {
    let sortedArticles = [];
    articles.forEach(article => {
        if (+article.year >= period[0] && +article.year <= period[1]) {
            sortedArticles.push(article);
        }
    })
    return sortedArticles;
}

function showArticles(articles, page, chunkSize = 50) {
    articlesCount.innerHTML = `${articles.length}`;
    if (articles.length > chunkSize) {
        document.querySelector('.bibliography-page__pages').style.display = 'block';
        document.querySelector('.bibliography-page__pages-number').innerHTML = page;
    } else document.querySelector('.bibliography-page__pages').style.display = 'none';
    let newArticles = [];
    for (let i = 0; i < articles.length; i += chunkSize) {
        const chunk = articles.slice(i, i + chunkSize);
        newArticles.push(chunk);
    }

    if (page === 1) {
        btnBack.style.display = 'none';
        document.querySelector('#firstPage').style.display = 'none';
    } else {
        btnBack.style.display = 'block';
        document.querySelector('#firstPage').style.display = 'block';
    };

    if (page === 2 || page === 1) {
        document.querySelector('.bibliography-page__points1').style.display = 'none';
    } else document.querySelector('.bibliography-page__points1').style.display = 'block';

    if (page === newArticles.length) {
        btnForward.style.display = 'none';
    } else btnForward.style.display = 'block';

    if (page === newArticles.length) {
        document.querySelector('.bibliography-page__points2').style.display = 'none';
        document.querySelector('#lastPage').style.display = 'none';
    } else {
        document.querySelector('.bibliography-page__points2').style.display = 'block';
        document.querySelector('#lastPage').style.display = 'block';
    }

    if (page === newArticles.length - 1 || page === newArticles.length) {
        document.querySelector('.bibliography-page__points2').style.display = 'none';
    } else document.querySelector('.bibliography-page__points2').style.display = 'block';

    document.querySelector('#lastPage').children[0].innerHTML = newArticles.length;

    drawArticles(newArticles[page - 1]);
}

function drawArticles(articles) {
    let articlesContainer = document.querySelector('#bibliography-page__articles');
    articlesContainer.innerHTML = '';
    if (!articles) {
        articlesContainer.insertAdjacentHTML('beforeend', `
        <div class="bibliography-page__article-none">Ничего не найдено...</div>
        `)
    } else {
        for (let i = 0; i < articles.length; i++) {
            if (!articles[i].doi) {
                articles[i].doi = 'не указано';
            }
            if (!articles[i].citiedByCount) {
                articles[i].citiedByCount = 0;
            }
            articlesContainer.insertAdjacentHTML('beforeend', `
                        <div class="bibliography-page__article">
                            <div class="bibliography-page__article-head">
                                <div class="bibliography-page__article-arrow"></div>
                                <div class="bibliography-page__article-title">
                                    <p>
                                        ${articles[i].title}
                                    </p>
                                </div>
                                <div class="bibliography-page__article-inf-publ">
                                    <div class="bibliography-page__article-indexator">
                                        ${articles[i].indexator}
                                    </div>
                                    <div class="bibliography-page__article-year">
                                        ${articles[i].year}
                                    </div>
                                </div>
                            </div>
                            <div class="bibliography-page__article-info">
                                <div class="bibliography-page__article-authors">
                                    <p><b>Авторы: </b>
                                        <span>${articles[i].authorsRow}</span>
                                    </p>
                                </div>
                                <div class="bibliography-page__article-doi">
                                    <p><b>doi: </b>
                                        <span>
                                        ${articles[i].doi}
                                        </span>
                                    </p>
                                </div>
                                <div class="bibliography-page__article-journal">
                                    <p><b>Журнал: </b>
                                        <span>
                                        ${articles[i].journal}
                                        </span>
                                    </p>
                                </div>
                                <div class="bibliography-page__article-citied">
                                    <p><b>Кол-во цитирования: </b>
                                        <span>
                                        ${articles[i].citiedByCount}
                                        </span>
                                    </p>
                                </div>
                                <div class="bibliography-page__article-authorsID" style="display: none">
                                    <p><b>ID авторов: </b>
                                        <span>
                                        ${articles[i].authorsID}
                                        </span>
                                    </p>
                                </div>
                                <div class="bibliography-page__article-link" id="article-link-${i}"></div>
                            </div>
                        </div>
            `);
            if (articles[i].link) {
                document.querySelector(`#article-link-${i}`).insertAdjacentHTML('afterbegin', `<a href="${articles[i].link}">Перейти...</a>`);
            }
        }
        addEventArticles();
    }
    
}

// function collectArticles() {
//     let articles = [];
//     let titles = document.querySelectorAll('.bibliography-page__article-title');
//     let indexators = document.querySelectorAll('.bibliography-page__article-indexator');
//     let doies = document.querySelectorAll('.bibliography-page__article-doi');
//     let authorsRows = document.querySelectorAll('.bibliography-page__article-authors');
//     let authorsIDs = document.querySelectorAll('.bibliography-page__article-authorsID');
//     let years = document.querySelectorAll('.bibliography-page__article-year');
//     let journals = document.querySelectorAll('.bibliography-page__article-journal');
//     let citieds = document.querySelectorAll('.bibliography-page__article-citied');
//     document.querySelectorAll('.bibliography-page__article').forEach((article) => {
//         let publication = {}
//         titles.forEach((title) => {
//             if (article.contains(title)) {
//                 publication['title'] = title.children[0].innerText;
//             }
//         })
//         indexators.forEach(indexator => {
//             if (article.contains(indexator)) {
//                 publication['indexator'] = indexator.innerText;
//             }
//         })
//         doies.forEach(doi => {
//             if (article.contains(doi)) {
//                 publication['doi'] = doi.children[0].children[1].textContent.slice(4, -1).trim();
//             }
//         })
//         authorsRows.forEach(authorsRow => {
//             if (article.contains(authorsRow)) {
//                 publication['authorsRow'] = authorsRow.children[0].children[1].innerText;
//             }
//         })
//         authorsIDs.forEach(authorsID => {
//             if (article.contains(authorsID)) {
//                 publication['authorsID'] = authorsID.children[0].children[1].textContent.slice(4, -1).trim().split(',');
//             }
//         })
//         years.forEach(year => {
//             if (article.contains(year)) {
//                 publication['year'] = year.textContent.slice(4, -1).trim();
//             }
//         })
//         journals.forEach(journal => {
//             if (article.contains(journal)) {
//                 publication['journal'] = journal.children[0].children[1].textContent;
//             }
//         })
//         citieds.forEach(citied => {
//             if (article.contains(citied)) {
//                 if (citied.children[0].children[1].innerText !== 'не указано') {
//                     publication['citiedByCount'] = +citied.children[0].children[1].innerText;
//                 } else {
//                     publication['citiedByCount'] = citied.children[0].children[1].innerText;
//                 }

//             }
//         })
//         articles.push(publication);
//     })
//     return articles;
// }

function addEventArticles() {
    document.querySelectorAll('.bibliography-page__article').forEach((article) => {
        article.children[0].addEventListener('click', () => {
            if (article.classList.contains('active-article')) {
                document.querySelectorAll('.bibliography-page__article').forEach((article1) => {
                    article1.classList.remove('active-article');
                    article1.children[0].children[0].classList.remove('active-article-arrow');
                    article1.children[0].children[1].classList.remove('active-article-title');
                })
            }
            else {
                document.querySelectorAll('.bibliography-page__article').forEach((article1) => {
                    article1.classList.remove('active-article');
                    article1.children[0].children[0].classList.remove('active-article-arrow');
                    article1.children[0].children[1].classList.remove('active-article-title');
                })
                article.classList.add('active-article');
                article.children[0].children[0].classList.add('active-article-arrow');
                article.children[0].children[1].classList.add('active-article-title');
            }
        })
    })
}
