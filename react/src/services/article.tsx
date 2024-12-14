import { useAxios } from "@/hooks/useAxios"
import { IArticle } from "@/types/article"
import { useQuery } from "@tanstack/react-query"
import { AxiosError } from "axios"

export const useGetArticleList = () => {
	const { http } = useAxios()
	return useQuery<IArticle[], AxiosError>({
		queryKey: ['lesson'],
		queryFn: async () => {
			return (await http.get('/article')).data
		}
	})
}

//获取文章的详情
export const useGetArticleDetail = (id: string) => {
	const { http } = useAxios()
	return useQuery<IArticle, AxiosError>({
		queryKey: ['lesson', id],
		queryFn: async () => {
			return (await http.get(`/article/${id}`)).data
		}
	})
}