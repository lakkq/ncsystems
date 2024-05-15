const staffContainer = document.querySelector('#staff');

const moveItemToTop = (arr) => {
    const index = arr.findIndex(obj => obj.position === 'зав. каф.');

    if (index !== -1) {
        const item = arr[index];
        arr.splice(index, 1);
        arr.unshift(item);
    }

    return arr;
};

const customSort = (arr) => {
    const order = ['зав. каф.', 'профессор', 'ведущий инженер', 'доцент', 'зав.лаб.', 'старший преподаватель', 'преподаватель', 'ассистент'];

    arr.sort((a, b) => {
        return order.indexOf(a.position) - order.indexOf(b.position);
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
    if (worker.position === 'зав.лаб.') {
        worker.position = 'Зав. лабораторией';
    }
    if (worker.position === 'зав. каф.' || worker.position === 'зав.каф.') {
        worker.position = 'Зав. кафедрой';
    }

    worker.position = worker.position.charAt(0).toUpperCase() + worker.position.slice(1)

    staffContainer.insertAdjacentHTML('beforeend', `
            <div class="worker zavkaf">
                <div class="worker__row">
                    <div class="worker__img">
                        <img src="${worker.avatarUrl}" alt="">
                    </div>
                    <div class="worker__info">
                        <div class="worker__position">
                            <p>${worker.position}</p>
                        </div>
                        <div class="worker__name">
                            <p>${worker.name}</p>
                        </div>
                        <div class="worker__data">
                            <p><b>Научная степень: </b>${worker.degree}</p>
                            <p><b>Опыт работы: </b>${worker.experience} лет</p>
                            <p><b>Всего научниых публикаций: </b>${worker.publicainsions}</p>
                            <p><b>Всего цитирований: </b>${worker.allCitied}</p>
                        </div>
                    </div>
                </div>
            </div>
    `)
})