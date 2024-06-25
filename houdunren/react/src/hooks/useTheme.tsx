import { createContext, useContext, useEffect, useState } from "react";
type ThemeType = 'light' | 'dark' | 'system'
export const ThemeContext = createContext<{
	theme: ThemeType,
	setTheme: React.Dispatch<React.SetStateAction<ThemeType>>
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
			localStorage.setItem('theme', theme)
			return
		}

		root.classList.add(theme)
		localStorage.setItem('theme', theme)
	}, [theme])
	return <ThemeContext.Provider value={{ theme, setTheme }}>
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