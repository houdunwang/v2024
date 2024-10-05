import { getCommentList, IGetCommentListParams } from "@/api/comment";
import { useSuspenseQuery } from "@tanstack/react-query";

export const useGetCommentList = (params: IGetCommentListParams) => {
	return useSuspenseQuery({
		queryKey: ['commentList', params],
		queryFn: async () => getCommentList(params),
	})
}