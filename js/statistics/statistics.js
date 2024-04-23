document.querySelector('.statistic-page').addEventListener('click', () => {});

let diagramYears = document.querySelector('#columns');
let articlesArray = collectArticlesStatistics();
let arrayYears = createArraysYears(articlesArray);

console.log(articlesArray.length);

let counterArticles = articlesArray.length;
document.querySelector('#articles-counter').innerHTML = `${counterArticles}`;

console.log(Object.keys(arrayYears));

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

