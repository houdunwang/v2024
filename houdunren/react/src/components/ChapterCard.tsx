import { Link, useRouterState } from '@tanstack/react-router'
import { Badge } from './ui/badge'
import { Card, CardContent, CardFooter, CardTitle } from './ui/card'

export const ChapterCard = () => {
  const routeState = useRouterState()
  const path = routeState.location.pathname
  return (
    <Link to={'/chapter/lesson'}>
      <Card className="rounded-lg overflow-hidden group cursor-pointer">
        <CardTitle className="overflow-hidden">
          <img
            src={path == '/system' ? '/images/system.jpg' : '/images/project.jpg'}
            className="group-hover:scale-110 duration-500"
          />
        </CardTitle>
        <CardContent>
          <h4 className="text-gary  font-bold py-3">代码片段软件开发</h4>
          <p className="text-gary line-clamp-2">
            使用 electron、react 开发代码片段软件。 一般代码片段都保存在如 vscode
            等软件中，但我们想把内容不局限于vscode
            等软件中，而是在任何软件都可以使用，本软件就是解决这个问题的。
          </p>
        </CardContent>

        <CardFooter className="flex justify-between text-xs">
          <div className="flex items-center gap-1">
            <Badge variant={'outline'} className="text-primary border-primary">
              39
            </Badge>
            个课程
          </div>
          <div className="flex items-center gap-1">
            <Badge variant={'outline'} className="text-orange-500 border-orange-500">
              167
            </Badge>
            个视频
          </div>
        </CardFooter>
      </Card>
    </Link>
  )
}
