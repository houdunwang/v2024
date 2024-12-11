import { NavbarMenus } from '@/config/menu'
import { Diamonds } from '@icon-park/react'
import { Link } from '@tanstack/react-router'

export default function Navbar() {
	return (
		<main className="bg-white border-t-4 border-primary shadow-sm border-b border-b-gray-200">
			<div className="container h-16 flex  items-center gap-6">
				<Link to="/" className="flex gap-1 font-bold">
					<Diamonds theme="outline" size="24" />
					晚八点直播
				</Link>

				<div className="flex gap-6 font-bold">
					{NavbarMenus.map((menu, index) => <Link key={index} to={menu.to}>{menu.title}</Link>)}
				</div>
			</div>
		</main>
	)
}
