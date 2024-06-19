import { Avatar, AvatarFallback, AvatarImage } from './ui/avatar'

export const ActivityItem = () => {
  return (
    <div className="flex items-center gap-4 border-b py-3 first-of-type:pt-0 last-of-type:pb-0 last-of-type:border-0">
      <Avatar className="hidden h-9 w-9 sm:flex">
        <AvatarImage src="/images/xj.jpg" alt="Avatar" />
        <AvatarFallback>OM</AvatarFallback>
      </Avatar>
      <div className="grid gap-1">
        <p className="text-sm font-medium leading-none">Olivia Martin</p>
        <p className="text-sm text-muted-foreground">olivia.martin@email.com</p>
      </div>
    </div>
  )
}
