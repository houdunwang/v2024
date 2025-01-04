import { useAxios } from "@/hooks/useAxios"
import { IPaginate } from "@/types/paginate"
import { IVideo } from "@/types/video"
import { useQuery } from "@tanstack/react-query"
import { AxiosError } from "axios"

//获取视频列表
export const useGetVideoList = (page: number) => {
	const { http } = useAxios()
	return useQuery<IPaginate<IVideo>, AxiosError>({
		queryKey: ["videoList", page],
		queryFn: async () => (await http.get(`/video?page=${page}`)).data
	})
}