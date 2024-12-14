import { IChapter } from "./chapter";

export interface ILesson {
	id: string;
	title: string;
	preview: string;
	description: string;
	price: string;
	video: null;
	order: number;
	chapter_num: number;
	video_num: number;
	view_num: number;
	type: string;
	favorite_count: number;
	deleted_at: null;
	created_at: string;
	updated_at: string;
	chapters: IChapter[]
}