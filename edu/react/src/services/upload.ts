import { useAxios } from "@/hooks/useAxios"
import { useMutation } from "@tanstack/react-query"

//上传图片
export const useUploadImage = () => {
	const { http } = useAxios()
	return useMutation({
		mutationFn: async (file: File) => {
			const formData = new FormData()
			formData.append('file', file)
			return (await http.post('/upload/image',
				formData
			)).data
		},
		onSuccess: (data) => {
			console.log(data);
		}
	})
}