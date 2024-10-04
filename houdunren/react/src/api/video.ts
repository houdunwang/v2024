import qs from 'qs';
import { axiosInstance } from "./axios"
import { IPaginate } from '@/types/common';
import { IVideo } from '@/types/video';

//视频列表
export interface IGetVideoList { page: number, row: number }
export const getVideoList = async (params: IGetVideoList) => {
	return (await axiosInstance.get<IPaginate<IVideo>>('/video?' + qs.stringify(params))).data
}