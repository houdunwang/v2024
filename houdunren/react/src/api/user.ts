import { IUser } from "@/types/user";
import { axiosInstance } from "./axios"

export const getCurrentUser = async () => {
	return (await axiosInstance.get<IUser>('/user/current')).data;
}