import { Link } from '@tanstack/react-router'
import { MessageSquareCode } from 'lucide-react'

export const Links = () => {
  const linkData = [
    { name: '系统课程', path: '/chapter/system' },
    { name: '实战项目', path: '/chapter/project' },
    { name: '碎片课程', path: '/lesson' },
    { name: '最新更新', path: '/video' },
  ]
  return (
    <>
      <Link to="/" className="flex items-center gap-2 text-lg font-semibold md:text-base">
        <MessageSquareCode className="h-6 w-6 text-primary" strokeWidth={3} />
        <span className="font-bold uppercase text-primary">houdunren</span>
        <span className="sr-only">Acme Inc</span>
      </Link>
      {linkData.map((item, index) => (
        <Link
          key={index}
          to={item.path}
          className=" transition-colors text-base hover:text-foreground"
          activeProps={{ className: 'text-primary' }}>
          {item.name}
        </Link>
      ))}

      <a
        href="#"
        className="text-muted-foreground transition-colors hover:text-foreground">
        早起少年
      </a>
      <a
        href="#"
        className="text-muted-foreground transition-colors hover:text-foreground">
        最新更新
      </a>
      <a
        href="#"
        className="text-muted-foreground transition-colors hover:text-foreground">
        在线文档
      </a>
    </>
  )
}

function LinkItem({ isActive, children }: { isActive: boolean; children: string }) {
  return <div className={isActive ? 'text-primary' : ''}>{children}</div>
}
