import { getVideoList, IGetVideoList } from "@/api/video"
import { useSuspenseQuery } from "@tanstack/react-query"

export const useGetVideoList = (params: IGetVideoList) => {
	return useSuspenseQuery({
		queryKey: ['videoList', params],
		queryFn: async () => getVideoList(params)
	})
}