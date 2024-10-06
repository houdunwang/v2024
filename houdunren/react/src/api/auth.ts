import { IUser } from "@/types/user"
import { axiosInstance } from "./axios"

export interface ILoginParam {
	name: string,
	password: string
}
export const login = async (params: ILoginParam) => {
	return (await axiosInstance.post<{ user: IUser, token: string }>('/login', params)).data
}