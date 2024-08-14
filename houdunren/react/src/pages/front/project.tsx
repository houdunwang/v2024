import { Navbar } from '@/components/Navbar'
import { FrontLayout } from '@/layouts/FrontLayout'
import { createFileRoute } from '@tanstack/react-router'
import { Card } from 'antd'

export const Route = createFileRoute('/front/project')({
  component: () => <Card title='实战项目' extra={<a href='#'>More</a>}></Card>,
})
