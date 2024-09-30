import qs from 'qs';
import { ILesson } from "@/types/lesson"
import { axiosInstance } from "./axios"
import { IPaginate } from '@/types/common';

export interface IGetLessonListParams {
	page: number
	row: number
}
//获取课程列表
export const getLessonList = async (params: IGetLessonListParams) => {
	return (await axiosInstance.get<IPaginate<ILesson>>(`/lesson?` + qs.stringify(params))).data
}

export const getLesson = async (id: number) => {
	return (await axiosInstance.get<ILesson>(`/lesson/${id}`)).data
}
