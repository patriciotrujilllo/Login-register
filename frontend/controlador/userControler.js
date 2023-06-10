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
        console.log(res);
    }).catch(error => {
        console.error(error);
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
        console.log(res);
    }).catch(error => {
        console.error(error);
    })
}
