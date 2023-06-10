
formRegister = document.querySelector('#formRegister');

formRegister.addEventListener("submit", function (event) {

    event.preventDefault();
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData);

    register(data);

});

