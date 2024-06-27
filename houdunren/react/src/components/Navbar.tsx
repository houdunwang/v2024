import { Link } from "@tanstack/react-router"
import { Drawer } from "antd"
import { GanttChart, MessageCircleCode } from "lucide-react"
import { useState } from "react"
import config from "../config"
import { ThemeToggle } from "./ThemeToggle"
import UserDropMenu from "./UserDropMenu"

export const Navbar = () => {
	return (
		<div className="bg-hd-background text-hd-foreground mb-10 py-5 sticky top-0 z-10 border-b border-hd-border shadow-sm">
			<div className="container  grid grid-cols-[1fr_auto] gap-3">
				<div className="md:hidden">
					<MobildMenu />
				</div>
				<div className="items-center hidden md:flex gap-3">
					<div className="flex text-hd-primary items-center gap-1 ">
						<MessageCircleCode size={30} strokeWidth={2} />
						<span className="text-xl font-bold">houdunren</span>
					</div>
					<Links />
				</div>
				<div className="flex gap-2 items-center">
					<ThemeToggle />
					<UserDropMenu />
				</div>
			</div>
		</div>
	)
}
interface LinkProps {
	setOpen?: React.Dispatch<React.SetStateAction<boolean>>
}
function Links({ setOpen }: LinkProps) {
	return (
		<>
			{
				config.menus.map((menu, index) => (
					<Link to={menu.to} key={index} className="font-bold" onClick={() => {
						if (setOpen) setOpen(false)
					}} activeProps={
						{ className: "text-hd-primary" }
					}>{menu.text}</Link>
				))
			}</>
	)
}

function MobildMenu() {
	const [open, setOpen] = useState(false);
	const showDrawer = () => {
		setOpen(true);
	};
	const onClose = () => {
		setOpen(false);
	};
	return (<>
		<GanttChart onClick={showDrawer} />
		<Drawer title="houdunren" onClose={onClose} open={open}>
			<div className="flex flex-col gap-2">
				<Links setOpen={setOpen} />
			</div>
		</Drawer>
	</>)
}
