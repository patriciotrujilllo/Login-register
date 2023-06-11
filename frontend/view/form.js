const handleFormSubmit = (event, callback) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData);
    callback(data);
}

document.addEventListener("DOMContentLoaded", function () {

    formLogin = document.querySelector('#formLogin');
    formRegister = document.querySelector('#formRegister');

    if (formLogin) {
        formLogin.addEventListener("submit", function (event) {
            handleFormSubmit(event, login);
        });
    }
    if (formRegister) {
        formRegister.addEventListener("submit", function (event) {
            handleFormSubmit(event, register);
        });
    }

});
