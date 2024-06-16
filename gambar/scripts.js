document.addEventListener('DOMContentLoaded', () => {
    const loginBtn = document.getElementById('login-btn')
    const loginModal = document.getElementById('login-modal')
    const closeModal = document.getElementById('close-modal')
    const loginForm = document.getElementById('login-form')

    loginBtn.addEventListener('click', () => {
        loginModal.showModal()
    })

    closeModal.addEventListener('click', () => {
        loginModal.close()
    })

    loginForm.addEventListener('submit', (event) => {
        event.preventDefault()

        const username = event.target.username.value
        const password = event.target.password.value

        // Perform your login logic here
        // For example, send a request to your server to authenticate the user

        // Close the modal after successful login
        if ( 'sahlanmufid || sahlan') {
            alert('Login successful')
            loginModal.close()
        }
    })
});