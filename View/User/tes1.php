<!-- login_form.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Đường dẫn đến thư viện jQuery -->
    <script>
        $(document).ready(function() {
            $('#login-form').on('submit', function(e) {
                e.preventDefault(); // Ngăn chặn form submit mặc định

                // Lấy dữ liệu từ form
                var username = $('#username').val();
                var password = $('#password').val();

                // Gửi request Ajax
                $.ajax({
                    type: 'POST',
                    url: 'login_process.php', // Đường dẫn tới file xử lý đăng nhập
                    data: {
                        user: username,
                        pwd: password
                    },
                    success: function(response) {
                        if (response.trim() === 'success') {
                            // Đăng nhập thành công, chuyển hướng hoặc làm gì đó
                            window.location.href = 'index.php'; // Chuyển hướng đến trang index.php
                        } else {
                            // Đăng nhập không thành công, thông báo lỗi
                            $('#error-message').html('Invalid username or password.');
                        }
                    },
                    error: function() {
                        // Xử lý lỗi nếu có
                        alert('Có lỗi xảy ra trong quá trình đăng nhập.');
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h2>Login Form</h2>
    <form id="login-form">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="user" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="pwd" required><br><br>
        <input type="submit" value="Login">
    </form>
    <div id="error-message" style="color: red;"></div>
</body>
</html>
