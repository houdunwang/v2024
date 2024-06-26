import { Link } from "@tanstack/react-router"
import { Drawer } from "antd"
import { GanttChart, MessageCircleCode } from "lucide-react"
import { Random } from "mockjs"
import { useState } from "react"
import { ThemeToggle } from "./ThemeToggle"
import UserDropMenu from "./UserDropMenu"

export const Navbar = () => {
	return (
		<div className="bg-hd-background">
			<div className="container py-5 grid grid-cols-[1fr_auto] gap-3">
				<div className="md:hidden">
					<MobildMenu />
				</div>
				<div className=" items-center hidden md:flex gap-3">
					<div className="flex text-hd-primary font-bold">
						<MessageCircleCode />
						houdunren
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
	setOpen: React.Dispatch<React.SetStateAction<boolean>>
}
function Links({ setOpen }: LinkProps) {
	return (
		<>
			{
				[...Array(5)].map((_, index) => (
					<Link to="/" key={index} onClick={() => setOpen(false)}>{Random.cword(3, 5)}</Link>
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
