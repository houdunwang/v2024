import { IVideo } from "./video";

export interface IChapter {
	id: string;
	lesson_id: number;
	title: string;
	preview: string;
	description: null;
	video_num: number;
	view_num: number;
	favorite_count: number;
	created_at: string;
	updated_at: string;
	download_address: null;
	video: null;
	price: null;
	videos: IVideo[]
}