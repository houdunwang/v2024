import { Pagination } from 'antd'
import { ActivityItem } from './ActivityItem'
import {
  Card,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle,
} from './ui/card'

export const Activities = () => {
  return (
    <main className=''>
      <Card>
        <CardHeader>
          <CardTitle>网站动态</CardTitle>
        </CardHeader>
        <CardContent>
          <div className='grid grid-flow-row gap-5'>
            {[...Array(10)].map((_, i) => (
              <ActivityItem key={i} i={i} />
            ))}
          </div>
        </CardContent>
        <CardFooter>
          <Pagination defaultCurrent={1} total={50} />
        </CardFooter>
      </Card>
    </main>
  )
}
