import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card'
import { LiveQr } from '@/config/LiveQr'
import { createFileRoute } from '@tanstack/react-router'

export const Route = createFileRoute('/front/live')({
  component: RouteComponent,
})

function RouteComponent() {
  return <Card className='container'>
    <CardHeader>
      <CardTitle>晚八点直播</CardTitle>
      <CardDescription>欢迎来到直播间交流讨论</CardDescription>
    </CardHeader>
    <CardContent className='grid grid-cols-4 gap-6'>
      {LiveQr.map((img, index) => <img src={img} key={index} className='border' />)}
    </CardContent>
  </Card>
}
