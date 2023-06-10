
formLogin = document.querySelector('#formLogin');

formLogin.addEventListener("submit", function (event) {

    event.preventDefault();
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData);

    login(data);
});

