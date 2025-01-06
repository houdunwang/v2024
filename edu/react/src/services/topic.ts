import { useAxios } from "@/hooks/useAxios"
import { IPaginate } from "@/types/paginate"
import { ITopic } from "@/types/topic"
import { useQuery } from "@tanstack/react-query"
import { AxiosError } from "axios"

//话题列表
export const useGetTopicList = (page: number) => {
	const { http } = useAxios()
	return useQuery<IPaginate<ITopic>, AxiosError>({
		queryKey: ["topicList", page],
		queryFn: async () => {
			return (await http.get(`/topic?page=${page}`)).data
		}
	})
} 