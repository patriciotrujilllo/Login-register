const handleFormSubmit = (event, callback, formElement) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData);
    formElement.reset();
    callback(data);

}

document.addEventListener("DOMContentLoaded", function () {

    formLogin = document.querySelector('#formLogin');
    formRegister = document.querySelector('#formRegister');

    if (formLogin) {
        formLogin.addEventListener("submit", function (event) {
            handleFormSubmit(event, login, formLogin);

        });
    }
    if (formRegister) {
        formRegister.addEventListener("submit", function (event) {
            handleFormSubmit(event, register, formLogin);
        });
    }

});
