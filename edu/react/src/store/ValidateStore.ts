import { create } from 'zustand'

interface BearState {
	errors: Record<string, string>
	setErrors: (errors: Record<string, string[]>) => void
	resetErrors: () => void
}

export const ValidateStore = create<BearState>()((set) => ({
	errors: {},
	setErrors: (errors) => {
		Object.entries(errors).forEach(([key, value]) => {
			set((state) => ({ ...state, errors: { ...state.errors, [key]: value[0] } }))
		})
	},
	resetErrors: () => set((state) => {
		return { ...state, errors: {} }
	})
}))