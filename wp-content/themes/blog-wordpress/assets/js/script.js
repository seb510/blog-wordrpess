const searchLink = document.querySelector('.search-link');
const searchBlock = document.querySelector('.header-search');
const searchClose = document.querySelector('.header-search__close');
searchLink.addEventListener('click', () => {
    searchBlock.style.display = 'block';
});

searchClose.addEventListener('click', () => {
    searchBlock.style.display = 'none';
});
