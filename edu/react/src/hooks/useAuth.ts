import { IUser } from "@/types/user"
import { useAxios } from "./useAxios"
import { redirect } from "@tanstack/react-router"
import { message } from "antd"
const data = { user: null }
export const useAuth = () => {
	const { http } = useAxios()
	const getUserInfo = async () => {
		const user = (await http.get(`/user/current`)).data
		data.user = user;
	}
	const user = (field: keyof IUser) => {
		return data.user?.[field] || null
	}

	const check = () => {
		if (!user('id')) {
			message.info({ content: '请登录后访问', key: 'info' });
			throw redirect({ to: '/auth/login' });
		}
	}
	return { user, getUserInfo, check }
}

export type IUserAuth = ReturnType<typeof useAuth>
