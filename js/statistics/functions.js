function createArraysYears(articles) {
    let years = {};
    for (let i = 0; i < articles.length; i++) {
        if (!(articles[i].year in years)) {
            years[articles[i].year] = [];
            years[articles[i].year].push(articles[i]);
        }
        else {
            years[articles[i].year].push(articles[i]);
        }
    }
    
    return years;
}

function createArrayCitied(articles) {
    let citied = {};
    for (let i = 0; i < articles.length; i++) {
        if (!(articles[i].citiedByCount in citied)) {
            citied[articles[i].citiedByCount] = [];
            citied[articles[i].citiedByCount].push(articles[i]);
        }
        else {
            citied[articles[i].citiedByCount].push(articles[i]);
        }
    }
    
    return citied;
}

function collectArticlesStatistics() {
    let articles = [];
    let titles = document.querySelectorAll('.bibliography-page__article-title');
    let indexators = document.querySelectorAll('.bibliography-page__article-indexator');
    let doies = document.querySelectorAll('.bibliography-page__article-doi');
    let authorsRows = document.querySelectorAll('.bibliography-page__article-authors');
    let authorsIDs = document.querySelectorAll('.bibliography-page__article-authorsID');
    let years = document.querySelectorAll('.bibliography-page__article-year');
    let journals = document.querySelectorAll('.bibliography-page__article-journal');
    let citieds = document.querySelectorAll('.bibliography-page__article-citied');
    document.querySelectorAll('.bibliography-page__article').forEach((article) => {
        let publication = {}
        titles.forEach((title) => {
            if (article.contains(title)) {
                publication['title'] = title.children[0].innerText;
            }
        })
        indexators.forEach(indexator => {
            if (article.contains(indexator)) {
                publication['indexator'] = indexator.innerText;
            }
        })
        doies.forEach(doi => {
            if (article.contains(doi)) {
                publication['doi'] = doi.children[0].children[1].textContent.slice(4, -1).trim();
            }
        })
        authorsRows.forEach(authorsRow => {
            if (article.contains(authorsRow)) {
                publication['authorsRow'] = authorsRow.children[0].children[1].innerText;
            }
        })
        authorsIDs.forEach(authorsID => {
            if (article.contains(authorsID)) {
                publication['authorsID'] = authorsID.children[0].children[1].textContent.slice(4, -1).trim().split(',');
            }
        })
        years.forEach(year => {
            if (article.contains(year)) {
                publication['year'] = year.textContent.slice(4, -1).trim();
            }
        })
        journals.forEach(journal => {
            if (article.contains(journal)) {
                publication['journal'] = journal.children[0].children[1].textContent;
            }
        })
        citieds.forEach(citied => {
            if (article.contains(citied)) {
                if (citied.children[0].children[1].innerText !== 'не указано') {
                    publication['citiedByCount'] = +citied.children[0].children[1].innerText;
                } else {
                    publication['citiedByCount'] = citied.children[0].children[1].innerText;
                }

            }
        })
        articles.push(publication);
    })
    document.querySelector('.bibliography-page__articles').innerHTML = '';
    return articles;
}