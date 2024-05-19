import { useStore } from '@renderer/store/useStore'
import { useCallback, useEffect } from 'react'

export default () => {
  const { data, setData, setSearch, setId, id } = useStore((state) => state)
  const handleKeyEvent = useCallback(
    (e: KeyboardEvent) => {
      console.log(e.code)
      switch (e.code) {
        case 'ArrowUp':
          {
            if (data.length === 0) return
            const index = data.findIndex((item) => item.id == id)
            setId(data[index - 1]?.id || data[data.length - 1].id)
          }
          break
        case 'ArrowDown': {
          if (data.length === 0) return
          const index = data.findIndex((item) => item.id == id)
          setId(data[index + 1]?.id || data[0].id)
          break
        }
        case 'Enter': {
          selectItem(id)
          window.api.closeWindow('search')
          break
        }
        case 'Escape': {
          window.api.closeWindow('search')
        }
      }
    },
    [data, id]
  )

  //选中代码行
  async function selectItem(id: number) {
    const content = data.find((item) => item.id == id)?.content
    if (content) await navigator.clipboard.writeText(content)
    setData([])
    setSearch('')
    window.api.hideWindow()
  }

  useEffect(() => {
    document.addEventListener('keydown', handleKeyEvent)
    return () => {
      document.removeEventListener('keydown', handleKeyEvent)
    }
  }, [handleKeyEvent])

  useEffect(() => {
    setId(data[0]?.id || 0)
  }, [data])
  return { data, id, selectItem }
}
