

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

// function validateForm(event) {
//     event.preventDefault();
//     const username = document.getElementById('customername-field').value.trim();
//     const email = document.getElementById('email-field').value.trim();

//     if (!username) {
//         document.getElementById('username-error').style.display = 'block';
//         return;
//     } else {
//         document.getElementById('username-error').style.display = 'none';
//     }

//     // 检查邮箱格式
//     const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//     if (!emailRegex.test(email)) {
//         document.getElementById('email-error').style.display = 'block';
//         return;
//     } else {
//         document.getElementById('email-error').style.display = 'none';
//     }

//     // 创建一个包含表单数据的对象
//     const formData = {
//         username: username,
//         email: email,
//         isAdmin: document.getElementById('admin-input').checked
//     };

//     // 发送 AJAX 请求
//     fetch('?user/addUser', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json'
//         },
//         body: JSON.stringify(formData)
//     })
//         .then(response => {
//             if (!response.ok) {
//                 throw new Error('Network response was not ok');
//             }
//             // 检查响应类型
//             const contentType = response.headers.get('content-type');
//             if (contentType && contentType.includes('application/json')) {
//                 // 如果是 JSON 格式的响应，则解析 JSON
//                 return response.json();
//             } else {
//                 // 否则直接获取响应的文本内容
//                 return response.text();
//             }
//         })
//         .then(data => {
//             console.log('Data received:', data);
//             if (data.success) {
//                 const newOrderModal = new bootstrap.Modal(document.getElementById('newOrderModal'));
//                 newOrderModal.hide();
//                 // 清空输入字段
//                 document.getElementById('customername-field').value = '';
//                 document.getElementById('email-field').value = '';
//                 document.getElementById('admin-input').checked = false;
//                 document.getElementById('group-input').selectedIndex = 0; // 选择第一个选项
//                 // 刷新页面
//                 location.reload();
//             } else {
//                 // 处理特定错误消息
//                 if (data.message) {
//                     console.error('Error message:', data.message);
//                 }
//             }
//         })
//         .catch(error => {
//             console.error('There was a problem with the fetch operation:', error);
//             // 输出错误信息
//             console.log('Error message:', error.message);
//         });
// }


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

