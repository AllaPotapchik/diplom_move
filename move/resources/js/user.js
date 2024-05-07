const upload_btn = document.getElementById('upload_btn');
const done_btn = document.getElementById('done_btn');

if(upload_btn && done_btn){
    upload_btn.addEventListener('click', () => {
        done_btn.style.display = 'none';
    });
}
