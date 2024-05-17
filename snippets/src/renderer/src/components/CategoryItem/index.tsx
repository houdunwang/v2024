import { FolderClose } from '@icon-park/react'
import useCategory from '@renderer/hooks/useCategory'
import { useStore } from '@renderer/store/useStore'
import { NavLink, useFetcher } from 'react-router-dom'
import styles from './styles.module.scss'

interface Props {
  category: CategoryType
}

export const CategoryItem = ({ category }: Props) => {
  const editCategoryId = useStore((state) => state.editCategoryId)
  const setEditCategoryId = useStore((state) => state.setEditCategoryId)
  const fetcher = useFetcher()
  const { contextMenu, dragHandle } = useCategory(category)
  const linkStyls = (isActive: boolean) => {
    return isActive ? styles.active : styles.link
  }
  return (
    <>
      {editCategoryId == category.id ? (
        <div className={styles.input}>
          <input
            defaultValue={category.name}
            name="name"
            autoFocus
            onKeyDown={(e) => {
              console.log(e.key)
              if (e.key === 'Enter') {
                fetcher.submit({ id: category.id, name: e.currentTarget.value }, { method: 'PUT' })
                setEditCategoryId(0)
              }
            }}
          />
        </div>
      ) : (
        <NavLink
          onDoubleClick={(e) => {
            setEditCategoryId(category.id)
          }}
          to={`/config/category/contentList/${category.id}`}
          key={category.id}
          className={({ isActive }) => linkStyls(isActive)}
          onContextMenu={contextMenu()}
          {...dragHandle}
        >
          <div className="flex items-center gap-1">
            <FolderClose theme="outline" size="12" strokeWidth={3} />
            <div className="truncate">{category.name}</div>
          </div>
        </NavLink>
      )}
    </>
  )
}
