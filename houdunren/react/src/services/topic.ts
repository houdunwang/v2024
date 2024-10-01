import { getTopicList, IGetTopicList } from "@/api/topic"
import { useSuspenseQuery } from "@tanstack/react-query"

export const useGetTopicList = (params: IGetTopicList) => {
	return useSuspenseQuery({
		queryKey: ['topicList'],
		queryFn: () => getTopicList(params),
	})
}