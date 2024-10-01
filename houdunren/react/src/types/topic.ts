import { IUser } from "./user";

export interface ITopic {
	id: number;
	user_id: number;
	title: string;
	content: string;
	filename: null;
	favour_count: number;
	favorite_count: number;
	recommend: number;
	created_at: string;
	updated_at: string;
	user: IUser;
}