// 当用户点击登录按钮时，显示登录模态框
document.getElementById("loginButton").addEventListener("click", function () {
    var googleLoginModal = new bootstrap.Modal(document.getElementById('googleLoginModal'));
    googleLoginModal.show();
});

// 当用户点击谷歌登录按钮时，执行登录操作
document.getElementById("googleLoginButtonModal").addEventListener("click", function () {
    // 在此处执行谷歌登录操作
    // 例如重定向到谷歌登录页面
    window.location.href = "?user/loginWithGoogle";
});