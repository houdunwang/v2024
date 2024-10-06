import React from 'react'
import { createContext, Dispatch } from 'react'

export const CommentContext = createContext<
  { replyId: number; setReplyId: Dispatch<React.SetStateAction<number>> } | undefined
>(undefined)

export const ComentContextProvider = ({ children }: { children: React.ReactNode }) => {
  const [replyId, setReplyId] = React.useState<number>(0)
  return (
    <CommentContext.Provider value={{ replyId, setReplyId }}>
      {children}
    </CommentContext.Provider>
  )
}

export const useCommentContext = () => {
  const context = React.useContext(CommentContext)
  if (!context) {
    throw new Error('useCommentContext must be used within a CommentContextProvider')
  }
  return context
}
