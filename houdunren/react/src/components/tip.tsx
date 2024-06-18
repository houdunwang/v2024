import { Button } from './ui/button'
import { Card, CardContent, CardFooter, CardHeader, CardTitle } from './ui/card'

export const Tip = () => {
  return (
    <Card>
      <CardHeader>
        <CardTitle>温馨提示</CardTitle>
      </CardHeader>
      <CardContent className=" text-sm opacity-80 text-center">
        社区小贴 后盾人是一个主张友好、分享、自由的技术交流社区。 请记住我们的口号
        <div className="font-bold text-primary">后盾人 人人做后盾</div>
      </CardContent>
      <CardFooter className="flex gap-2 justify-center">
        <Button
          size={'sm'}
          className="scale-90 bg-[#1abc9c] hover:bg-[#16a085] rounded-sm">
          发表贴子
        </Button>
        <Button
          size={'sm'}
          className="scale-90 bg-[#9b59b6] hover:bg-[#8e44ad] rounded-sm">
          签到打卡
        </Button>
        <Button
          size={'sm'}
          className="scale-90 bg-[#f1c40f] hover:bg-[#f39c12] rounded-sm">
          在线文档
        </Button>
      </CardFooter>
    </Card>
  )
}
