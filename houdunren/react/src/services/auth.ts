import { ILoginParam, login } from '@/api/auth';
import { useValidationError } from '@/store/useValidationError';
import { useMutation } from '@tanstack/react-query';

export const useUserLogin = () => {
	const setError = useValidationError(s => s.setError)
	return useMutation({
		mutationFn: (params: ILoginParam) => login(params),
		onSuccess: (data) => {
			localStorage.setItem('token', data.token)
		},
		onError: (error) => {
			Object.entries(error.response.data.errors).forEach(([key, value]) => {
				setError(key, (value as string[]).join(''))
			})
		},
		throwOnError: (error: any) => error.status != 422
	})
}