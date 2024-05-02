document.querySelector('.statistic-page').addEventListener('click', () => { });

let diagramYears = document.querySelector('#columns');
let diagramCitied = document.querySelector('#columns2');
let diagramAuthors = document.querySelector('#authors');

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

for (let i = 0; i < 7; i++) {
    let columnWidth = arrayCitied[i].citiedByCount * 100 / maxCitiedArticle;
    diagramCitied.insertAdjacentHTML('beforeend', `
    <div class="statistic2-diagram1__column-wrapper">
        <div class="statistic2-diagram1__column-count"><p>${arrayCitied[i].citiedByCount}</p></div>
        <div class="statistic2-diagram1__column" id="column${i}" style="width: ${columnWidth}%">
            <p>${arrayCitied[i].title}</p>
        </div>
    </div>
    `)
    document.querySelector(`#column${i}`).addEventListener('mouseenter', () => {
        document.querySelector(`#column${i}`).style.width = '100%';
    })
    document.querySelector(`#column${i}`).addEventListener('mouseleave', () => {
        document.querySelector(`#column${i}`).style.width = `${columnWidth}%`;
    })
}

console.log(authorsArray);

function bubbleSort(arr) {
    let len = arr.length;
    for (let i = 0; i < len; i++) {
        for (let j = 0; j < len - 1; j++) {
            if (+arr[j].allCitied > +arr[j + 1].allCitied) {
                // Обмен элементов
                let temp = arr[j];
                arr[j] = arr[j + 1];
                arr[j + 1] = temp;
            }
        }
    }
    
    return arr.reverse();;
}

for (let i = 0; i < 3; i++) {
    let authors = bubbleSort(authorsArray);
    console.log(authors);
    diagramAuthors.insertAdjacentHTML('beforeend', `
    <div class="statistic2-diagram2__item">
        <div class="statistic2-diagram2__item-avatar">
            <img src="${authors[i].avatarUrl}" alt="">
        </div>
        <div class="statistic2-diagram2__item-info">
            <div class="statistic2-diagram2__item-name"><p>${authors[i].name}</p></div>
            <div class="statistic2-diagram2__item-body">
                <p><b>Всего работ: </b>${authors[i].publicainsions}</p>
                <p><b>Всего цитирований: </b>${authors[i].allCitied}</p>
            </div>
        </div>
    </div>
    `)
}


