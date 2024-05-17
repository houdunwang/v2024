import { DataType } from '@renderer/data'
import { create } from 'zustand'
interface StateProps {
  data: DataType[]
  setData: (data: DataType[]) => void
  search: string
  setSearch: (search: string) => void
  error: string
  setError: (message: string) => void
  id: number
  setId: (id: number) => void
  editCategoryId: number
  setEditCategoryId: (id: number) => void
}

export const useStore = create<StateProps>((set) => ({
  data: [],
  setData: (data) => set({ data }),
  search: '',
  setSearch: (content) => set({ search: content }),
  error: '',
  setError: (message) => set({ error: message }),
  id: 0,
  setId: (id) => set({ id }),
  editCategoryId: 0,
  setEditCategoryId: (editCategoryId) => set({ editCategoryId })
  // increasePopulation: () => set((state) => ({ bears: state.bears + 1 })),
  // removeAllBears: () => set({ bears: 0 }),
  // updateBears: (newBears) => set({ bears: newBears })
}))
