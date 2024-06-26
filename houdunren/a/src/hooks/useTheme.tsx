import { createContext, useCallback, useContext, useEffect, useState } from "react";
type ThemeType = 'light' | 'dark' | 'system'
export const ThemeContext = createContext<{
	theme: ThemeType,
	setTheme: (theme: ThemeType) => void
} | undefined>(undefined)
interface Prop {
	children: React.ReactNode
}


export const ThemeProvider = (props: Prop) => {
	const [theme, setTheme] = useState<ThemeType>(localStorage.getItem('theme') as ThemeType || 'light')
	useEffect(() => {
		const root = document.documentElement
		root.classList.remove('light', 'dark')
		const isDark = window.matchMedia('(prefers-color-scheme: dark)').matches
		if (theme === 'system') {
			root.classList.add(isDark ? 'dark' : 'light')
			return
		}
		root.classList.add(theme)
	}, [theme])
	return <ThemeContext.Provider value={{
		theme, setTheme: (theme: ThemeType) => {
			setTheme(theme)
			localStorage.setItem('theme', theme)
		}
	}}>
		{props.children}
	</ThemeContext.Provider>
}

export const useTheme = () => {
	const context = useContext(ThemeContext)
	if (!context) {
		throw new Error('useTheme must be used within a ThemeProvider')
	}
	return context
}

//系统颜色模式监测
export const useSysteColorMode = () => {
	const { theme } = useTheme()
	const systemModeChange = useCallback((e) => {
		if (theme == 'system') {
			document.documentElement.classList.remove('light', 'dark')
			document.documentElement.classList.add(e.matches ? 'dark' : 'light')
		}
	}, [theme])

	useEffect(() => {
		const query = window.matchMedia('(prefers-color-scheme: dark)');
		query.addEventListener('change', systemModeChange)
		return () => query.removeEventListener('change', systemModeChange)
	}, [systemModeChange])
}