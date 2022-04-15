import axios from 'axios';



const axiosConfig = axios.create({

	headers: {
	'Content-type': 'application/json',
    //não funciona no hostgator: HTTP_X_REQUESTED_WITH: 'XMLHttpRequest',
    'Http-X-Requested-With': 'XMLHttpRequest',

},

baseURL: 'https://www.oficialmundoalcalino.tk/',
});



export default axiosConfig;