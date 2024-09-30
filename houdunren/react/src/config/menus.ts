import { IChapterType } from "@/types/chapter"
import { FileRoutesByPath } from "@tanstack/react-router"

type MenuType<T, F extends keyof T[keyof T]> = { title: string, to: T[keyof T][F], search?: { type: IChapterType } }[]

const menus: MenuType<FileRoutesByPath, 'fullPath'> = [
	{ title: '系统课程', to: '/front/chapter', search: { type: 'system' } },
	{ title: '实战项目', to: '/front/chapter', search: { type: 'project' } },
	{ title: '碎片课程', to: '/front/Lesson' },
	{ title: '最近更新', to: '/front/video' },
	{ title: '话题讨论', to: '/front/topic' },
	{ title: '订阅优惠', to: '/front/subscribe' },
	{ title: '签到打卡', to: '/front/sign' },
	{ title: '在线文档', to: '/' },
]

export default menus

