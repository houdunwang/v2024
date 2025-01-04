import { useAxios } from "@/hooks/useAxios"
import { IArticle } from "@/types/article"
import { useMutation, useQuery, useQueryClient } from "@tanstack/react-query"
import { useNavigate } from "@tanstack/react-router"
import { AxiosError } from "axios"

export const useGetArticleList = () => {
	const { http } = useAxios()
	return useQuery<IArticle[], AxiosError>({
		queryKey: ['article'],
		queryFn: async () => {
			return (await http.get('/article')).data
		}
	})
}

//获取文章的详情
export const useGetArticleDetail = (id: string) => {
	const { http } = useAxios()
	return useQuery<IArticle, AxiosError>({
		queryKey: ['article', id],
		queryFn: async () => {
			return (await http.get(`/article/${id}`)).data
		}
	})
}

export const useDelArticle = () => {
	const { http } = useAxios()
	const queryClient = useQueryClient()
	return useMutation({
		mutationFn: async (id: string) => {
			return new Promise((resolve) => {
				setTimeout(async () => {
					resolve(await http.delete(`/article/${id}`))
				}, 5000)
			})
		},
		onSuccess: () => {
			queryClient.invalidateQueries({ queryKey: ['article'] })
		}
	})
}

//添加文章
export const useAddArticle = () => {
	const { http } = useAxios()
	const navigate = useNavigate()
	return useMutation({
		mutationFn: async (data: IArticle) => {
			return await http.post('/article', data)
		},
		onSuccess: () => {
			navigate({ to: '/' })
		}
	})
}

//更新文章
export const useUpdateArticle = () => {
	const { http } = useAxios()
	const navigate = useNavigate()
	return useMutation({
		mutationFn: async (data: IArticle) => {
			return await http.put(`/article/${data.id}`, data)
		},
		onSuccess: () => {
			navigate({ to: '/' })
		}
	})
}