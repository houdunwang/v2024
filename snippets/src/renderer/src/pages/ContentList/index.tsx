import { ContentItem } from '@renderer/components/ContentItem'
import { ContentSearch } from '@renderer/components/ContentSearch'
import { Outlet, useLoaderData } from 'react-router-dom'
import './contentList.scss'
export const ContentList = () => {
  const contents = useLoaderData() as ContentType[]

  return (
    <main className="contentList-page">
      <div className="list">
        <ContentSearch />
        {contents.map((content) => (
          <ContentItem content={content} key={content.id} />
        ))}
      </div>
      <div className="content">
        <Outlet />
      </div>
    </main>
  )
}
