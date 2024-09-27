import React from 'react'
interface Props extends React.HTMLAttributes<HTMLDivElement> {
  title: string
  description: string
}
export const ChapterLayout = React.forwardRef<HTMLDivElement, Props>(
  ({ title, description, children }, ref) => {
    return (
      <main className='mx-3 lg:container bg-white rounded-lg p-6' ref={ref}>
        <h1 className='flex justify-center text-3xl mt-12 font-bold  hover:scale-125 transition-transform duration-300 ease-in-out'>
          {title}
        </h1>
        <div className='text-center mt-6'>{description}</div>
        <section className='grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-16'>
          {children}
        </section>
      </main>
    )
  },
)
