import qs from 'qs';
import { axiosInstance } from "./axios"
import { IPaginate } from '@/types/common';
import { ITopic } from '@/types/topic';

// 获取话题列表
export interface IGetTopicListParmas { page: number, row: number }
export const getTopicList = async (params: IGetTopicListParmas) => {
	return (await axiosInstance.get<IPaginate<ITopic>>('/topic?' + qs.stringify(params))).data
}

//贴子详情页
export const getTopic = async (id: number) => {
	return (await axiosInstance.get<ITopic>(`/topic/${id}`)).data
}