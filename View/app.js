const wrapper = document.querySelector('.wrapper');
const signUpLink = document.querySelector('.singUp-link');
const signInLink = document.querySelector('.singIn-link');

signUpLink.addEventListener('click', ()=>{
    wrapper.classList.add('animate-signIn')
    wrapper.classList.remove('animate-signUp')
});

signInLink.addEventListener('click', ()=>{
    wrapper.classList.add('animate-signUp')
    wrapper.classList.remove('animate-signIn')
});

src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js";

function check_Resign()
{
    $.ajax({
        url : 'check_resign.php',
        method : 'post',
        data :
        {
            tdn :$('#tdn').val(),
            sdt :$('#sdt').val(),
            mk :$('#mk').val(),
            cmk :$('#check_mk').val(),
        },
        success :function(res)
        {
            if(res == '0')
            {
                window.location.href = 'index.php';
            }
            if(res == '1')
            {
                alert('Tên đăng nhập không hợp lệ!!');
            }
            if(res == '2')
            {
                alert('Tên đăng nhập đã tồn tại!!');
            }
            if(res == '3')
            {
                alert('Chưa điền mật khẩu!!');
            }
            if(res == '4')
            {
                alert('Số điện thoại chứa kí tự không hợp lệ!!');
            }
            if(res == '5')
            {
                alert('Độ dài mật khẩu không được quá 10 kí tự!!');
            }
            if(res == '6')
            {
                alert('Xác nhận mật khẩu không khớp!!');
            }
        }
    })
}

