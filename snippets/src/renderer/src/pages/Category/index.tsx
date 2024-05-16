import { CategoryItem } from '@renderer/components/CategoryItem'
import { FooterMenu } from '@renderer/components/FooterMenu'
import { QuickNav } from '@renderer/components/QuickNav'
import { Outlet, useLoaderData } from 'react-router-dom'
import './category.scss'

export const Category = () => {
  const categories = useLoaderData() as CategoryType[]
  return (
    <main className="category-page">
      <div className="categories">
        <QuickNav />
        {categories.map((category) => (
          <CategoryItem category={category} key={category.id} />
        ))}
      </div>
      <FooterMenu />
      <div className="content">
        <Outlet />
      </div>
    </main>
  )
}
