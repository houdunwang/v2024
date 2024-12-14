import { ArticleList } from '@/components/ArticleList'
import { Navbar } from '@/components/Navbar'
import { createFileRoute } from '@tanstack/react-router'

export const Route = createFileRoute('/')({
  component: Index,
})

function Index() {
  return (
    <>
      <Navbar />
      <ArticleList />
    </>
  )
}


