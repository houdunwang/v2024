import axios from 'axios'
const BASE_URL = 'http://laravel.test/api';
export const axiosInstance = axios.create({
	baseURL: BASE_URL
})
