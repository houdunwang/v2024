import axios from 'axios'
const BASE_URL = 'http://laravel.test/api';
export const axiosInstance = axios.create({
	baseURL: BASE_URL
})

// 添加请求拦截器
axiosInstance.interceptors.request.use(function (config) {
	config.headers['Authorization'] = 'Bearer ' + localStorage.getItem('token')
	return config;
}, function (error) {
	return Promise.reject(error);
})