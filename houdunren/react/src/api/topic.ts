import qs from 'qs';
import { axiosInstance } from "./axios"
import { IPaginate } from '@/types/common';
import { ITopic } from '@/types/topic';

export interface IGetTopicList {
	page: number,
	row: number
}
export const getTopicList = async (params: IGetTopicList) => {
	return (await axiosInstance.get<IPaginate<ITopic>>('/topic?' + qs.stringify(params))).data
}