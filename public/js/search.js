const searchMedium = document.getElementById('search-md');
const searchSmall = document.getElementById('search-sm');
const searchContainer = document.getElementById('search-container');
const searchOverlay = document.getElementById('search-overlay');
const searchClose = document.getElementById('search-close');
// const editButton = document.getElementById('edit-button');
// const editContent = document.getElementById('edit-content');
// const editOverlay = document.getElementById('edit-overlay');
// let editButtons = document.getElementsByClassName('edit-button');

// for(let i = 0; i < editButtons.length; i++){
//     editButtons[i].addEventListener('click', ()=> {
//         editContent.classList.toggle('searchOn');
//     });
// }


// editOverlay.addEventListener('click', ()=> {
//     editContent.classList.toggle('searchOn');
// });

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