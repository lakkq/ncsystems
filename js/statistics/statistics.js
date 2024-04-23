document.querySelector('.statistic-page').addEventListener('click', () => { });

let diagramYears = document.querySelector('#columns');
let diagramCitied = document.querySelector('#columns2');

let articlesArray = collectArticlesStatistics();
let arrayYears = createArraysYears(articlesArray);
let arrayCitied = sortArticlesByCitied(articlesArray);
let citiedCount = Object.keys(arrayCitied).reverse();

console.log(citiedCount);
console.log(arrayCitied);

let counterArticles = articlesArray.length;
document.querySelector('#articles-counter').innerHTML = `${counterArticles}`;

let maxArticlesPerYear = 0;

for (let i in arrayYears) {
    if (arrayYears[i].length > maxArticlesPerYear) {
        maxArticlesPerYear = arrayYears[i].length;
    }
}

for (let i in arrayYears) {
    let countArticles = arrayYears[i].length;
    let columnHeigth = countArticles * 100 / maxArticlesPerYear;
    diagramYears.insertAdjacentHTML('beforeend', `
    <div class="statistic-diagram__column-wrapper">
    <div class="statistic-diagram__column" id="column" style="height: ${columnHeigth}%">
    <div class="statistic-diagram__column-count">${countArticles}</div>
    <div class="statistic-diagram__column-year">${i}</div>
    </div>
    `)
}

let maxCitiedArticle = arrayCitied[0].citiedByCount;
console.log(maxCitiedArticle)

for (let i = 0; i < 3; i++) {
    let columnWidth = arrayCitied[i].citiedByCount * 100 / maxCitiedArticle;
    diagramCitied.insertAdjacentHTML('beforeend', `
    <div class="statistic2-diagram1__column-wrapper">
        <div class="statistic2-diagram1__column-count"><p>${arrayCitied[i].citiedByCount}</p></div>
        <div class="statistic2-diagram1__column" id="column2" style="width: ${columnWidth}%">
            <p>${arrayCitied[i].title}</p>
        </div>
    </div>
    `)
}


