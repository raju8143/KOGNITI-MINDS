
document.addEventListener('DOMContentLoaded', function () {
    
    
    const orderForm = document.querySelector('form[action="track.php"]');
    if (orderForm) {
        orderForm.addEventListener('submit', function (event) {
            const orderIdInput = document.getElementById('order_id');
            
            if (!orderIdInput.value.trim()) {
                alert('Please enter a valid Order ID.');
                event.preventDefault(); 
            }
        });
    }

    
    const navLinks = document.querySelectorAll('header nav a');
    const currentUrl = window.location.href;
    navLinks.forEach(link => {
        if (currentUrl.includes(link.getAttribute('href'))) {
            link.style.textDecoration = 'underline';
            link.style.color = '#ffd700';
        }
    });
});
