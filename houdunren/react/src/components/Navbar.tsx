import { Fire, HamburgerButton, Youtube } from '@icon-park/react'
import React, { useState } from 'react'
import menus from '../config/menus'
import { Button, Drawer } from 'antd'
import { Link } from '@tanstack/react-router'

export const Navbar = () => {
  const [open, setOpen] = useState(false)

  const showDrawer = () => {
    setOpen(true)
  }

  const onClose = () => {
    setOpen(false)
  }
  return (
    <main className='bg-white shadow-sm border-t-4 border-rose-600 mb-6'>
      <section className='lg:container px-3 py-3 grid grid-cols-[1fr_auto]'>
        <div className='hidden lg:flex items-center gap-2'>
          <Link to='/' className='flex items-center text-rose-600 gap-1'>
            <Youtube theme='outline' size='35' strokeWidth={4} />
            <div className='text-xl uppercase font-bold'>houdunren</div>
          </Link>

          <div className='flex gap-2'>
            {menus.map((menu, i) => (
              <Link to={menu.to} key={i} className='font-bold '>
                {menu.title}
              </Link>
            ))}
          </div>
        </div>
        <div className='lg:hidden'>
          <HamburgerButton
            theme='outline'
            size='30'
            fill='#000000'
            strokeWidth={3}
            onClick={showDrawer}
          />
          <Drawer
            title=''
            onClose={onClose}
            open={open}
            placement='left'
            extra={
              <div className='flex items-center text-rose-600 gap-1'>
                <Youtube theme='outline' size='30' strokeWidth={4} />
                <div className='text-lg uppercase font-bold'>houdunren</div>
              </div>
            }>
            <div className='grid grid-flow-row gap-2'>
              {menus.map((menu, i) => (
                <a href='#' key={i} className='font-bold'>
                  {menu.title}
                </a>
              ))}
            </div>
          </Drawer>
        </div>
        <div className='justify-self-end flex gap-2'>
          <Link to='/auth/login'>
            <Button type='primary'>登录</Button>
          </Link>
          <Button type='default'> 注册</Button>
        </div>
      </section>
    </main>
  )
}
