import { httpErrors } from '@/config/httpErrors';
import axios, { AxiosError } from 'axios'
import { message } from 'antd'
export const useAxios = () => {
	const http = axios.create({
		baseURL: 'http://localhost:3000',
		timeout: 1000,
		headers: { 'X-Custom-Header': 'foobar' }
	});

	// 添加请求拦截器
	http.interceptors.request.use(function (config) {
		// 在发送请求之前做些什么
		return config;
	}, function (error) {
		// 对请求错误做些什么
		return Promise.reject(error);
	});

	// 添加响应拦截器
	http.interceptors.response.use(function (response) {
		// 2xx 范围内的状态码都会触发该函数。
		// 对响应数据做点什么
		return response;
	}, function (error: AxiosError) {
		const errroMessage = httpErrors[error.status as keyof typeof httpErrors]
		if (errroMessage)
			message.info({ content: errroMessage, })
		// 超出 2xx 范围的状态码都会触发该函数。
		// 对响应错误做点什么
		return Promise.reject(error);
	});
	return { http }
}