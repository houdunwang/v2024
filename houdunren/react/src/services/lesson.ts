import { getLesson, getLessonList, IGetLessonListParams } from '@/api/lesson';
import { useSuspenseQuery } from '@tanstack/react-query';
export const userGetLessonList = (params: IGetLessonListParams) => {
	return useSuspenseQuery({
		queryKey: ['lessonList', params],
		queryFn: async () => getLessonList(params)
	})
}

export const useGetLesson = (id: number) => {
	return useSuspenseQuery({
		queryKey: ['lesson', id],
		queryFn: async () => getLesson(id)
	})
}