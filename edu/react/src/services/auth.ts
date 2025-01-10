import { useAxios } from "@/hooks/useAxios"
import { useMutation } from "@tanstack/react-query"
import { useNavigate } from "@tanstack/react-router"
import { message } from "antd"

//用户登录
export interface IloginProp { account: string, password: string }
export const useLoginMuation = () => {
	const { http } = useAxios()
	const navigate = useNavigate()
	return useMutation({
		mutationFn: async (data: IloginProp) => {
			return (await http.post('/login', data)).data
		},
		onSuccess: (data) => {
			message.info({ content: '登录成功', key: 'info' })
			navigate({ to: '/' })
			// console.log(data);
		}
	})
}