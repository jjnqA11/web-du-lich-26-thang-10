// xu ly click hien thi box tao nguoi dung

let create_user_btn = document.getElementById('create_user_btn');
let create_user_box = document.getElementsByClassName('add-user-box')[0];
let create_user_close_btn = document.getElementsByClassName('close_btn')[0];

create_user_btn.addEventListener('click', () => {
    const computedStyle = window.getComputedStyle(create_user_box);
    const displayWindow = computedStyle.getPropertyValue('display');
    if(displayWindow == 'none'){
        create_user_box.style.display = 'block';
    }
})

create_user_close_btn.addEventListener('click', () => {
    const computedStyle = window.getComputedStyle(create_user_box);
    const displayWindow = computedStyle.getPropertyValue('display');
    if(displayWindow == 'block'){
        create_user_box.style.display = 'none';
    }
})

