const url = '../../backend/Api/loginApi.php';
const url2 = '../../backend/Api/registerApi.php';


const login = (data) => {
    axios({
        method: 'POST',
        url: url,
        responseType: 'json',
        data: {
            email: data.email,
            password: data.password
        }
    }).then(res => {
        window.location.href = "Home.php";
    }).catch(error => {
        document.querySelector('#error').style.display = "block";
        document.querySelector('#error').textContent = error.response.data.error;
        //console.error(error.response.data.error);
    })
}
const register = (data) => {
    axios({
        method: 'POST',
        url: url2,
        responseType: 'json',
        data: {
            email: data.email,
            password: data.password
        }
    }).then(res => {
        window.location.href = "login.php";
    }).catch(error => {
        document.querySelector('#error').style.display = "block";
        document.querySelector('#error').textContent = error.response.data.error;
    })
}
