import { FileRoutesByPath } from "@tanstack/react-router"

type RoutePath<T> = {
	[K in keyof T]: T[K] extends { fullPath: infer P } ? P : never
}[keyof T]

export type MenuType = { title: string, to: RoutePath<FileRoutesByPath> }[]

const menus: MenuType = [
	{ title: '系统课程', to: '/front/chapter/system' },
	{ title: '实战项目', to: '/front/chapter/project' },
	{ title: '碎片课程', to: '/front/Lesson' },
	{ title: '最近更新', to: '/front/video' },
	{ title: '话题讨论', to: '/front/topic' },
	{ title: '订阅优惠', to: '/front/subscribe' },
	{ title: '签到打卡', to: '/front/sign' },
]

export default menus

