const teacher_lesson_btn = document.getElementById('lesson_btn');
const tasks_btn = document.getElementById('tasks_btn');

const teacherLessonDiv = document.querySelector('.teacher_lessons');
const userTasksLessonDiv = document.querySelector('.user_tasks');

teacher_lesson_btn.addEventListener('click', () => {

    teacher_lesson_btn.style.backgroundColor = '#BA80E6';
    tasks_btn.style.backgroundColor = 'white';

    teacherLessonDiv.style.display = 'block';
    userTasksLessonDiv.style.display = 'none';


});

tasks_btn.addEventListener('click', () => {

    tasks_btn.style.backgroundColor = '#BA80E6';
    teacher_lesson_btn.style.backgroundColor = 'white';

    userTasksLessonDiv.style.display = 'block';
    teacherLessonDiv.style.display = 'none';

});
