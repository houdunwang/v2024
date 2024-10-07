import { create } from 'zustand'

type State = {
	errors: Record<string, string>
}

type Actions = {
	setError: (field: string, error: string) => void
	removeError: (field: string) => void
}

export const useValidationError = create<State & Actions>((set) => ({
	errors: {},
	setError: (field, error) => set((state) => ({ errors: { ...state.errors, [field]: error } })),
	removeError: (field) => set((state) => ({ errors: { ...state.errors, [field]: '' } }))
}))
