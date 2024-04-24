//import bootstrap
import './bootstrap';
import IMask from 'imask'

const close_btn = document.getElementById('close_btn');
const alertDiv = document.querySelector('.alert');

close_btn.addEventListener('click', () => {
    alertDiv.style.display = 'none';
});

const menu_burger = document.querySelector("#menu_burger");
const popup = document.querySelector("#popup");
const account = document.getElementById("#icon");
const body = document.body;

// Клонируем меню, чтобы задать свои стили для мобильной версии
const menu = document.querySelector("#menu").cloneNode(1);

// При клике на иконку menu_burger вызываем ф-ию menu_burgerHandler
menu_burger.addEventListener("click", menu_burgerHandler);

// Выполняем действия при клике ..
function menu_burgerHandler(e) {
    e.preventDefault();
    // Переключаем стили элементов при клике
    popup.classList.toggle("open");
    menu_burger.classList.toggle("active");
    body.classList.toggle("noscroll");
    renderPopup();
}

// Здесь мы рендерим элементы в наш попап
function renderPopup() {
    popup.appendChild(menu);
}

// Код для закрытия меню при нажатии на ссылку
const links = Array.from(menu.children);

// Для каждого элемента меню при клике вызываем ф-ию
links.forEach((link) => {
    link.addEventListener("click", closeOnClick);
});

// Закрытие попапа при клике на меню
function closeOnClick() {
    popup.classList.remove("open");
    account.removeClass('display');
    menu_burger.classList.remove("active");
    body.classList.remove("noscroll");
}

//create template fot phone mask
let element = document.getElementById('phone');
let maskOptions = {
    mask: '+{375}(00) 000-00-00'
};

IMask(element, maskOptions);
