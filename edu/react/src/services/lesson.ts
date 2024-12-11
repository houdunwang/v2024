import { useAxios } from "@/hooks/useAxios"
import { ILesson } from "@/types/lesson"
import { IPaginate } from "@/types/paginate"
import { useQuery } from "@tanstack/react-query"
import { AxiosError } from "axios"

export const useGetLessonList = () => {
	const { http } = useAxios()
	return useQuery<IPaginate<ILesson>, AxiosError>({
		queryKey: ['lesson'],
		queryFn: async () => {
			return (await http.get(`/lesson`)).data
		},
	})
}