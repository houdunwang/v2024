import { useStore } from '@renderer/store/useStore'
import { ChangeEvent } from 'react'

export default () => {
  const { setData } = useStore((s) => s)
  const { search, setSearch } = useStore()
  const handleSearch = async (e: ChangeEvent<HTMLInputElement>) => {
    setSearch(e.target.value)
    const data = await window.api.sql(
      `select * from contents where title like @content limit 6`,
      'findAll',
      { content: `%${e.target.value}%` }
    )
    setData(data as ContentType[])
  }

  return { search, handleSearch }
}
