import { SettingOne } from '@icon-park/react'
import useSearch from '@renderer/hooks/useSearch'
import { Input } from 'antd'

export default function Search() {
  const { handleSearch, search } = useSearch()

  return (
    <main className="bg-slate-50 p-3 rounded-lg drag">
      <section className="bg-slate-200 p-3 rounded-lg flex items-center gap-1 nodrag">
        <SettingOne
          theme="outline"
          size="22"
          fill="#34495e"
          strokeWidth={4}
          className="cursor-pointer"
          onClick={() => window.api.openConfigWindow()}
        />
        <Input value={search} onChange={handleSearch} autoFocus />
      </section>
      <section className="text-center text-slate-600 text-xs mt-2">
        向军大叔作品 / 晚八点直播
      </section>
    </main>
  )
}
