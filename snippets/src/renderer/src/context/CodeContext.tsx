import { DataType } from '@renderer/data'
import { Dispatch, SetStateAction, createContext } from 'react'

interface ContextProps {
  data: DataType[]
  setData: Dispatch<SetStateAction<DataType[]>>
}
export const CodeContext = createContext<ContextProps | undefined>(undefined)
