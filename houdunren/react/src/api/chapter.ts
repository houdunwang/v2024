import { IChapter, IChapterType } from "@/types/chapter"
import { axiosInstance } from "./axios"
import qs from "qs"
import { IPaginate } from "@/types/common"

export const getChapterListApi = async (type?: IChapterType) => {
	const params = qs.stringify({ type })
	const response = await axiosInstance.get<IPaginate<IChapter>>(`/chapter?${params}`)
	return response.data;
}

export const getChapter = async (id: number) => {
	return (await axiosInstance.get<IChapter>(`/chapter/${id}`)).data
}