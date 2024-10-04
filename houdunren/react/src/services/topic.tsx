import { IGetLessonListParams } from '@/api/lesson'
import { getTopic, getTopicList } from '@/api/topic'
import { useSuspenseQuery } from '@tanstack/react-query'

export const useGetTopicList = (params: IGetLessonListParams) => {
  return useSuspenseQuery({
    queryKey: ['topicList', params],
    queryFn: async () => getTopicList(params),
  })
}

//贴子详情
export const useGetTopic = (id: number) => {
  return useSuspenseQuery({
    queryKey: ['topicDetail', id],
    queryFn: async () => getTopic(id),
  })
}
