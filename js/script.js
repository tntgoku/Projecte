src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js";
document.addEventListener("DOMContentLoaded", function() {
    const tabs = document.querySelectorAll('.tab-link');
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.tab-link').forEach(link => link.classList.remove('current'));
            document.querySelectorAll('.tabs-content').forEach(content => content.classList.remove('current'));
            
            this.classList.add('currently');
            const content = document.querySelector(`.${this.getAttribute('data-tab')}`);
            if (content) {
                content.classList.add('currently');
            } else {
                console.error(`Element with class ${this.getAttribute('data-tab')} not found.`);
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
   let add=document.querySelectorAll('')
});

document.addEventListener("DOMContentLoaded",function(){
    var quantityInput = document.getElementById('quantity');
    var cost = parseFloat(quantityInput.getAttribute('data-cost'));

    quantityInput.addEventListener('input', function() {
        var quantity = parseInt(this.value);
        var totalCost = quantity * cost;
        document.getElementById('price').innerText = totalCost.toLocaleString();
    });
})

$(document).ready(function() {
    $('.remove-item').click(function(e) {
        e.preventDefault();
        var itemId = $(this).data('id');
        var $row = $(this).closest('tr');

        $.ajax({
            type: 'POST',
            url: 'test123.php',
            data: { remove_item: itemId },
            success: function(response) {
                if (response === 'success') {
                    $row.remove();
                } else {
                    alert('Error removing item');
                }
            },
            error: function() {
                alert('Error removing item');
            }
        });
    });
});

    $(document).addEventListener("DOMContentLoaded",(function() {
        // Giảm số lượng
        $(".decrease").click(function() {
            let $input = $(this).closest(".quantity-container").find(".item-quantity");
            let value = parseInt($input.val());
            if (value > 1) { // Đảm bảo không giảm xuống dưới 1
                $input.val(value - 1);
            }
        });

        // Tăng số lượng
        $(".increase").click(function() {
            let $input = $(this).closest(".quantity-container").find(".item-quantity");
            let value = parseInt($input.val());
            $input.val(value + 1);
        });
    }));
function updateCart(key, quantity) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "index.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("key=" + key + "&quantity=" + quantity);
}
   document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("cartLink").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent default action
        document.getElementById("cartForm").submit(); // Submit the form
    })
});
