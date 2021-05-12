const searchMedium = document.getElementById('search-md');
const searchSmall = document.getElementById('search-sm');
const searchContainer = document.getElementById('search-container');
const searchOverlay = document.getElementById('search-overlay');
const searchClose = document.getElementById('search-close');

searchSmall.addEventListener('click', ()=> {
    searchContainer.classList.toggle('searchOn');
    document.body.style.overflowY = 'hidden';
});

searchMedium.addEventListener('click', ()=> {
    searchContainer.classList.toggle('searchOn');
    document.body.style.overflowY = 'hidden';
});

searchOverlay.addEventListener('click', ()=> {
    searchContainer.classList.toggle('searchOn');
    document.body.style.overflowY = 'auto';
});

searchClose.addEventListener('click', ()=> {
    searchContainer.classList.toggle('searchOn');
     document.body.style.overflowY = 'auto';
});