const staffContainer = document.querySelector('#staff');

const moveItemToTop = (arr) => {
    const index = arr.findIndex(obj => obj.position[0] === 'зав. каф.');

    if (index !== -1) {
        const item = arr[index];
        arr.splice(index, 1);
        arr.unshift(item);
    }

    return arr;
};

authorsArray.forEach(worker => {
    worker.position = worker.position.split(', ');
})
console.log(authorsArray);

const customSort = (arr) => {
    const order = ['зав. каф.', 'профессор', 'ведущий инженер', 'доцент', 'зав.лаб.', 'старший преподаватель', 'преподаватель', 'ассистент'];

    arr.sort((a, b) => {
        return order.indexOf(a.position[0]) - order.indexOf(b.position[0]);
    });

    return arr;
};

customSort(authorsArray);
moveItemToTop(authorsArray);

authorsArray.forEach(worker => {
    if (!worker.degree) {
        worker.degree = 'не указано';
    }
    if (!worker.experience) {
        worker.experience = 'не указано';
    }
    if (!worker.publicainsions) {
        worker.publicainsions = 'не указано';
    }
    if (!worker.allCitied) {
        worker.allCitied = 'не указано';
    }
    if (worker.position[0] === 'зав.лаб.') {
        worker.position[0] = 'Зав. лабораторией';
    }
    if (worker.position[0] === 'зав. каф.' || worker.position[0] === 'зав.каф.') {
        worker.position[0] = 'Зав. кафедрой';
    }

    worker.position[0] = worker.position[0].charAt(0).toUpperCase() + worker.position[0].slice(1)


    staffContainer.insertAdjacentHTML('beforeend', `
        <div class="worker zavkaf">
            
                <div class="worker__position">
                    <p>${worker.position[0]}</p>
                </div>
                <div class="worker__row">
                <div class="worker__img">
                    <img src="${worker.avatarUrl}" alt="">
                </div>
                
               
                    <div class="worker__name">
                        <p>${worker.name}</p>
                    </div>
                    <div class="worker__data">
                        <p><b>Научная степень: </b>${worker.degree}</p>
                        <p><b>Должность: </b>${worker.position.toString().toLowerCase().replace(',', ', ')}</p>
                        <p><b>Опыт работы: </b>${worker.experience} лет</p>
                        <p><b>E-mail: </b><a href="mailto:${worker.email}">${worker.email}</a></p>
                    </div>
                    </div>
                <div class="worker__button">
                    <a href="${worker.link}">Профиль</a>
                </div>
            
        </div>
    `)


})