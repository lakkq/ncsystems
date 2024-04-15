const putYearHere = document.querySelector('#year');
const date = new Date();

putYearHere.innerHTML += date.getFullYear();