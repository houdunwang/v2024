import { ILoginParam, login } from '@/api/auth';
import { useMutation } from '@tanstack/react-query';

export const useUserLogin = () => {
	return useMutation({
		mutationFn: (params: ILoginParam) => login(params),
		onSuccess: (data) => {
			localStorage.setItem('token', data.token)
		}
	})
}