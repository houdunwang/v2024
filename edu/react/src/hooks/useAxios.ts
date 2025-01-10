import { ValidateStore } from "@/store/ValidateStore";
import axios, { AxiosError } from "axios";

export const useAxios = () => {
	const setValidateErrors = ValidateStore(state => state.setErrors)
	const resetValidateErrors = ValidateStore(state => state.resetErrors)
	const http = axios.create({
		baseURL: '/hd',
		timeout: 10000,
		// headers: { 'X-Custom-Header': 'foobar' }
	});

	// 添加请求拦截器
	http.interceptors.request.use(function (config) {
		// 在发送请求之前做些什么
		resetValidateErrors();
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
	}, function (error: AxiosError<any>) {
		switch (error.status) {
			case 422:
				const errors = error.response?.data.errors;
				setValidateErrors(errors)
		}

		// 超出 2xx 范围的状态码都会触发该函数。
		// 对响应错误做点什么
		return Promise.reject(error);
	});
	return { http }
}