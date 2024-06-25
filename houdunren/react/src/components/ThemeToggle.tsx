import { Button, Dropdown } from 'antd'
import { useTheme } from '../hooks/useTheme'

export const ThemeToggle = () => {
	const { theme, setTheme } = useTheme()

	const items = [
		{
			key: 'light',
			label: '亮色',
			onClick: () => setTheme('light')
		},
		{
			key: 'dark',
			label: '暗色',
			onClick: () => setTheme('dark')
		},
		{
			key: 'system',
			label: '系统',
			onClick: () => setTheme('system')
		}
	]
	return (
		<Dropdown menu={{ items }}>
			<Button type="default" size='small'>{theme == 'dark' ? '暗色' : theme == 'system' ? '系统' : '亮色'}</Button>
		</Dropdown>


	)
}
