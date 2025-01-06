import { FileRoutesByPath } from "@tanstack/react-router"

type RoutePath<T> = T[keyof T] extends { path: infer U } ? U : never

export const NavbarMenus: { title: string, to: RoutePath<FileRoutesByPath> }[] = [
	{ title: '系统课程', to: '/lesson/system', },
	{ title: '实战项目', to: '/lesson/project', },
	{ title: '碎片课程', to: '/chapter', },
	{ title: '最近更新', to: '/video', },
	{ title: '话题讨论', to: '/topic', },
	{ title: '签到打卡', to: '/', },
	{ title: '订阅优惠', to: '/', },
	{ title: '晚八点直播', to: '/', },
] 