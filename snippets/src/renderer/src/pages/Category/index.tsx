import { Add, DatabaseSetting, FolderClose } from '@icon-park/react'
import { NavLink, Outlet, useLoaderData, useNavigate } from 'react-router-dom'
import './category.scss'
import { useEffect } from 'react'

export const Category = () => {
  const categories = useLoaderData() as CategoryType[]
  // const navigate = useNavigate()
  // useEffect(() => {
  //   if (categories.length) {
  //     navigate(`/config/category/contentList/${categories[0].id}`)
  //   }
  // }, [categories])
  return (
    <main className="category-page">
      <div className="categories">
        {categories.map((category) => (
          <NavLink
            to={`/config/category/contentList/${category.id}`}
            key={category.id}
            className={({ isActive }) => (isActive ? 'active' : '')}
          >
            <div className="flex items-center gap-1">
              <FolderClose theme="outline" size="12" strokeWidth={3} />
              <div className="truncate">{category.name}</div>
            </div>
          </NavLink>
        ))}
      </div>
      <div className="nav">
        <Add theme="outline" size="20" strokeWidth={2} />
        <DatabaseSetting theme="outline" size="20" strokeWidth={2} />
      </div>
      <div className="content">
        <Outlet />
      </div>
    </main>
  )
}
