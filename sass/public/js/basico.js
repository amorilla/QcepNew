

// 添加事件监听器
document.addEventListener("DOMContentLoaded", function () {
    document.addEventListener("click", function (event) {
        // 检查点击的元素是否为登录按钮
        if (event.target && event.target.id === "loginButton") {
            // 创建模态框
            var googleLoginModal = new bootstrap.Modal(document.getElementById('googleLoginModal'));
            // 显示模态框
            googleLoginModal.show();
        }
    });
});


// 添加事件监听器
document.addEventListener("DOMContentLoaded", function () {
    document.addEventListener("click", function (event) {
        // 检查点击的元素是否为谷歌登录按钮
        if (event.target && event.target.id === "googleLoginButtonModal") {
            // 在此处执行谷歌登录操作
            // 例如重定向到谷歌登录页面
            window.location.href = "?user/loginWithGoogle";
        }
    });
});


function validateForm(event) {
    event.preventDefault();
    const username = document.getElementById('customername-field').value.trim();
    const email = document.getElementById('email-field').value.trim();

    if (!username) {
        document.getElementById('username-error').style.display = 'block';
        return;
    } else {
        document.getElementById('username-error').style.display = 'none';
    }

    // 检查邮箱格式
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        document.getElementById('email-error').style.display = 'block';
        return;
    } else {
        document.getElementById('email-error').style.display = 'none';
    }

    // 创建一个包含表单数据的对象
    const formData = {
        username: username,
        email: email,
        isAdmin: document.getElementById('admin-input').checked
    };

    // 发送 AJAX 请求
    fetch('?user/addUser', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(formData)
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            // 检查响应类型
            const contentType = response.headers.get('content-type');
            if (contentType && contentType.includes('application/json')) {
                // 如果是 JSON 格式的响应，则解析 JSON
                return response.json();
            } else {
                // 否则直接获取响应的文本内容
                return response.text();
            }
        })
        .then(data => {
            console.log('Data received:', data);
            if (data.success) {
                const newOrderModal = new bootstrap.Modal(document.getElementById('newOrderModal'));
                newOrderModal.hide();
                // 清空输入字段
                document.getElementById('customername-field').value = '';
                document.getElementById('email-field').value = '';
                document.getElementById('admin-input').checked = false;
                document.getElementById('group-input').selectedIndex = 0; // 选择第一个选项
            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
            // 输出错误信息
            console.log('Error message:', error.message);
        });
}

/*******
 * 
 * 
 * Function para buscar los proceso con serach
 * 
 * 
 */

// 获取搜索栏输入框和所有卡片元素
const searchInput = document.getElementById('searchInput');
const cardContainer = document.getElementById('sortable-list');
const cards = document.querySelectorAll('.card');

// 保存原始卡片顺序
const originalOrder = Array.from(cards);

// 添加事件监听器，以便在输入框中输入时过滤和重新排列卡片
searchInput.addEventListener('input', function () {
    const searchText = this.value.toLowerCase(); // 获取输入框中的文本并转换为小写

    // 过滤卡片并重新排列顺序
    const filteredCards = originalOrder.filter(card => {
        const title = card.querySelector('.card-title').textContent.toLowerCase(); // 获取当前卡片的标题文本并转换为小写
        const text = card.querySelector('.card-text').textContent.toLowerCase(); // 获取当前卡片的文本内容并转换为小写
        return title.includes(searchText) || text.includes(searchText); // 如果标题或文本包含搜索文本，则保留该卡片
    });

    // 清空容器并将过滤后的卡片添加回容器
    cardContainer.innerHTML = '';
    let rowDiv = document.createElement('div');
    rowDiv.classList.add('row');
    let colIndex = 0; // 记录当前列索引
    filteredCards.forEach((card, index) => {
        const colDiv = document.createElement('div');
        colDiv.classList.add('col-md-4', 'mb-3');
        colDiv.appendChild(card);
        rowDiv.appendChild(colDiv);
        colIndex++;
        // 如果是每行的最后一张卡片或是最后一张卡片，则添加到容器中
        if (colIndex === 3 || index === filteredCards.length - 1) {
            cardContainer.appendChild(rowDiv);
            rowDiv = document.createElement('div');
            rowDiv.classList.add('row');
            colIndex = 0; // 重置列索引
        }
    });
});

// 在取消搜索时恢复所有卡片的显示
searchInput.addEventListener('search', function () {
    // 清空搜索框并显示所有卡片
    if (this.value === '') {
        cardContainer.innerHTML = '';
        let rowDiv = document.createElement('div');
        rowDiv.classList.add('row');
        let colIndex = 0; // 记录当前列索引
        originalOrder.forEach((card, index) => {
            const colDiv = document.createElement('div');
            colDiv.classList.add('col-md-4', 'mb-3');
            colDiv.appendChild(card);
            rowDiv.appendChild(colDiv);
            colIndex++;
            // 如果是每行的最后一张卡片或是最后一张卡片，则添加到容器中
            if (colIndex === 3 || index === originalOrder.length - 1) {
                cardContainer.appendChild(rowDiv);
                rowDiv = document.createElement('div');
                rowDiv.classList.add('row');
                colIndex = 0; // 重置列索引
            }
        });
    }
});