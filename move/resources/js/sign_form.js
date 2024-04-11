const btn = document.querySelector('.schedule_btn');
const form = document.querySelector('.sign_form');
const body = document.body;

console.log(btn);
console.log(form);

btn.addEventListener('click', function() {
    form.classList.toggle('active');
    body.classList.toggle("noscroll");
    const id = btn.getAttribute("id");
    return id;
})

