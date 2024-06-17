import { Switch } from '#/-components/ui/switch'
import { useTheme } from '@/hooks/useToggleTheme'

export function ModeToggle() {
  const { setTheme, theme } = useTheme()

  return (
    <div
      className="flex items-center space-x-2"
      onClick={() => setTheme(theme == 'dark' ? 'light' : 'dark')}>
      <Switch id="airplane-mode" />
    </div>
  )
}
