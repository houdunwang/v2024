import { IUser } from "./user";

export interface IComment {
	id: number;
	user_id: number;
	reply_user_id: null;
	comment_id: null;
	content: string;
	commentable_type: string;
	commentable_id: number;
	created_at: string;
	updated_at: string;
	user: IUser;
	replies: IComment[];
}
