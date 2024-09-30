import { getChapter, getChapterListApi } from "@/api/chapter";
import { IChapterType } from "@/types/chapter";
import { useSuspenseQuery } from "@tanstack/react-query";

export const useGetChapterList = (type: IChapterType) => {
	return useSuspenseQuery({
		queryKey: ['chapterList', type],
		queryFn: async () => {
			return getChapterListApi(type)
		},
	})
}

//获取章节
export const useGetChapter = (id: number) => {
	return useSuspenseQuery({
		queryKey: ['chapter', id],
		queryFn: async () => {
			return getChapter(id)
		},
	})
}
