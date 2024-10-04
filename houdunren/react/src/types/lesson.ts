import { IVideo } from "./video";

export interface ILesson {
	id: number;
	title: string;
	description: string;
	preview: string;
	video: null;
	price: string;
	chapter_id: number;
	download_address: null;
	video_num: number;
	view_num: number;
	favorite_count: number;
	created_at: string;
	updated_at: string;
	chapter: Record<string, string>;
	videos: IVideo[]
}