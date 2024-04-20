import { useStore } from '@renderer/store/useStore'

export default () => {
  const setError = useStore((state) => state.setError)
  const register = async (type: 'search', shortCut: string = 'CommandOrControl+Shift+]') => {
    const isBind = await window.api.shortCut(type, shortCut)
    isBind || setError('快捷键注册失败')
  }

  return { register }
}
