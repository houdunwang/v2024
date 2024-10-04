import { IChapter } from "./chapter";
import { ILesson } from "./lesson";

export interface IVideo {
	id: number;
	chapter_id: number;
	lesson_id: number;
	title: string;
	order: number;
	view_num: number;
	created_at: string;
	updated_at: string;
	chapter: IChapter;
	lesson: ILesson;
}
