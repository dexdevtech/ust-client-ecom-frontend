// NAV BAR BEHAVIOR
const search__optional = document.querySelector('.search__optional');
const search = document.querySelector('.search');

search__optional.addEventListener('click', () => {
    search.style.display = "block";
    search__optional.style.display = "none";
})

