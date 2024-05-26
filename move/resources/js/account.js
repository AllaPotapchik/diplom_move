const lesson_btn = document.getElementById('lesson_btn');
const program_btn = document.getElementById('program_btn');
const subscription_btn = document.getElementById('subscription_btn');
const update_btn = document.getElementById('update_btn');

const lessonsDiv = document.querySelector('.my_lessons');
const programsDiv = document.querySelector('.my_programs');
const subscriptionsDiv = document.querySelector('.my_subscriptions');
const editDiv = document.querySelector('.edit_profile');


$('.delete-btn').on('click', function () {
    var res = confirm('Вы уверены что хотите отменить запись?');
    if(!res){
        return false;
    }
});
lesson_btn.addEventListener('click', () => {

    lesson_btn.style.backgroundColor = '#BA80E6';
    lesson_btn.style.color = '#ffffff';

    program_btn.style.backgroundColor = 'white';
    program_btn.style.color = '#704D8A';

    subscription_btn.style.backgroundColor = 'white';
    subscription_btn.style.color = '#704D8A';

    update_btn.style.backgroundColor = 'white';
    update_btn.style.color = '#704D8A';

    lessonsDiv.style.display = 'block';
    programsDiv.style.display = 'none';
    subscriptionsDiv.style.display = 'none';
    editDiv.style.display = 'none';
});

program_btn.addEventListener('click', () => {

    program_btn.style.backgroundColor = '#BA80E6';
    program_btn.style.color = '#ffffff';

    lesson_btn.style.backgroundColor = 'white';
    lesson_btn.style.color = '#704D8A';

    subscription_btn.style.backgroundColor = 'white';
    subscription_btn.style.color = '#704D8A';

    update_btn.style.backgroundColor = 'white';
    update_btn.style.color = '#704D8A';

    programsDiv.style.display = 'block';
    lessonsDiv.style.display = 'none';
    subscriptionsDiv.style.display = 'none';
    editDiv.style.display = 'none';

});

subscription_btn.addEventListener('click', () => {

    subscription_btn.style.backgroundColor = '#BA80E6';
    subscription_btn.style.color = '#ffffff';

    lesson_btn.style.backgroundColor = 'white';
    lesson_btn.style.color = '#704D8A';

    program_btn.style.backgroundColor = 'white';
    program_btn.style.color = '#704D8A';

    update_btn.style.backgroundColor = 'white';
    update_btn.style.color = '#704D8A';

    subscriptionsDiv.style.display = 'block';
    lessonsDiv.style.display = 'none';
    programsDiv.style.display = 'none';
    editDiv.style.display = 'none';

});

update_btn.addEventListener('click', () => {

    update_btn.style.backgroundColor = '#BA80E6';
    update_btn.style.color = '#ffffff';

    subscription_btn.style.backgroundColor = 'white';
    subscription_btn.style.color = '#704D8A';

    lesson_btn.style.backgroundColor = 'white';
    lesson_btn.style.color = '#704D8A';

    program_btn.style.backgroundColor = 'white';
    program_btn.style.color = '#704D8A';

    editDiv.style.display = 'flex';
    lessonsDiv.style.display = 'none';
    programsDiv.style.display = 'none';
    subscriptionsDiv.style.display = 'none';

});


