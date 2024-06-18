import { Package2 } from 'lucide-react'

export const Links = () => {
  return (
    <>
      <a href="#" className="flex items-center gap-2 text-lg font-semibold md:text-base">
        <Package2 className="h-6 w-6" />
        <span className="sr-only">Acme Inc</span>
      </a>
      <a href="#" className=" transition-colors hover:text-foreground">
        系统课程
      </a>
      <a
        href="#"
        className="text-muted-foreground transition-colors hover:text-foreground">
        实战项目
      </a>
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
