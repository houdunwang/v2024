import { useAxios } from "@/hooks/useAxios"
import { ILesson } from "@/types/lesson"
import { IPaginate } from "@/types/paginate"
import { useQuery } from "@tanstack/react-query"
import { AxiosError } from "axios"

export const useGetLessonList = (type: 'system' | 'project') => {
	const { http } = useAxios()
	return useQuery<IPaginate<ILesson>, AxiosError>({
		queryKey: ['lesson'],
		queryFn: async () => {
			return (await http.get(`/lesson?type=${type}`)).data
		},
	})
}

//获取课程详情
export const useGetLessonDetail = (id: string,) => {
	const { http } = useAxios()
	return useQuery<ILesson, AxiosError>({
		queryKey: ['lesson', id],
		queryFn: async () => {
			return (await http.get(`/lesson/${id}`)).data
		}
	})
}