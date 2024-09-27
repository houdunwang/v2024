export interface IChapter {
	id: number;
	title: string;
	preview: string;
	description: string;
	order: number;
	lesson_num: number;
	video_num: number;
	view_num: number;
	download_address: null;
	type: string;
	created_at: string;
	updated_at: string;
}

export type IChapterType = 'system' | 'project';