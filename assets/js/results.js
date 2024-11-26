// Dữ liệu mock
var mockData = [
    {
        title: "Hà Nội - Thủ đô ngàn năm văn hiến",
        description: "Hà Nội nổi tiếng với Hồ Gươm, phố cổ và các món ăn đặc sắc.",
        image: "https://via.placeholder.com/150",
        link: "#",
    },
    {
        title: "Hạ Long - Kỳ quan thiên nhiên thế giới",
        description: "Vịnh Hạ Long với hàng nghìn hòn đảo lớn nhỏ và các hang động kỳ thú.",
        image: "https://via.placeholder.com/150",
        link: "#",
    },
    {
        title: "Đà Nẵng - Thành phố đáng sống",
        description: "Đà Nẵng nổi tiếng với bãi biển Mỹ Khê và cầu Rồng đặc sắc.",
        image: "https://via.placeholder.com/150",
        link: "#",
    },
];

// Chọn phần tử form, input và container kết quả
var searchForm = document.querySelector('#searchForm');
var searchInput = document.querySelector('.search-input');
var resultsContainer = document.querySelector('.search-results');

// Hàm tạo các kết quả tìm kiếm từ dữ liệu mock
function renderResults(data) {
    resultsContainer.innerHTML = ''; // Xóa kết quả cũ
    data.forEach(item => {
        var resultCard = document.createElement("div");
        resultCard.classList.add("search-results-card");

        resultCard.innerHTML = `
            <img src="${item.image}" alt="${item.title}">
            <div class="content">
                <h3><a href="${item.link}">${item.title}</a></h3>
                <p>${item.description}</p>
            </div>
        `;

        resultsContainer.appendChild(resultCard);
    });
}

// Render tất cả các kết quả ban đầu
renderResults(mockData);

// Xử lý sự kiện submit của form
searchForm.addEventListener('submit', function(e) {
    e.preventDefault(); // Ngừng gửi form, tránh reload trang

    // Lấy giá trị tìm kiếm và chuyển về chữ thường
    let txtSearch = searchInput.value.trim().toLowerCase();

    // Lọc dữ liệu dựa trên tiêu đề và mô tả
    let filteredResults = mockData.filter(item => {
        let title = item.title.toLowerCase();
        let description = item.description.toLowerCase();
        return title.includes(txtSearch) || description.includes(txtSearch);
    });

    // Render các kết quả lọc được
    renderResults(filteredResults);
});
