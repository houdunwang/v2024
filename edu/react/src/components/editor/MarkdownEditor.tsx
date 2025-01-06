import React, { FC, useEffect } from 'react'
import 'cherry-markdown/dist/cherry-markdown.css';
import Cherry from 'cherry-markdown';
import { useUploadImage } from '@/services/upload';
export const MarkdownEditor: FC<{ onChange: (value: string) => void }> = ({ onChange }) => {
	const uploadMutation = useUploadImage()
	useEffect(() => {
		const cherryInstance = new Cherry({
			id: 'markdown-container',
			value: '',
			fileUpload(file, callback) {
				uploadMutation.mutate(file, {
					onSuccess: ({ url }: { url: string }) => {
						callback(url)
					}
				})
			},
			event: {
				afterChange: (value) => {
					onChange(value)
				}
			}
		});
		return () => {
			cherryInstance.destroy()
		}
	}, [])

	return (
		<main>
			<div id="markdown-container"></div>
		</main>
	)
}
