import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { createLazyFileRoute } from '@tanstack/react-router'
import { Pagination } from 'antd'
import { Clock9, Youtube } from 'lucide-react'

export const Route = createLazyFileRoute('/_front/video/')({
  component: Video,
})

function Video() {
  return (
    <main className="bg-background p-5 rounded-lg ">
      <section className=" grid grid-cols-2 gap-2 pb-3">
        <div className="">
          <h2 className="">最新更新</h2>
        </div>
        <div className="flex items-center space-x-2">
          <Input type="email" placeholder="" />
          <Button type="submit" variant={'outline'}>
            搜索
          </Button>
        </div>
      </section>

      {[...Array(10)].map((_, index) => (
        <section
          className="md:flex justify-between items-center text-base py-3 border-t cursor-pointer hover:bg-gray-100 duration-200 px-3"
          key={index}>
          <div className="flex items-center justify-between gap-3 text-sm  text-gary opacity-80">
            <div className="flex items-center gap-1">
              <Youtube size={14} /> 苹果软件编译完成
            </div>
            <div className="flex justify-between items-center gap-[2px] text-[12px] text-gray-600">
              <Clock9 size={12} /> 12天前
            </div>
          </div>
          <div className="hidden md:flex text-gary text-xs opacity-80 font-light border px-2 py-1 rounded-sm">
            第二章 shadcn前端组件
          </div>
        </section>
      ))}
      <div className="border-t pt-3 mt-5">
        <Pagination total={85} showSizeChanger showQuickJumper />
      </div>
    </main>
  )
}
