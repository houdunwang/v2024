import { useAxios } from "@/hooks/useAxios"
import { IChapter } from "@/types/chapter"
import { IPaginate } from "@/types/paginate"
import { useQuery } from "@tanstack/react-query"
import { AxiosError } from "axios"

export const useGetChapterList = () => {
	const { http } = useAxios()
	return useQuery<IPaginate<IChapter>, AxiosError>({
		queryKey: ['chapter-list'],
		queryFn: async () => {
			return (await http.get(`/chapter`)).data
		},
	})
}

//获取课程详情
export const useGetChapterDetail = (id: string,) => {
	const { http } = useAxios()
	return useQuery<IChapter, AxiosError>({
		queryKey: ['chapter-detail', id],
		queryFn: async () => {
			return (await http.get(`/chapter/${id}`)).data
		}
	})
}