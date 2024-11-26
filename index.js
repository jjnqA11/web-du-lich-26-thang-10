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

// xử lý click vào box hiện ra title box
let titleInfoBox = document.getElementById('title_detail_carousel');
let imageTitleBox = document.querySelectorAll('.destination-card');
let closeBtnTitle = document.getElementById('closeBtnTitle');
imageTitleBox.forEach((box) => {
    let ImageElement = box.querySelector('img');
    ImageElement.addEventListener('click', () => {
        titleInfoBox.style.display = "block";
    });
    closeBtnTitle.addEventListener('click', () => {
        titleInfoBox.style.display = "none";
    })
})


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
let totalBill = document.getElementById('thanh-tien');

let tongSoTienSauCung = 0;

// Hàm tính tổng và cập nhật giá trị hiển thị
const updatePrices = () => {
    const tongSoNguoi1 = parseInt(countNumberInputPassenger1.value) || 0;
    const tongSoNguoi2 = parseInt(countNumberInputPassenger2.value) || 0;
    const tongSoNguoi3 = parseInt(countNumberInputPassenger3.value) || 0;
    const tongSoNguoiSell = parseInt(countNumberInputPassengerSell.value) || 0;

    // Tính giá trị từng mục
    const bill1 = tongSoNguoi1 * giaBinhDan;
    const bill2 = tongSoNguoi2 * giaBinhDan;
    const bill3 = tongSoNguoi3 * giaBinhDan;
    const billSell = tongSoNguoiSell * giaSell;

    // Cập nhật tổng
    tongSoTienSauCung = bill1 + bill2 + bill3 + billSell;

    // Cập nhật giao diện
    totalPrice1.innerText = `${bill1.toLocaleString()}₫`;
    totalPrice2.innerText = `${bill2.toLocaleString()}₫`;
    totalPrice3.innerText = `${bill3.toLocaleString()}₫`;
    totalPriceSell.innerText = `${billSell.toLocaleString()}₫`;
    totalBill.innerText = `${tongSoTienSauCung.toLocaleString()}₫`;
};

// Gắn sự kiện `input` cho các input
countNumberInputPassenger1.addEventListener('input', updatePrices);
countNumberInputPassenger2.addEventListener('input', updatePrices);
countNumberInputPassenger3.addEventListener('input', updatePrices);
countNumberInputPassengerSell.addEventListener('input', updatePrices);

function toggleDropdown() {
    const dropdown = document.getElementById('userDropdown');
    dropdown.classList.toggle('show');
}

// Close dropdown when clicking outside
document.addEventListener('click', (e) => {
    const dropdown = document.getElementById('userDropdown');
    const userInfo = document.querySelector('.user-info');

    if (!userInfo.contains(e.target)) {
        dropdown.classList.remove('show');
    }
});

