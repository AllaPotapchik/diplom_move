const confirm_btn = document.getElementById('confirm_btn');
// const back_btn = document.getElementById('back_btn');

const infoDiv = document.querySelector('.order_info');
const payDiv = document.querySelector('.pay_info');
const wrapper = document.querySelector('.wrapper');

confirm_btn.addEventListener('click', () => {
    payDiv.style.display = 'block';
 });

$("#points_btn").click(function () {
    let program_cost = '';
    let program_id = '';
    let sub_id = '';
    let cost = "";
    let id = "";
    let point_balance = document.getElementById('point_balance').innerText;
    let percent = document.getElementById('percent').innerText;
    if(!document.getElementById('sub_id')){
        program_cost = $(this).val();
        program_id = document.getElementById('program_id').innerText;
        id = program_id;
    }else {
        cost = $(this).val();
        sub_id = document.getElementById('sub_id').innerText;
        id = sub_id;
    }

    $.ajax({
        url: '/tariffs/offline/{id}/{dance_type_id}/usePoint/' + id,
        type: 'get',
        data: {
            "point_balance": point_balance,
            "cost": cost,
            'percent': percent,
            'id':id,
            // 'sub_id': sub_id,
            // 'program_id': program_id,
            'program_cost': program_cost
        },
        dataType: 'json',
        success: function (response) {
            document.getElementById('price').innerText = 'Сумма к оплате: ' + response.new_cost + ' BYN';
            document.getElementById('point_balance').innerText = response.new_balance;
            // document.getElementById('percent_available').innerText = '0';
            document.getElementById('hide').style.display = 'none';
        }
    })

});

//create template for card
let card_number = document.getElementById('cardNumber');
let card_number_maskOptions = {
    mask: '0000 0000 0000 0000'
};

let card_date = document.getElementById('expiryDate');
let card_date_maskOptions = {
    mask: '00/00'
};
IMask(card_number, card_number_maskOptions);
IMask(card_date, card_date_maskOptions);



