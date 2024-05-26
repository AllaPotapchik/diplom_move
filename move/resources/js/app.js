//import bootstrap
import './bootstrap';
import IMask from 'imask'


/* появление блоков*/

function onEntry(entry) {
    entry.forEach(change => {
        if (change.isIntersecting) {
            change.target.classList.add('element-show');
        }
    });
}

let options = {
    threshold: [0.5] };
let observer = new IntersectionObserver(onEntry, options);
let elements = document.querySelectorAll('.element-animation');

for (let elm of elements) {
    observer.observe(elm);
}

/*кнопки*/
document.querySelectorAll('.button').forEach(button => {

    let div = document.createElement('div'),
        letters = button.textContent.trim().split('');

    function elements(letter, index, array) {

        let element = document.createElement('span'),
            part = (index >= array.length / 2) ? -1 : 1,
            position = (index >= array.length / 2) ? array.length / 2 - index + (array.length / 2 - 1) : index,
            move = position / (array.length / 2),
            rotate = 1 - move;

        element.innerHTML = !letter.trim() ? '&nbsp;' : letter;
        element.style.setProperty('--move', move);
        element.style.setProperty('--rotate', rotate);
        element.style.setProperty('--part', part);

        div.appendChild(element);
    }

    letters.forEach(elements);
    button.innerHTML = div.outerHTML;

    button.addEventListener('mouseenter', e => {
        if(!button.classList.contains('out')) {
            button.classList.add('in');
        }
    });

    button.addEventListener('mouseleave', e => {
        if(button.classList.contains('in')) {
            button.classList.add('out');
            setTimeout(() => button.classList.remove('in', 'out'), 950);
        }
    });

});


const menu_burger = document.querySelector("#menu_burger");
// alert(menu_burger);

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
    mask: '+{375} (00) 000-00-00'
};

IMask(element, maskOptions);

close_btn.addEventListener('click', () => {
    alertDiv.style.display = 'none';
});
