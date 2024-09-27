import { getChapterListApi } from "@/api/chapter";
import { IChapterType } from "@/types/chapter";
import { useQuery } from "@tanstack/react-query";

export const useGetChapterList = (type: IChapterType) => {
	return useQuery({
		queryKey: ['chapterList', type],
		queryFn: async () => {
			return getChapterListApi(type)
		}
	})
}