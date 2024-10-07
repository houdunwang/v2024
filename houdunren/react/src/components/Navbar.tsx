import { Button } from '@/components/ui/button'
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuItem,
  DropdownMenuLabel,
  DropdownMenuSeparator,
  DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu'
import { Sheet, SheetContent, SheetTrigger } from '@/components/ui/sheet'
import menus from '@/config/menus'
import { Code } from '@icon-park/react'
import { Link, useRouteContext } from '@tanstack/react-router'
import { Menu } from 'lucide-react'
import { UserIcon } from './UserIcon'

export const description =
  'A settings page. The settings page has a sidebar navigation and a main content area. The main content area has a form to update the store name and a form to update the plugins directory. The sidebar navigation has links to general, security, integrations, support, organizations, and advanced settings.'

export function Navbar() {
  const context = useRouteContext({ strict: false })
  return (
    <div className='flex w-full flex-col mb-6 border-b bg-background '>
      <header className='container sticky top-0 flex h-16 items-center gap-4 px-4 '>
        <nav className='hidden flex-col gap-6 text-lg font-medium lg:flex md:flex-row md:items-center md:gap-5 md:text-sm lg:gap-5'>
          {JSON.stringify(context)} @@
          <Link
            to={'/'}
            className='flex items-center gap-2 text-lg font-semibold md:text-base'>
            <Code theme='outline' size='25' strokeWidth={4} />
            <span className='sr-only'>Acme Inc</span>
            <span className='uppercase'>houdunren</span>
          </Link>
          {menus.map((menu, i) => (
            <Link
              key={i}
              to={menu.to}
              search={menu.search}
              className='text-muted-foreground text-base transition-colors hover:text-foreground'>
              {menu.title}
            </Link>
          ))}
        </nav>
        <Sheet>
          <SheetTrigger asChild>
            <Button variant='outline' size='icon' className='shrink-0 lg:hidden'>
              <Menu className='h-5 w-5' />
              <span className='sr-only'>Toggle navigation menu</span>
            </Button>
          </SheetTrigger>
          <SheetContent side='left'>
            <nav className='grid gap-6 text-lg font-medium'>
              <Link href='#' className='flex items-center gap-2 text-lg font-semibold'>
                <Code theme='outline' size='25' strokeWidth={4} />
                <span className='sr-only'>Acme Inc</span>
                <span className='uppercase'>houdunren</span>
              </Link>
              {menus.map((menu, i) => (
                <Link
                  key={i}
                  to={menu.to}
                  className='text-muted-foreground hover:text-foreground'>
                  {menu.title}
                </Link>
              ))}
            </nav>
          </SheetContent>
        </Sheet>
        <div className='flex w-full items-center gap-4 md:ml-auto md:gap-2 lg:gap-4 flex-1 justify-end'>
          {/* <form className='ml-auto flex-1 sm:flex-initial'>
            <div className='relative'>
              <Search className='absolute left-2.5 top-2.5 h-4 w-4 text-muted-foreground' />
              <Input
                type='search'
                placeholder='Search products...'
                className='pl-8 sm:w-[300px] md:w-[200px] lg:w-[300px]'
              />
            </div>
          </form> */}
          <DropdownMenu>
            <DropdownMenuTrigger asChild>
              <div className='flex items-center gap-2 cursor-pointer'>
                <div className=''>
                  <UserIcon src={`/images/user/1.jpeg`} className='w-7 h-7' />
                </div>
                <div className='flex flex-col items-start text-xs font-normal'>
                  <span className='font-bold'>向军大叔</span>
                  <span className=''>注册于6年前</span>
                </div>
              </div>
            </DropdownMenuTrigger>
            <DropdownMenuContent align='end'>
              <DropdownMenuLabel>My Account</DropdownMenuLabel>
              <DropdownMenuSeparator />
              <DropdownMenuItem>Settings</DropdownMenuItem>
              <DropdownMenuItem>Support</DropdownMenuItem>
              <DropdownMenuSeparator />
              <DropdownMenuItem>Logout</DropdownMenuItem>
            </DropdownMenuContent>
          </DropdownMenu>
        </div>
      </header>
    </div>
  )
}
