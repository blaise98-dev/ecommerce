let provinceSelector = document.querySelector('#province-dropdown');
let districtSelector = document.querySelector('#district-dropdown');
let sectorSelector = document.querySelector('#sector-dropdown');
let cellSelector = document.querySelector('#cell-dropdown');
let villageSelector = document.querySelector('#village-dropdown');

// fetch data
const url = 'https://raw.githubusercontent.com/blaise98/Rwanda/master/data.json';
fetch(url)
    .then((response) => {
        if (response.status !== 200) {
            console.log('Looks like there was a problem. Status Code: ' + response.status);
            return;
        }
        response.json().then((data) => {
            let option;
            let provinceKeys = Object.keys(data);
            for (let i = 0; i < provinceKeys.length; i++) {
                option = document.createElement('option');
                option.text = provinceKeys[i];
                option.value = provinceKeys[i];
                provinceSelector.add(option);
            }
            provinceSelector.addEventListener('change', (e) => allDistricts(data[e.target.value]));
        });
    })
    .catch((err) => {
        console.error('Fetch Error -', err);
    });

const allDistricts = (data) => {
    let districtKeys = Object.keys(data);
    districtSelector.innerHTML = '';
    for (let i = 0; i < districtKeys.length; i++) {
        option = document.createElement('option');
        option.text = districtKeys[i];
        option.value = districtKeys[i];
        districtSelector.add(option);
    }
    districtSelector.addEventListener('change', (e) => allSectors(data[e.target.value]));
};

const allSectors = (data) => {
    let sectorKeys = Object.keys(data);
    sectorSelector.innerHTML = '';
    for (let i = 0; i < sectorKeys.length; i++) {
        option = document.createElement('option');
        option.text = sectorKeys[i];
        option.value = sectorKeys[i];
        sectorSelector.add(option);
    }
    sectorSelector.addEventListener('change', (e) => allCells(data[e.target.value]));
};

const allCells = (data) => {
    let cellKeys = Object.keys(data);
    cellSelector.innerHTML = '';
    for (let i = 0; i < cellKeys.length; i++) {
        option = document.createElement('option');
        option.text = cellKeys[i];
        option.value = cellKeys[i];
        cellSelector.add(option);
    }
    cellSelector.addEventListener('change', (e) => allVillages(data[e.target.value]));
};

const allVillages = (data) => {
    villageSelector.innerHTML = '';
    for (let i = 0; i < data.length; i++) {
        option = document.createElement('option');
        option.text = data[i];
        option.value = data[i];
        villageSelector.add(option);
    }
};