if (searchInput) {
    searchInput.addEventListener('input', function (event) {
        searchInput.addEventListener('input', function () {
            const searchText = this.value.toLowerCase(); // 获取输入框中的文本并转换为小写

            // 过滤卡片并重新排列顺序
            const filteredCards = originalOrder.filter(card => {
                const title = card.querySelector('.card-title').textContent.toLowerCase(); // 获取当前卡片的标题文本并转换为小写
                return title.includes(searchText); // 如果标题或文本包含搜索文本，则保留该卡片
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
    });
}




/**
 *
 * Function para buscar los usuario, grupos y username con SEARCH
 */
const searchInputUser = document.getElementById('searchTableListUser');
// 获取表格内容行
const tableRows = document.querySelectorAll('#order-list tbody tr');


if (searchInputUser) {
    // 监听输入框的输入事件
    searchInputUser.addEventListener('input', function (event) {
        // 获取输入框的值
        const searchValue = event.target.value.toLowerCase();

        // 遍历表格内容行
        tableRows.forEach(row => {
            // 获取行中的邮箱、用户名和用户组
            const email = row.cells[2].textContent.toLowerCase();
            const username = row.cells[3].textContent.toLowerCase();
            const groups = row.cells[5].textContent.toLowerCase();

            // 如果邮箱、用户名或用户组中包含输入框中的值，则显示该行；否则隐藏该行
            if (email.includes(searchValue) || username.includes(searchValue) || groups.includes(searchValue)) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    });
}

document.getElementById('addPuntoNormaBtn').addEventListener('click', function () {
    var select = document.getElementById('puntoNorma'); // 获取选择框元素
    var selectedOption = select.options[select.selectedIndex]; // 获取选定的选项
    var pNormaList = document.getElementById('pNormaList'); // 获取 ul 元素

    // 如果选定的选项不为空，且当前列表中不存在相同选项，则添加为新的列表项
    if (selectedOption && selectedOption.value !== '' && !isOptionAlreadyAdded(selectedOption)) {
        // 创建新的列表项
        var listItem = document.createElement('li');
        listItem.textContent = selectedOption.text;

        // 添加一个点击事件监听器，以便在点击时删除列表项
        listItem.addEventListener('click', function () {
            this.parentNode.removeChild(this); // 从父节点中删除当前列表项
        });

        // 将新的列表项添加到 ul 元素中
        pNormaList.appendChild(listItem);
    }
});

// 检查当前列表中是否已经存在相同的选项
function isOptionAlreadyAdded(option) {
    var pNormaList = document.getElementById('pNormaList');
    var listItems = pNormaList.getElementsByTagName('li');

    for (var i = 0; i < listItems.length; i++) {
        if (listItems[i].textContent === option.text) {
            return true;
        }
    }
    return false;
}





// 监听表单提交事件
document.getElementById('addPuntoNormaBtn').addEventListener('click', function () {
    // 获取 ul 元素
    var pNormaList = document.getElementById('pNormaList');

    // 获取隐藏字段
    var pNormaValuesInput = document.getElementById('pNormaValues');

    // 获取 ul 元素中的所有 li
    var listItems = pNormaList.getElementsByTagName('li');

    // 将 ul 中的每个 li 的文本内容添加到隐藏字段中
    var values = [];
    for (var i = 0; i < listItems.length; i++) {
        values.push(listItems[i].textContent.trim());
    }

    // 将文本内容连接成一个字符串，并用逗号分隔
    pNormaValuesInput.value = values.join(',');
});


//Añadir los grupos de interes

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('addInteres').addEventListener('click', function () {
        var gInteresSelect = document.getElementById('gInteres'); // 获取选择框元素
        var entradaInput = document.getElementById('entrada'); // 获取 entrada 输入框
        var salidaInput = document.getElementById('salida'); // 获取 salida 输入框
        var interesList = document.getElementById('interesList'); // 获取 ul 元素

        // 获取选定的选项值
        var selectedInteres = gInteresSelect.options[gInteresSelect.selectedIndex].text;
        var entradaValue = entradaInput.value.trim();
        var salidaValue = salidaInput.value.trim();

        // 如果所有字段都不为空且当前列表中不存在相同选项，则添加为新的列表项
        if (selectedInteres && entradaValue && salidaValue && !isInteresAlreadyAdded(selectedInteres, entradaValue, salidaValue)) {
            // 创建新的列表项
            var listItem = document.createElement('li');
            listItem.textContent = 'Grupo de Interes: ' + selectedInteres + ', Entrada: ' + entradaValue + ', Salida: ' + salidaValue;
            listItem.classList.add('list-group-item');

            // 添加一个点击事件监听器，以便在点击时删除列表项
            listItem.addEventListener('click', function () {
                this.parentNode.removeChild(this); // 从父节点中删除当前列表项
                updateInteresValues();
            });

            // 将新的列表项添加到 ul 元素中
            interesList.appendChild(listItem);

            // 清空输入框的值
            entradaInput.value = '';
            salidaInput.value = '';

            // 更新隐藏字段
            updateInteresValues();
        }
    });

    // 检查当前列表中是否已经存在相同的选项
    function isInteresAlreadyAdded(selectedInteres, entradaValue, salidaValue) {
        var interesList = document.getElementById('interesList');
        var listItems = interesList.getElementsByTagName('li');

        for (var i = 0; i < listItems.length; i++) {
            if (listItems[i].textContent === 'Grupo de Interes: ' + selectedInteres + ', Entrada: ' + entradaValue + ', Salida: ' + salidaValue) {
                return true;
            }
        }
        return false;
    }

    // 更新隐藏字段的值
    // 更新隐藏字段的值
    function updateInteresValues() {
        var interesList = document.getElementById('interesList');
        var interesValuesInput = document.getElementById('interesValues');
        var listItems = interesList.getElementsByTagName('li');

        var values = [];
        for (var i = 0; i < listItems.length; i++) {
            var itemText = listItems[i].textContent.trim();
            var itemValues = itemText.split(', '); // 将文本分割成数组
            values.push(itemValues); // 将数组添加到 values 数组中
        }

        interesValuesInput.value = JSON.stringify(values); // 将数组转换为 JSON 字符串并设置为隐藏字段的值
    }
});
