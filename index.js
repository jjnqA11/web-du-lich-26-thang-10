function toggleTheme() {
    // Chuyển đổi giữa chế độ sáng và tối bằng cách thay đổi class "dark-theme"
    document.body.classList.toggle('dark-theme');

    // Đổi nội dung nút dựa trên chế độ hiện tại
    const btn = document.querySelector('.theme-toggle-btn');
    const tit_kns = document.querySelectorAll('.tit-kn');// lay tat ca h4 tit-kn va lap qua moi phan tu qua forEach
    const tit_kn_details = document.querySelectorAll('.tit-kn-detail'); // lay tat ca the p class tit-kn-detail va lap qua moi phan tu qua forEach
    const svgTags = document.querySelectorAll('svg'); // lay ra tat ca cac the svg trong do cu nut carousel
    if (document.body.classList.contains('dark-theme')) { //lấy giữa chế độ sáng và tối
        tit_kns.forEach(function(e) {
            e.querySelector('a').style.color = "white";
        });
        tit_kn_details.forEach(function(e){
            e.style.color = "white";
        });
        svgTags.forEach(function(e){
            e.style.fill = "rgb(255,255,255)";
        })
        btn.textContent = 'Sáng';
    } else {
        btn.textContent = 'Tối';

        tit_kns.forEach(function(e) {
            e.querySelector('a').style.color = "black";
        });
        tit_kn_details.forEach(function(e){
            e.style.color = "black";
        });
        svgTags.forEach(function(e){
            e.style.fill = "rgb(0,0,0)";
        })
    }
}

// xu ly click vao anh trong bang chuyen hien thi va tat info
document.addEventListener('DOMContentLoaded', function () {
    const title_detail_content = document.getElementById('title_detail_carousel');
    if(title_detail_content){
        // Khởi tạo Owl Carousel
    const owlCarousel = document.querySelector('.owl-carousel');

    // Lắng nghe sự kiện click vào phần tử con bên trong carousel
    owlCarousel.addEventListener('click', function (event) {
        // Kiểm tra nếu phần tử được click là item của carousel
        const clickedItem = event.target.closest('.owl-item > div');
        if (clickedItem) {
           title_detail_content.style.display = "block"; 
        }
    });
    }else{
        console.log('Error');
    }

    const closeBtnTitleCarousel = document.getElementById('closeBtnTitle');

    closeBtnTitleCarousel.addEventListener('click', () =>{
        title_detail_content.style.display = "none" ? "none" : "block";
    })

});

// xử lý tour-booking
const giaBinhDan = 14490000;
const giaSell = 16990000;

let countNumberInputPassenger1 = document.getElementById('input-passenger1');
let countNumberInputPassenger2 = document.getElementById('input-passenger2');
let countNumberInputPassenger3 = document.getElementById('input-passenger3');
let countNumberInputPassengerSell = document.getElementById('input-passenger-sell');

let totalPrice1 = document.getElementById('tour-booking-price1');
let totalPrice2 = document.getElementById('tour-booking-price2');
let totalPrice3 = document.getElementById('tour-booking-price3');
let totalPriceSell = document.getElementById('tour-booking-price-sell');


    let tongSoTienSauCung = 0;
    countNumberInputPassenger1.addEventListener('input', (event) => {
        const tongSoNguoi = parseInt(event.target.value);
    
        let bill = tongSoNguoi * giaBinhDan;

        tongSoTienSauCung += bill;
    
        totalPrice1.innerText = `${bill}₫`
    })
    
    countNumberInputPassenger2.addEventListener('input', (event) => {
        const tongSoNguoi = parseInt(event.target.value);
    
        let bill = tongSoNguoi * giaBinhDan;

        tongSoTienSauCung += bill;
    
        totalPrice2.innerText = `${bill}₫`
    })
    
    countNumberInputPassenger3.addEventListener('input', (event) => {
        const tongSoNguoi = parseInt(event.target.value);
    
        let bill = tongSoNguoi * giaBinhDan;

        tongSoTienSauCung += bill;
    
        totalPrice3.innerText = `${bill}₫`
    })
    
    countNumberInputPassengerSell.addEventListener('input', (event) => {
        const tongSoNguoi = parseInt(event.target.value);
    
        let bill = tongSoNguoi * giaSell;

        tongSoTienSauCung += bill;
    
        totalPriceSell.innerText = `${bill}₫`
    })