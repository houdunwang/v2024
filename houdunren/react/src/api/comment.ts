import qs from 'qs';
import { axiosInstance } from "./axios"
import { IComment } from '@/types/comment';

//获取评论列表
export interface IGetCommentListParams {
	model_name: string,
	model_id: number
}
export const getCommentList = async (params: IGetCommentListParams) => {
	return (await axiosInstance.get<IComment[]>('/comment?' + qs.stringify(params))).data
}