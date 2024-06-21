import { ActivityItem } from '@/components/ActivityItem'
import { Tip } from '@/components/tip'
import {
  Card,
  CardContent,
  CardFooter,
  CardHeader,
  CardTitle,
} from '@/components/ui/card'
import { useTheme } from '@/hooks/useToggleTheme'
// import {
//   Pagination,
//   PaginationContent,
//   PaginationEllipsis,
//   PaginationItem,
//   PaginationLink,
//   PaginationNext,
//   PaginationPrevious,
// } from '@/components/ui/pagination'
import { createLazyFileRoute } from '@tanstack/react-router'
import { Pagination } from 'antd'
export const Route = createLazyFileRoute('/_front/')({
  component: Index,
})

function Index() {
  return (
    <div className="grid lg:grid-cols-[1fr_350px] gap-5 items-start">
      <Card>
        <CardHeader>
          <CardTitle>网站动态 </CardTitle>
        </CardHeader>
        <CardContent className="grid gap-0">
          {[...Array(15)].map((_, i) => (
            <ActivityItem key={i} />
          ))}
        </CardContent>
        <CardFooter>
          <Pagination total={85} showSizeChanger showQuickJumper />
          {/* <Pagination>
            <PaginationContent>
              <PaginationItem>
                <PaginationPrevious href="#" />
              </PaginationItem>
              <PaginationItem>
                <PaginationLink href="#">1</PaginationLink>
              </PaginationItem>
              <PaginationItem>
                <PaginationLink href="#" isActive>
                  2
                </PaginationLink>
              </PaginationItem>
              <PaginationItem>
                <PaginationLink href="#">3</PaginationLink>
              </PaginationItem>
              <PaginationItem>
                <PaginationEllipsis />
              </PaginationItem>
              <PaginationItem>
                <PaginationNext href="#" />
              </PaginationItem>
            </PaginationContent>
          </Pagination> */}
        </CardFooter>
      </Card>

      <section className="grid gap-3">
        <Tip />

        <Card>
          <CardHeader>
            <CardTitle>正在学习</CardTitle>
          </CardHeader>
          <CardContent className="grid gap-0">
            {[...Array(8)].map((_, i) => (
              <ActivityItem key={i} />
            ))}
          </CardContent>
        </Card>
      </section>
    </div>
  )
}
