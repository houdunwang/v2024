import { Link } from '@tanstack/react-router'
import React from 'react'
interface Props extends React.HTMLAttributes<HTMLDivElement> {
  title: string
  img: string
}
export const AuthLayout = React.forwardRef<HTMLDivElement, Props>(
  ({ title, img, children }, ref) => {
    const footerMenu = [
      { title: '用户登录', to: '/auth/login' },
      { title: '用户注册', to: '/auth/register' },
      { title: '找回密码', to: '/auth/forget' },
      { title: '网站首页', to: '/' },
    ]
    return (
      <main
        className='bg-[#2c3e50] h-screen w-screen overflow-y-auto flex justify-center items-center'
        ref={ref}>
        <div className='flex'>
          <section className=''>
            <div className='w-[400px] rounded-lg bg-gray-100 p-3'>
              <h2 className='text-center text-lg font-bold p-4'>{title}</h2>
              {children}
              <div className='flex justify-center gap-3 text-xs font-bold opacity-80 mt-12'>
                {footerMenu.map((menu, index) => (
                  <Link
                    to={menu.to}
                    activeProps={{
                      className: 'text-violet-700 hover:text-violet-800',
                    }}>
                    {menu.title}
                  </Link>
                ))}
              </div>
            </div>
          </section>
          <section
            className=' w-[400px] -ml-2 hidden md:flex rounded-tr-lg rounded-br-lg '
            style={{
              backgroundImage: `url(${img})`,
            }}></section>
        </div>
      </main>
    )
  },
)
