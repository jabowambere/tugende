// Modal functionality
function initializeModal() {
    const loginBtn = document.querySelector('.login-btn');
    const modal = document.getElementById('loginModal');
    const closeBtn = document.querySelector('.close');
    const loginForm = document.getElementById('loginForm');

    // Open modal
    loginBtn.addEventListener('click', function() {
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    });

    // Close modal
    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    });

    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });

    // Handle login form submission
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const email = document.getElementById('loginEmail').value;
        const password = document.getElementById('loginPassword').value;
        
        // Add loading state
        const submitBtn = loginForm.querySelector('.login-submit-btn');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Logging in...';
        submitBtn.disabled = true;
        
        // Simulate login process
        setTimeout(function() {
            // Reset form
            loginForm.reset();
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
            
            // Reset button
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
            
            // Show success message
            showNotification('Login successful! Welcome to EasyBus.', 'success');
        }, 2000);
    });
}