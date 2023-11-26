// SHOP BY CATEGORY POP UP
const men__hover = document.querySelector('.men__hover');
const men__pop__up = document.querySelector('.pop__up__men');
const women__hover = document.querySelector('.women__hover');
const women__pop__up = document.querySelector('.pop__up__women');
const kids__hover = document.querySelector('.kids__hover');
const kids__pop__up = document.querySelector('.pop__up__kids');

men__hover.addEventListener('mouseover', () => {
    men__pop__up.style.display = "block";
});
men__hover.addEventListener('mouseout', () => {
    men__pop__up.style.display = "none";
});

women__hover.addEventListener('mouseover', () => {
    women__pop__up.style.display = "block";
});
women__hover.addEventListener('mouseout', () => {
    women__pop__up.style.display = "none";
});

kids__hover.addEventListener('mouseover', () => {
    kids__pop__up.style.display = "block";
});
kids__hover.addEventListener('mouseout', () => {
    kids__pop__up.style.display = "none";
});

men__pop__up.addEventListener('mouseover', () => {
    men__pop__up.style.display = "block";
});
men__pop__up.addEventListener('mouseout', () => {
    men__pop__up.style.display = "none";
});

women__pop__up.addEventListener('mouseover', () => {
    women__pop__up.style.display = "block";
});
women__pop__up.addEventListener('mouseout', () => {
    women__pop__up.style.display = "none";
});

kids__pop__up.addEventListener('mouseover', () => {
    kids__pop__up.style.display = "block";
});
kids__pop__up.addEventListener('mouseout', () => {
    kids__pop__up.style.display = "none";
});