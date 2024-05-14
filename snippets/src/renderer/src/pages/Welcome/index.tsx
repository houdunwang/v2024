import { Code } from '@icon-park/react'
import React from 'react'

export const Welcome = () => {
  return (
    <div className="h-screen flex flex-col items-center justify-center text-sm text-slate-600 opacity-80">
      <Code theme="outline" size="48" fill="#0a0707cd" strokeWidth={3} />
      提升效率的利器
    </div>
  )
}
